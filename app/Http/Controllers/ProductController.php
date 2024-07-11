<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Inertia\inertia;
use Inertia\Response;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use App\Policies\ProductPolicy;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    public function index()
    {

        $products = Product::with('category', 'product_images')->get();
        $categories = Category::all();

        return Inertia::render(
            'Admin/Products/ProductIndex',
            [
                'products' => $products,
                'categories' =>CategoryResource::collection($categories),
            ]
        );
    }

    public function create(): Response
    {

        Gate::authorize('create', Product::class);
        $categories = Category::all();
        return Inertia::render('Admin/Products/Create',[
            'categories' =>CategoryResource::collection($categories),
        ]);

    }

    public function store(Request $request)
    {

        $product = new Product;
        $product->title = $request->title;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');
            foreach ($productImages as $image) {
                // Generate a unique name for the image using timestamp and random string
                 $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                // // Store the image in the public folder with the unique name
                $image->move('product_images',$uniqueName);
                // Create a new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/'. $uniqueName,
                ]);
            }
        }
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function edit(Product $product):Response
    {
        Gate::authorize('create', Product::class);
        return Inertia::render('Admin/Products/Edit',[
            'product' => new ProductResource($product),
            'categories'=> CategoryResource::collection(Category::all()),
            ]);
    }


    public function deleteImage($id)
    {
        // Gate::authorize('deleteImage', $productImage);
        $image = ProductImage::where('id', $id)->delete();
        return back();
    }


    //update
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->cost = $request->cost;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Check if product images were uploaded
        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');
            // Loop through each uploaded image
            foreach ($productImages as $image) {
                // Generate a unique name for the image using timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Store the image in the public folder with the unique name
                $image->move('product_images', $uniqueName);

                // Create a new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }
        $product->update();
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);
        $product->delete();
        return back();
    }
}

