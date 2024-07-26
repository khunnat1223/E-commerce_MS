<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
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
            'name' => 'admin',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => ('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');
        Product::create([
            'title' => 'Bag',
            'category_id'=> '1',
            'supplier_id' => '1',
            'description'=>"New Bag",
            'cost'=>'15',
            'discount'=>'5',
            'sellingprice'=>'20',
            'price'=>'15',
            'total_cost'=>'150',
            'total_price'=>'150',
            'qty'  =>'10',
            'published'=>0
        ]);
        Product::create([
            'title' => 'Bag2',
            'category_id'=> '1',
            'supplier_id' => '1',
            'description'=>"New Bag",
            'cost'=>'15',
            'discount'=>'5',
            'sellingprice'=>'20',
            'price'=>'15',
            'total_cost'=>'150',
            'total_price'=>'150',
            'qty'  =>'10',
            'published'=>0
        ]);
    }
}
