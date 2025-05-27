<?php

namespace App\Filament\Resources\ReservationResource\RelationManagers;

use App\Enums\FactureStatusEnum;
use App\Models\Facture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FactureRelationManager extends RelationManager
{
    protected static string $relationship = 'facture';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('montant')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options(FactureStatusEnum::class)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('montant')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match($state){
                        FactureStatusEnum::PAID->value     => 'success',
                        FactureStatusEnum::UNPAID->value     => 'warning',
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
                Tables\Actions\Action::make('downloadPdf')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray') // A suitable download icon
                    ->color('info') // Choose a color for the button
                    ->url(fn (Facture $record): string => route('factures.download-pdf', $record)) // Generate the URL
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
