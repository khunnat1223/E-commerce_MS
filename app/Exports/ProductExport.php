<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Product::all();
    // }
    public function headings():array
    {
        return ['Product',"Cost", "Selling Price","Quantity"];
    }

    public function collection()
    {
        return Product::select('title','cost','sellingprice','qty')->get();
    }
}
