<?php

namespace App\Helper;

use App\Models\Cart_item;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Product;

class Cart{
    public static function getCount(): int
    {
        if ($user = auth()->user()) {
            return Cart_item::whereUserId($user->id)->count(); //sum('quantity')
        } else {
            return array_reduce(self::getCookieCartItems(), fn ($carry) => $carry + 1, 0);
        }
    }
    public function getCart(){
        if($user = auth()->user()){
            return Cart_item::whereUserId($user->id)->sum('quantity');
        }
    }

    public static function getCartItems(){
        if ($user = auth()->user()) {
            return Cart_item::whereUserId($user->id)->get()->map(fn (Cart_item $item) => ['product_id' => $item->product_id, 'quantity' => $item->quantity]);
        }else
        {
            return self::getCookieCartItems();
        }
    }

    public static function getCookieCartItems(){
        return json_decode(request()->cookie('cart_items', '[]'), true);
    }

    public static function setCookieCartItems(array $cartItems)
    {
        Cookie::queue('cart_items', json_encode($cartItems), 60*24*30);
    }

    public static function saveCookieCartItems(){
        $user = auth->user();
        $userCartItems =Cart_item::where(['user_id' => $user->id])->get()->KeyBy('product_id');
        $saveCartItems = [];
        foreach (self::getCookieCartItems() as $cartItem){
            if(isset($userCartItems[$cartItem['product_id']])){
                $userCartItems[$cartItem['product_id']] -> update(['quantity' => $cartItem['quantity']]);
                continue;
            }
            $saveCartItems[]=[
                'user_id' => $user->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
            ];

        }
        if(!empty($saveCartItems)){
            Cart_item::insert($saveCartItems);
        }

    }

    public static function saveCartItemIntoDb(){
        $request = request();
        $cartItems = self::getCookieCartItems();
        $saveCartItems =[];
        foreach ($cartItems as $cartItem) {
            // Check if the record already exists in the database
            $existingCartItem = Cart_item::where([
                'user_id' => $request->user()->id,
                'product_id' => $cartItem['product_id'],
            ])->first();

            if (!$existingCartItem) {
                // Only insert if it doesn't already exist
                $newCartItems[] = [
                    'user_id' => $request->user()->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                ];
            }
        }


        if (!empty($newCartItems)) {
            // Insert the new cart items into the database
            Cart_item::insert($newCartItems);
        }
    }


    public static function getProductsAndCartItems()
    {
        $cartItems = self::getCartItems();

        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::whereIn('id', $ids)->with('product_images')->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        return [$products, $cartItems];
    }
}
