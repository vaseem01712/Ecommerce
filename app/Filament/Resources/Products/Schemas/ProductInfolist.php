<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product overview')
                    ->description('Core catalogue information, pricing and availability.')
                    ->icon('heroicon-o-cube')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Product image')
                            ->disk('public')
                            ->height(220)
                            ->columnSpanFull(),

                        TextEntry::make('name')
                            ->label('Product name')
                            ->weight('bold')
                            ->size('lg'),

                        TextEntry::make('category.name')
                            ->label('Category')
                            ->placeholder('Uncategorised'),

                        TextEntry::make('slug')
                            ->label('Slug')
                            ->copyable(),

                        TextEntry::make('description')
                            ->label('Description')
                            ->placeholder('No description provided')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Pricing & inventory')
                    ->description('Commercial pricing and live stock position.')
                    ->icon('heroicon-o-banknotes')
                    ->schema([
                        TextEntry::make('price')
                            ->label('Regular price')
                            ->money('INR')
                            ->weight('bold'),

                        TextEntry::make('sale_price')
                            ->label('Sale price')
                            ->money('INR')
                            ->placeholder('No sale price'),

                        TextEntry::make('stock')
                            ->label('Stock')
                            ->badge()
                            ->color(fn ($state): string => (int) $state <= 0 ? 'danger' : ((int) $state <= 5 ? 'warning' : 'success')),
                    ])
                    ->columns(3),

                Section::make('Store visibility')
                    ->description('How this product appears in the storefront.')
                    ->icon('heroicon-o-eye')
                    ->schema([
                        TextEntry::make('is_active')
                            ->label('Status')
                            ->formatStateUsing(fn ($state) => $state ? 'Active' : 'Inactive')
                            ->badge()
                            ->color(fn ($state): string => $state ? 'success' : 'gray'),

                        TextEntry::make('is_featured')
                            ->label('Featured')
                            ->formatStateUsing(fn ($state) => $state ? 'Featured product' : 'Standard product')
                            ->badge()
                            ->color(fn ($state): string => $state ? 'primary' : 'gray'),

                        TextEntry::make('updated_at')
                            ->label('Last updated')
                            ->dateTime('d M Y, h:i A'),
                    ])
                    ->columns(3),
            ]);
    }
}
        
