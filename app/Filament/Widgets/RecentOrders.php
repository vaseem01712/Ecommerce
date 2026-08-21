<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentOrders extends TableWidget
{
    protected static ?string $heading = 'Recent Orders';

    protected static ?int $sort = 10;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()
                    ->with('user')
                    ->latest()
            )
            ->defaultPaginationPageOption(5)
            ->paginated([5])
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Order')
                    ->formatStateUsing(fn ($state) => '#' . $state)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable(),

                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->money('INR')
                    ->weight('bold'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'processing',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date('M d, Y')
                    ->sortable(),
            ])
            ->actions([
                ViewAction::make(),
            ]);
    }
}
