<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Inertia\Inertia;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $orders = Order::with(['order_items.product.category', 'order_items.product.product_images'])
                       ->where('created_by', $user->id)
                       ->get();
        return Inertia::render('HomePage/Dashboard', ['orders' => $orders]);
        
    }
}
