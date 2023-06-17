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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable()->default('No values here');
            $table->string('meta_author')->nullable()->default('No values here');
            $table->string('meta_tag')->nullable()->default('No values here');
            $table->string('meta_discription')->nullable()->default('No values here');
            $table->string('meta_keyword')->nullable()->default('No values here');
            $table->string('google_varification')->nullable()->default('No values here');
            $table->string('google_analytics')->nullable()->default('No values here');
            $table->string('google_adsence')->nullable()->default('No values here');
            $table->string('alexa_vatification')->nullable()->default('No values here');
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
        Schema::dropIfExists('seos');
    }
};
