<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        $featured = Product::with('category')->where('is_featured', true)
                          ->where('is_active', true)
                          ->take(8)
                          ->get();
        return view('home', compact('categories', 'featured'));
    }
}
