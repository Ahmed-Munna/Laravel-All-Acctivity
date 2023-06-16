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
        Schema::create('child_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('childcategory_name')->nullabale();
            $table->string('slug')->nullabale();
            $table->timestamps();

            $table->foreign('category_id')
                        ->references('id')
                        ->on('categories')
                        ->onDelete('cascade');
            $table->foreign('subcategory_id')
                        ->references('id')
                        ->on('sub_categories')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_categories');
    }
};
