<?php

namespace App\Filament\Resources\DamagedProductResource\Pages;

use App\Filament\Resources\DamagedProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDamagedProduct extends EditRecord
{
    protected static string $resource = DamagedProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
