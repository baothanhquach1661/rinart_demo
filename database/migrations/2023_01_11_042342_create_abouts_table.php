<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_title_en');
            $table->string('about_title_vi');
            $table->string('about_short_des_en');
            $table->string('about_short_des_vi');
            $table->text('about_long_des_en');
            $table->text('about_long_des_vi');
            $table->string('about_box_1_title_en');
            $table->string('about_box_1_title_vi');
            $table->text('about_box_1_des_en');
            $table->text('about_box_1_des_vi');
            $table->string('about_box_2_title_en');
            $table->string('about_box_2_title_vi');
            $table->text('about_box_2_des_en');
            $table->text('about_box_2_des_vi');
            $table->string('about_box_3_title_en');
            $table->string('about_box_3_title_vi');
            $table->text('about_box_3_des_en');
            $table->text('about_box_3_des_vi');
            $table->string('about_banner');
            $table->string('about_banner_title_en');
            $table->string('about_banner_title_vi');
            $table->text('about_banner_des_en');
            $table->text('about_banner_des_vi');
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
        Schema::dropIfExists('abouts');
    }
}
