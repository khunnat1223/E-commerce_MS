<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductImageResource;



class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $products = Product::with('product_images')->get();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'cost' => $this->cost,
            'price' => $this->price,
            'qty' => $this->qty,
            'published' => $this->published,
            'inStock' => $this->inStock,
            'category_id' => $this->category_id,
            'images' => $this->product_images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image_url' => url($image->image),
                ];
            }),
            // 'product_images'=>ProductImageResource::collection($this->whenLoaded('image')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
        ];
    }
}
