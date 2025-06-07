<?php

namespace App\Filament\Resources\SupplyInResource\Pages;

use App\Filament\Resources\SupplyInResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupplyIns extends ListRecords
{
    protected static string $resource = SupplyInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
