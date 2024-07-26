<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Inertia\Inertia;
// Excel
use App\Exports\PaymentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Notification;
// use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve start_date and end_date from query parameters
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        // Start with a query builder instance
        $query = Payment::query();
        // Apply the date range filter if both dates are provided
        if ($startDate && $endDate) {
            $query->whereBetween('created_date', [$startDate, $endDate]);
        }
        $payments = $query->paginate(5);
        $payments->getCollection()->transform(function ($payment) {
            $payment->imagepay = asset('storage/'. $payment->imagepay); // Assuming imagepay is the attribute name
            return $payment;
        });

        return Inertia::render('Admin/Reports/ReportIndex', [
            'notifications' =>Notification::get(),
            'contnitification' =>Notification::count(),
            'payments' => $payments,
            'filters' => $request->only(['start_date', 'end_date']),
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
    }
    public function updateToCancel(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => '0',
        ]);
        return redirect()->route('orders.index')->with('success', 'Order status updated to pending successfully.');
    }

 public function export(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        return Excel::download(new PaymentExport($start_date, $end_date), 'payments.xlsx');
    }
}
