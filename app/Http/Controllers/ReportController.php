<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::get();
        return Inertia::render('Admin/Reports/ReportIndex', [
            'payments' => $payments,
        ]);
    }

public function show($id)
{
    $order = Order::with(['order_items.product.category', 'order_items.product.product_images','createdBy','user_address_id','payment'])
                  ->findOrFail($id);
                return Inertia::render('Admin/Orders/Show', [
        'order' => $order,
    ]);
}
public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => '1',
        ]);
        //  return redirect()->route('staffs.index')->with('success', 'staff updated successfully.');
    }

    public function updateToCancel(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => '0',
        ]);
        return redirect()->route('orders.index')->with('success', 'Order status updated to pending successfully.');
    }
}
