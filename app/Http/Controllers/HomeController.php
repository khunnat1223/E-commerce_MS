<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::with('category', 'product_images')->limit(8)->get();
        return Inertia::render('HomePage/Index',
            [
                'products' => $products,
                'canLogin' => app('router')->has('login'),
                'canRegister' => app('router')->has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
                // 'categories' =>CategoryResource::collection($categories),
            ]
        );
    }
}
