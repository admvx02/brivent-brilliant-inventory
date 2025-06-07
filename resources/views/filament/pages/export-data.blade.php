<x-filament::page>
    <div class="space-y-4">
        <h2 class="text-xl font-bold">Export Data to Excel</h2>
        <div class="flex flex-col space-y-2">
            <x-filament::button wire:click="export('products')">
                Export Products
            </x-filament::button>

            <x-filament::button wire:click="export('damaged-products')">
                Export Damaged Products
            </x-filament::button>

            <x-filament::button wire:click="export('supply-ins')">
                Export Supply In
            </x-filament::button>

            <x-filament::button wire:click="export('orders')">
                Export Orders
            </x-filament::button>
        </div>
    </div>
</x-filament::page>
