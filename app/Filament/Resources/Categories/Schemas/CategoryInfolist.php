<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Collection overview')
                    ->description('Category identity and storefront presentation.')
                    ->icon('heroicon-o-rectangle-stack')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Category image')
                            ->disk('public')
                            ->height(220)
                            ->columnSpanFull(),

                        TextEntry::make('name')
                            ->label('Category name')
                            ->weight('bold')
                            ->size('lg'),

                        TextEntry::make('slug')
                            ->label('Slug')
                            ->copyable(),

                        TextEntry::make('description')
                            ->label('Description')
                            ->placeholder('No description provided')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Collection health')
                    ->description('Live category status and catalogue size.')
                    ->icon('heroicon-o-chart-bar')
                    ->schema([
                        TextEntry::make('products_count')
                            ->label('Products')
                            ->state(fn ($record) => $record->products()->count())
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('is_active')
                            ->label('Visibility')
                            ->formatStateUsing(fn ($state) => $state ? 'Visible' : 'Hidden')
                            ->badge()
                            ->color(fn ($state): string => $state ? 'success' : 'gray'),

                        TextEntry::make('updated_at')
                            ->label('Last updated')
                            ->dateTime('d M Y, h:i A'),
                    ])
                    ->columns(3),
            ]);
    }
}
