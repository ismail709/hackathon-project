<?php

namespace App\Filament\Resources\LocalImageResource\Pages;

use App\Filament\Resources\LocalImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLocalImage extends EditRecord
{
    protected static string $resource = LocalImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
