<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('prouct_name');
            $table->text('product_short_dis');
            $table->text('product_long_dis')->nullable();
            $table->integer('price');
            $table->integer('product_category_id');
            $table->integer('product_subtegory_id');
            $table->string('product_img');
            $table->integer('quantity');
            $table->string('product_slug');
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
};
