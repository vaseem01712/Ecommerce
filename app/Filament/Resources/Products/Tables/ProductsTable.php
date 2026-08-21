<?php
namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular()->size(48),
                TextColumn::make('name')->searchable()->sortable()->weight('bold'),
                TextColumn::make('category.name')->label('Category')->sortable(),
                TextColumn::make('price')->money('INR')->sortable(),
                TextColumn::make('sale_price')->label('Sale')->money('INR')->toggleable(),
                TextColumn::make('current_price')->label('Live price')->money('INR')->sortable(),
                TextColumn::make('discount_badge')->label('Badge')->badge()->color('warning')->toggleable(),
                TextColumn::make('stock')->numeric()->sortable()->badge()
                    ->color(fn (int $state): string => $state === 0 ? 'danger' : ($state <= 5 ? 'warning' : 'success')),
                TextColumn::make('is_active')->label('Status')->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Active' : 'Inactive')
                    ->color(fn ($state): string => $state ? 'success' : 'gray'),
                TextColumn::make('is_featured')->label('Featured')->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Featured' : 'Standard')
                    ->color(fn ($state): string => $state ? 'primary' : 'gray'),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('apply_percentage_discount')
                        ->label('Apply % discount')
                        ->icon('heroicon-o-tag')
                        ->form([TextInput::make('percentage')->numeric()->minValue(1)->maxValue(100)->required()->suffix('%'), TextInput::make('badge_text')->default('SALE')->maxLength(30)])
                        ->action(fn ($records, array $data) => $records->each->update(['sale_price' => null, 'discount_type' => 'percent', 'discount_value' => $data['percentage'], 'badge_text' => $data['badge_text']])),
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

