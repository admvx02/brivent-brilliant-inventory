<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DamagedProductResource\Pages;
use App\Models\DamagedProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class DamagedProductResource extends Resource
{
    protected static ?string $model = DamagedProduct::class;

     protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';
    protected static ?string $navigationGroup = 'Brivent Management';
    protected static ?string $label = 'Damaged Products';
    protected static ?string $pluralLabel = 'Damaged Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('supply_in_barcode_id')
                    ->label('Barcode')
                    ->relationship('barcode', 'code')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hint(fn ($state) => \App\Models\SupplyInBarcode::find($state)?->damaged ? '⚠️ Barcode ini sudah rusak' : null)
                    ->disableOptionWhen(fn ($value) => \App\Models\SupplyInBarcode::find($value)?->damaged)
                    ->helperText('Pilih barcode unit yang rusak. Barcode yang sudah rusak tidak dapat dipilih.')
                    ->rules([
                        Rule::unique('damaged_products', 'supply_in_barcode_id'),
                    ]),

                Forms\Components\DatePicker::make('damaged_at')
                    ->label('Tanggal Rusak')
                    ->required(),

                Forms\Components\TextInput::make('reason')
                    ->label('Penyebab')
                    ->required(),

                Forms\Components\Textarea::make('notes')
                    ->label('Catatan')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('barcode.code')
                    ->label('Barcode')
                    ->searchable(),

                Tables\Columns\TextColumn::make('damaged_at')
                    ->label('Tanggal Rusak')
                    ->date(),

                Tables\Columns\TextColumn::make('reason')
                    ->label('Penyebab')
                    ->searchable(),

                Tables\Columns\TextColumn::make('notes')
                    ->label('Catatan')
                    ->limit(30)
                    ->searchable(),
            ])
            ->filters([
                TernaryFilter::make('reason_is_auto_order')
                    ->label('Tampilkan kerusakan karena pesanan')
                    ->nullable()
                    ->queries(
                        true: fn ($query) => $query->where('reason', 'Otomatis karena pesanan'),
                        false: fn ($query) => $query->where('reason', '!=', 'Otomatis karena pesanan'),
                        blank: fn ($query) => $query,
                    )
                    ->default(false),

                Filter::make('custom_date_range')
                    ->label('Rentang Tanggal')
                    ->form([
                        DatePicker::make('from')->label('Dari'),
                        DatePicker::make('until')->label('Sampai'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q, $date) => $q->whereDate('damaged_at', '>=', $date))
                            ->when($data['until'], fn ($q, $date) => $q->whereDate('damaged_at', '<=', $date));
                    }),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDamagedProducts::route('/'),
            'create' => Pages\CreateDamagedProduct::route('/create'),
            'edit' => Pages\EditDamagedProduct::route('/{record}/edit'),
        ];
    }

    // ✅ GLOBAL SEARCH CONFIGURATION

    public static function getGloballySearchableAttributes(): array
    {
        return ['reason', 'notes', 'barcode.code'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return "Barcode: " . $record->barcode?->code . " | Penyebab: " . $record->reason;
    }


    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Tanggal Rusak' => $record->damaged_at
                ? Carbon::parse($record->damaged_at)->format('d M Y')
                : '-',
            'Catatan' => str($record->notes)->limit(30),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }
}
