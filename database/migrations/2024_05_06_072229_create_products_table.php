<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Discount;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('cost',10,2);
            $table->decimal('price',10,2);
            $table->integer('qty');
            $table->boolean('published')->default(0);
            $table->boolean('inStock')->default(0);
            $table->foreignIdFor(Supplier::class, 'supplier_id');
            $table->foreignIdFor(Discount::class, 'discount_id');
            $table->foreignIdFor(Category::class, 'category_id');
            $table->foreignIdFor(User::class, 'create_by');
            $table->foreignIdFor(User::class, 'update_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
