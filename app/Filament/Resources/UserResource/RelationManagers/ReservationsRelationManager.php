<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Enums\ReservationStatusEnum;
use App\Filament\Resources\ReservationResource;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationsRelationManager extends RelationManager
{
    protected static string $relationship = 'reservations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('local_id')
                    ->relationship('local','id')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->minDate(now()),
                Forms\Components\TimePicker::make('heure')
                    ->seconds(false)
                    ->required(),
                Forms\Components\TextInput::make('duree')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\TextInput::make('people_nbr')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\Select::make('status')
                    ->options(ReservationStatusEnum::class)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('local_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('heure'),
                Tables\Columns\TextColumn::make('duree')
                    ->numeric()
                    ->sortable()
                    ->suffix(' days'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match($state){
                        ReservationStatusEnum::PENDING->value     => 'warning',
                        ReservationStatusEnum::CONFIRMED->value     => 'warning',
                        ReservationStatusEnum::CHECKEDIN->value     => 'success',
                        ReservationStatusEnum::CHECKEDOUT->value     => 'success',
                        ReservationStatusEnum::CANCELLED->value     => 'danger',
                        default                 => 'success',
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->url(fn (Reservation $record): string => ReservationResource::getUrl('view', ['record' => $record])),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
