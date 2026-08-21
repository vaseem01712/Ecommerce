<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $category = $request->integer('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort = $request->query('sort', 'newest');

        $query = Product::with('category')
            ->where('is_active', true)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($searchQuery) use ($search) {
                    $searchQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('category', function ($categoryQuery) use ($search) {
                            $categoryQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->when($category, fn ($query) => $query->where('category_id', $category))
            ->when(is_numeric($minPrice), fn ($query) => $query->whereRaw('COALESCE(sale_price, price) >= ?', [(float) $minPrice]))
            ->when(is_numeric($maxPrice), fn ($query) => $query->whereRaw('COALESCE(sale_price, price) <= ?', [(float) $maxPrice]));

        match ($sort) {
            'price_asc' => $query->orderByRaw('COALESCE(sale_price, price) asc'),
            'price_desc' => $query->orderByRaw('COALESCE(sale_price, price) desc'),
            'name' => $query->orderBy('name'),
            default => $query->latest(),
        };

        $products = $query->paginate(12)
            ->withQueryString();

        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $selectedCategory = $category ? $categories->firstWhere('id', $category) : null;

        return view('products.index', compact('products', 'search', 'categories', 'category', 'selectedCategory', 'minPrice', 'maxPrice', 'sort'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
                         ->where('is_active', true)
                         ->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function category(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $request->query->set('category', $category->id);

        return $this->index($request);
    }
}
