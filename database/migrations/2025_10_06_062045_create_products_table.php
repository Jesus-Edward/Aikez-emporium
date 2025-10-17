<?php

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
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 12,2)->nullable();
            // $table->decimal('offer_price', 12,2)->nullable();
            $table->foreignId('size_id')->constrained('sizes')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('texture');
            $table->string('color_family');
            $table->string('image');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            // $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->string('sku')->nullable(); // Stock Keeping Unit
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->boolean('status')->default(1);
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
