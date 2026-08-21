<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\Widget;

class StockAttention extends Widget
{
    protected string $view = 'filament.widgets.stock-attention';

    protected int | string | array $columnSpan = 1;

    public function getViewData(): array
    {
        return [
            'products' => Product::query()
                ->where('stock', '<=', 5)
                ->orderBy('stock', 'asc')
                ->limit(5)
                ->get(),
        ];
    }
}
