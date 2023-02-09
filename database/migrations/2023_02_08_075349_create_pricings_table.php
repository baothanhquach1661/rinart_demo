<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_vi');
            $table->string('image');
            $table->string('name_en');
            $table->string('name_vi');
            $table->string('banner');
            $table->string('short_description_en');
            $table->string('short_description_vi');
            $table->text('long_description_en');
            $table->text('long_description_vi');
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
        Schema::dropIfExists('pricings');
    }
}
