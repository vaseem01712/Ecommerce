<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Customer profile')
                    ->description('A complete snapshot of this customer account.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Full name')
                            ->weight('bold')
                            ->size('lg')
                            ->icon('heroicon-o-user'),

                        TextEntry::make('email')
                            ->label('Email address')
                            ->icon('heroicon-o-envelope')
                            ->copyable()
                            ->copyMessage('Email copied'),

                        TextEntry::make('created_at')
                            ->label('Customer since')
                            ->dateTime('d M Y, h:i A')
                            ->icon('heroicon-o-calendar-days'),

                        TextEntry::make('orders_count')
                            ->label('Total orders')
                            ->badge()
                            ->color(fn ($state): string => ((int) $state) > 0 ? 'primary' : 'gray')
                            ->icon('heroicon-o-shopping-bag'),
                    ])
                    ->columns(2),

                Section::make('Account overview')
                    ->description('Account identity and current customer status.')
                    ->icon('heroicon-o-shield-check')
                    ->schema([
                        TextEntry::make('account_status')
                            ->label('Account status')
                            ->state('Active')
                            ->badge()
                            ->color('success')
                            ->icon('heroicon-o-check-circle'),

                        TextEntry::make('customer_id')
                            ->label('Customer ID')
                            ->state(fn ($record) => '#' . $record->id)
                            ->copyable()
                            ->icon('heroicon-o-identification'),
                    ])
                    ->columns(2),

                Section::make('Order activity')
                    ->description('Quick order activity for this customer.')
                    ->icon('heroicon-o-chart-bar-square')
                    ->schema([
                        TextEntry::make('orders_summary')
                            ->label('Purchase activity')
                            ->state(function ($record) {
                                $count = (int) ($record->orders_count ?? $record->orders()->count());

                                return $count === 0
                                    ? 'No orders placed yet'
                                    : $count . ' order' . ($count === 1 ? '' : 's') . ' placed';
                            })
                            ->weight('bold')
                            ->size('lg'),

                        TextEntry::make('last_order')
                            ->label('Latest order')
                            ->state(function ($record) {
                                $order = $record->orders()->latest()->first();

                                return $order ? '#' . $order->id : 'No order history';
                            })
                            ->icon('heroicon-o-clock'),
                    ])
                    ->columns(2),
            ]);
    }
}
