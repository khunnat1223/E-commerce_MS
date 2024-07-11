<?php

namespace App\Http\Controllers;


// use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Discount;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiscountController extends Controller
{
    public function index()
    {

        return Inertia::render('Admin/Discounts/DiscountIndex', [
            'discounts' => Discount::all()->map(function ($discount){
                return [
                    'id' => $discount->id,
                    'title' => $discount->title,
                    'percentage' => $discount->percentage,
                    'title' => $discount->title,
                    'description' => $discount->description,
                    'image' => asset('storage/'. $discount->image)
                ];
            }),
        ]);

    }
    public function create()
    {
        return Inertia::render('Admin/Discounts/Create');
    }

    public function store()
    {
        // Save discount
        $image = Request::file('image')->store('discounts','public');
        Discount::create([
            'title' => Request::input('title'),
            'percentage' => Request::input('discount'),
            'description' => Request::input('description'),
            'image' => $image
        ]);
        // Discount::create($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully!');
    }

    public function edit(Discount $discount):Response
    {
        return Inertia::render('Admin/Discounts/Edit', [
            'discount' => $discount,
            'image' => asset('storage/' . $discount->image)
        ]);

    }
    public function update(Request $request, $id)
    {
        $discount = discount::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($discount->image) {
                Storage::disk('public')->delete($discount->image);
            }
            $image = $request->file('image')->store('discount_images', 'public');
        } else {
            $image = $discount->image;
        }
        $discount->update([
            'title' => $request->title,
            'percentage' => $request->discount,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}
