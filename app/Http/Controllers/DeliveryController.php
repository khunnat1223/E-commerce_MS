<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Notification;

class DeliveryController extends Controller
{
    public function index(): Response
    {
        $deliverys = Delivery::all();
        return Inertia::render('Admin/Deliverys/DeliveryIndex',
        [
            'notifications' =>Notification::get(),
            'contnitification' =>Notification::count(),
            'deliverys' => $deliverys,
        ]);

    }

    public function create(): Response
    {
        return Inertia::render('Admin/Deliverys/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        Delivery::create([
            'company' => $request->company,
            'description' => $request->description,
        ]);
        return to_route('deliverys.index')->with('success','បានបង្កើតដៃគូរដឹកជញ្ជូនជោគជ័យ!');

    }
    public function edit(Delivery $delivery):Response
    {
        return Inertia::render('Admin/Deliverys/Edit', [
            'delivery' => $delivery,
        ]);
    }


    public function update(Request $request, Delivery $delivery):RedirectResponse
    {
        $delivery->update([
            'company' => $request->company,
            'description' => $request->description,
        ]);
        return to_route('deliverys.index')->with('success','បានកែប្រែព័ត៌មានដៃគូរដឹកជញ្ជូនជោគជ័យ!');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return to_route('deliverys.index')->with('dsuccess','បានលុបព័ត៌មានដៃគួរដឹកជញ្ជូនជោគជ័យ!');
    }
}
