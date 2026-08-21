<?php

namespace App\Filament\Pages;

use App\Models\Product;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class Inventory extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;

    protected static ?string $navigationLabel = 'Inventory';

    protected static ?string $title = 'Inventory';

    protected static ?int $navigationSort = 30;

    protected static string|\UnitEnum|null $navigationGroup = 'Operations';

    protected string $view = 'filament.pages.inventory';

    public function getViewData(): array
    {
        $totalProducts = Product::count();

        $totalUnits = (int) Product::sum('stock');

        $lowStock = Product::whereBetween('stock', [1, 5])->count();

        $outOfStock = Product::where('stock', '<=', 0)->count();

        $healthyStock = Product::where('stock', '>', 5)->count();

        /*
        |--------------------------------------------------------------------------
        | Inventory Value
        |--------------------------------------------------------------------------
        */

        $inventoryValue = (float) Product::query()
            ->selectRaw(
                'COALESCE(SUM(stock * COALESCE(sale_price, price)), 0) as value'
            )
            ->value('value');

        /*
        |--------------------------------------------------------------------------
        | Stock Health
        |--------------------------------------------------------------------------
        */

        $healthPercent = $totalProducts > 0
            ? (int) round(($healthyStock / $totalProducts) * 100)
            : 0;

        $healthPercent = min(100, max(0, $healthPercent));

        $healthAngle = ($healthPercent / 100) * 360;

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */
$products = Product::with('category')
    ->orderByRaw(
        'CASE
            WHEN stock <= 0 THEN 0
            WHEN stock <= 5 THEN 1
            ELSE 2
        END'
    )
    ->orderBy('stock')
    ->orderBy('name')
    ->paginate(8);

        return [
            'totalProducts'   => $totalProducts,
            'totalUnits'      => $totalUnits,
            'lowStock'        => $lowStock,
            'outOfStock'      => $outOfStock,
            'healthyStock'    => $healthyStock,
            'inventoryValue'  => $inventoryValue,
            'healthPercent'   => $healthPercent,
            'healthAngle'     => $healthAngle,
            'products'        => $products,
        ];
    }
}
