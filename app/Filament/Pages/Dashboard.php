<?php

namespace App\Filament\Pages;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';

    protected string $view = 'filament.pages.dashboard';

    public function getViewData(): array
    {
        $revenue = Order::whereIn('status', [
            'paid',
            'processing',
            'completed',
            'shipped',
            'delivered',
        ])->sum('total');

        $orders = Order::latest()->take(5)->get();

        $products = Product::count();

        $customers = User::where('role', 'customer')->count();

        $outOfStock = Product::where(function ($query) {
            $query->where('stock', '<=', 0)
                ->orWhereNull('stock');
        })->count();

        $lowStock = Product::where('stock', '>', 0)
            ->where('stock', '<=', 10)
            ->count();

        $healthyStock = Product::where('stock', '>', 10)->count();

        return [
            'revenue' => $revenue,
            'ordersCount' => Order::count(),
            'productsCount' => $products,
            'customersCount' => $customers,

            'orders' => $orders,

            'outOfStock' => $outOfStock,
            'lowStock' => $lowStock,
            'healthyStock' => $healthyStock,
        ];
    }
}
