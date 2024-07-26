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
        // Gate::authorize('create', Delivery::class);
        return Inertia::render('Admin/Deliverys/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Gate::authorize('create', Delivery::class);
        Delivery::create([
            'company' => $request->company,
            'description' => $request->description,
        ]);
        return to_route('deliverys.index');

    }
    public function edit(Delivery $delivery):Response
    {
        // Gate::authorize('update', $delivery);
        return Inertia::render('Admin/Deliverys/Edit', [
            'delivery' => $delivery,
            // 'description' => $delivery,
        ]);
    }


    public function update(Request $request, Delivery $delivery):RedirectResponse
    {
        // $category->update($request->validated());
        // Gate::authorize('update', $category);
        $delivery->update([
            'company' => $request->company,
            'description' => $request->description,
        ]);
        return to_route('deliverys.index');
    }

    public function destroy(Delivery $delivery)
    {
        // Gate::authorize('delete', $category);
        $delivery->delete();
        return to_route('deliverys.index');
    }
}
