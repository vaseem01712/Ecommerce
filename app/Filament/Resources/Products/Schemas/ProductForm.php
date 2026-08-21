<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->nullable(),
                TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->prefix('₹'),
                TextInput::make('sale_price')
                    ->numeric()
                    ->nullable()
                    ->prefix('₹'),
                Select::make('discount_type')->options(['percent' => 'Percentage', 'fixed' => 'Fixed amount'])->nullable()->live(),
                TextInput::make('discount_value')->numeric()->nullable()->prefix('₹')->helperText('Leave sale price blank to calculate this automatic discount.'),
                TextInput::make('badge_text')->nullable()->maxLength(30)->placeholder('e.g. 25% OFF or BEST DEAL'),
                \Filament\Forms\Components\DateTimePicker::make('discount_starts_at')->nullable(),
                \Filament\Forms\Components\DateTimePicker::make('discount_ends_at')->nullable(),
                TextInput::make('stock')
                    ->numeric()
                    ->required()
                    ->default(0),
                FileUpload::make('image')
                    ->label('Primary product image')
                    ->image()
                    ->imageEditor()
                    ->nullable(),
                FileUpload::make('images')
                    ->label('Product gallery')
                    ->helperText('Upload and drag to reorder detail-page images. The primary image remains the card cover.')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->imageEditor()
                    ->panelLayout('grid')
                    ->nullable(),
                Toggle::make('is_active')
                    ->default(true),
                Toggle::make('is_featured')
                    ->default(false),
            ]);
    }
}

