<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order overview')
                    ->description('Customer, delivery and payment information for this order.')
                    ->icon('heroicon-o-shopping-bag')
                    ->schema([
                        TextEntry::make('id')
                            ->label('Order number')
                            ->formatStateUsing(fn ($state) => '#' . $state)
                            ->weight('bold')
                            ->size('lg')
                            ->copyable()
                            ->copyMessage('Order number copied'),

                        TextEntry::make('status')
                            ->label('Order status')
                            ->badge()
                            ->color(fn ($state): string => match ($state) {
                                'completed', 'delivered' => 'success',
                                'processing', 'shipped' => 'info',
                                'cancelled' => 'danger',
                                default => 'warning',
                            }),

                        TextEntry::make('payment_status')
                            ->label('Payment status')
                            ->badge()
                            ->color(fn ($state): string => match ($state) {
                                'paid' => 'success',
                                'failed' => 'danger',
                                default => 'warning',
                            }),

                        TextEntry::make('created_at')
                            ->label('Placed on')
                            ->dateTime('d M Y, h:i A')
                            ->icon('heroicon-o-calendar-days'),
                    ])
                    ->columns(2),

                Section::make('Customer & delivery')
                    ->description('Contact details and shipping destination.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Customer name')
                            ->weight('bold')
                            ->icon('heroicon-o-user'),

                        TextEntry::make('email')
                            ->label('Email address')
                            ->icon('heroicon-o-envelope')
                            ->copyable()
                            ->copyMessage('Email copied'),

                        TextEntry::make('phone')
                            ->label('Phone')
                            ->icon('heroicon-o-phone')
                            ->placeholder('Not provided'),

                        TextEntry::make('address')
                            ->label('Shipping address')
                            ->icon('heroicon-o-map-pin')
                            ->columnSpanFull()
                            ->placeholder('Not provided'),

                        TextEntry::make('city')
                            ->label('City'),

                        TextEntry::make('state')
                            ->label('State'),

                        TextEntry::make('zip')
                            ->label('ZIP / Postal code'),
                    ])
                    ->columns(2),

                Section::make('Financial summary')
                    ->description('A clear breakdown of the order total.')
                    ->icon('heroicon-o-banknotes')
                    ->schema([
                        TextEntry::make('subtotal')
                            ->label('Subtotal')
                            ->money('INR')
                            ->weight('bold'),

                        TextEntry::make('shipping')
                            ->label('Shipping')
                            ->money('INR'),

                        TextEntry::make('total')
                            ->label('Grand total')
                            ->money('INR')
                            ->weight('bold')
                            ->size('lg'),
                    ])
                    ->columns(3),
            ]);
    }
}
