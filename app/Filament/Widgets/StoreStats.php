<?php
namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StoreStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Revenue', '$'.number_format(Order::whereIn('status',['processing','shipped','delivered'])->sum('total'), 2))
                ->description('Active + completed orders')->descriptionColor('success')->chart($this->chart()),
            Stat::make('Orders', number_format(Order::count()))
                ->description('All customer orders')->descriptionColor('info'),
            Stat::make('Products', number_format(Product::count()))
                ->description(Product::where('stock', 0)->count().' out of stock')->descriptionColor(Product::where('stock', 0)->exists() ? 'danger' : 'success'),
            Stat::make('Customers', number_format(User::where('role','customer')->count()))
                ->description('Registered shoppers')->descriptionColor('primary'),
        ];
    }

    private function chart(): array
    {
        return collect(range(6,0))->map(fn ($i) => (float) \App\Models\Order::whereDate('created_at', now()->subDays($i))->sum('total'))->all();
    }
}

