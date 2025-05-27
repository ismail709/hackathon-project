<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Enums\ReservationStatusEnum;
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
                    ->required(),
                Forms\Components\TimePicker::make('heure')
                    ->seconds(false)
                    ->required(),
                Forms\Components\TextInput::make('duree')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('people_nbr')
                    ->required()
                    ->numeric(),
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
                        ReservationStatusEnum::COMPLETED->value     => 'success',
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
