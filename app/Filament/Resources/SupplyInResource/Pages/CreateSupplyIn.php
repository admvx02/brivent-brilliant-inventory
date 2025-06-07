<?php

namespace App\Filament\Resources\SupplyInResource\Pages;

use App\Filament\Resources\SupplyInResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSupplyIn extends CreateRecord
{
    protected static string $resource = SupplyInResource::class;
    protected function afterCreate(): void
    {
        $record = $this->record;
        $count = $record->quantity;

        for ($i = 1; $i <= $count; $i++) {
            $code = now()->format('Ymd') . '-' . str_pad($record->id . $i, 5, '0', STR_PAD_LEFT);

            \App\Models\SupplyInBarcode::create([
                'supply_in_id' => $record->id,
                'product_id' => $record->product_id,
                'code' => $code,
            ]);
        }
    }
}
