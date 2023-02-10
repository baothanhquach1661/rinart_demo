<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_texts', function (Blueprint $table) {
            $table->id();
            $table->string('text_1')->nullable();
            $table->string('text_1_color')->nullable();
            $table->string('text_2')->nullable();
            $table->string('text_2_color')->nullable();
            $table->string('text_3')->nullable();
            $table->string('text_3_color')->nullable();
            $table->string('text_4')->nullable();
            $table->string('text_4_color')->nullable();
            $table->string('text_5')->nullable();
            $table->string('text_5_color')->nullable();
            $table->string('text_6')->nullable();
            $table->string('text_6_color')->nullable();
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
        Schema::dropIfExists('custom_texts');
    }
}
