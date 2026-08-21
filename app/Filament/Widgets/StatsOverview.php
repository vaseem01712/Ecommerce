<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $revenue = Order::query()
            ->whereIn('status', [
                'paid',
                'processing',
                'completed',
            ])
            ->sum('total');

        $orders = Order::count();

        $products = Product::count();

        $customers = User::query()
            ->where('role', 'customer')
            ->count();

        $lowStock = Product::query()
            ->where('stock', '<=', 5)
            ->count();

        return [

            Stat::make(
                'Revenue',
                '$' . number_format($revenue, 2)
            )
                ->description('Active + completed orders')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make(
                'Orders',
                number_format($orders)
            )
                ->description('All customer orders')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),

            Stat::make(
                'Products',
                number_format($products)
            )
                ->description(
                    $lowStock > 0
                        ? $lowStock . ' need attention'
                        : 'All products healthy'
                )
                ->descriptionIcon('heroicon-m-cube')
                ->color(
                    $lowStock > 0
                        ? 'warning'
                        : 'success'
                ),

            Stat::make(
                'Customers',
                number_format($customers)
            )
                ->description('Registered shoppers')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
}
