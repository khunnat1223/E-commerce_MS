<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Delivery;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Khun Nat',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => ('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');
        User::create([
            'name' => 'Phoeut Ratana',
            'email' => 'rathana@gmail.com',
            'email_verified_at' => now(),
            'password' => ('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('staff');

        Product::create([
            'title' => 'BagLighting To HDTV 2',
            'category_id'=> '1',
            'supplier_id' => '1',
            'description'=>"Lighting To HDTV 2 Ports Splitter Cable Converter 1080P Digital AV Adapter Phone Accessories for iPhone iPad To TV",
            'cost'=>'10',
            'discount'=>'0',
            'sellingprice'=>'20',
            'price'=>'200',
            'total_cost'=>'100',
            'total_price'=>'200',
            'qty'  =>'10',
            'published'=>1
        ]);
        Product::create([
            'title' => 'USB hub USB3.0 Type C',
            'category_id'=> '1',
            'supplier_id' => '1',
            'description'=>"USB hub USB3.0 Type C to Type A 4 Ports USB Adapter for Laptop smartphone Dock Station Splitter",
            'cost'=>'15',
            'discount'=>'5',
            'sellingprice'=>'20',
            'price'=>'15',
            'total_cost'=>'150',
            'total_price'=>'150',
            'qty'  =>'10',
            'published'=>1
        ]);
        Category::create([
            'category' => 'Electronics',
            'description'=>"None",
        ]);
        Category::create([
            'category' => 'Clothing & Accessories',
            'description'=>"None",
        ]);
        Category::create([
            'category' => 'Home & Kitchen',
            'description'=>"None",
        ]);
        Category::create([
            'category' => 'Beauty & Personal Care',
            'description'=>"None",
        ]);
        Category::create([
            'category' => 'Sports & Outdoors',
            'description'=>"None",
        ]);
        Category::create([
            'category' => 'Books & Stationerys',
            'description'=>"None",
        ]);
        Category::create([
            'category' => 'Sports & Outdoors',
            'description'=>"None",
        ]);

        Supplier::create([
            'name' => 'Chanda Thana',
            'email' => 'chandathana@gmail.com',
            'number' => '097 82 23 23',
            'address' => 'Battambang',
        ]);
        Supplier::create([
            'name' => 'Khanha Dara',
            'email' => 'dara123@gmail.com',
            'number' => '097 82 22 222',
            'address' => 'Pusart',
        ]);

        Supplier::create([
            'name' => 'Jonh Sander',
            'email' => 'sander@gmail.com',
            'number' => '097 82 77 77',
            'address' => 'Pusart',
        ]);

        Delivery::create([
            'company' => 'J&T',
            'description'=>"None",
        ]);
        Delivery::create([
            'company' => 'វីរៈប៊ុនថាំ',
            'description'=>"None",
        ]);
        Delivery::create([
            'company' => 'ឡានឈ្នួល',
            'description'=>"None",
        ]);
        // Banner::create([
        //     'image' => 'banner_images/Shose Banner.jpg',
        //     'description'=>"None",
        // ]);
        // Banner::create([
        //     'image' => 'banner_images/Banner1.jpg',
        //     'description'=>"None",
        // ]);
        // Banner::create([
        //     'image' => 'banner_images/Fashion-sale-web-banner.jpg',
        //     'description'=>"None",
        // ]);
    }

}
