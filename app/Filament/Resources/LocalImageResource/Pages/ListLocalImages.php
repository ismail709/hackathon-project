<?php

namespace App\Filament\Resources\LocalImageResource\Pages;

use App\Filament\Resources\LocalImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLocalImages extends ListRecords
{
    protected static string $resource = LocalImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
