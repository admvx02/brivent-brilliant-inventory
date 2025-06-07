<?php

namespace App\Filament\Resources\DamagedProductResource\Pages;

use App\Filament\Resources\DamagedProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDamagedProducts extends ListRecords
{
    protected static string $resource = DamagedProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
