<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->string('product_name_en')->nullable();
            $table->string('product_name_vi')->nullable();
            $table->string('product_slug_en')->nullable();
            $table->string('product_slug_vi')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_tags_en')->nullable();
            $table->string('product_tags_vi')->nullable();
            $table->string('product_size_en')->nullable();
            $table->string('product_size_vi')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_vi')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('short_description_en')->nullable();
            $table->string('short_description_vi')->nullable();
            $table->text('longs_description_en')->nullable();
            $table->text('longs_description_vi')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->string('product_image')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
