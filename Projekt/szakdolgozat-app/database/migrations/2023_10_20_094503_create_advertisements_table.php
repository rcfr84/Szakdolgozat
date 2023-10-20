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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id('advertisements_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('picture_id');
            $table->unsignedBigInteger('mobile_number_id');
            $table->string('title');
            $table->string('price');
            $table->text('description');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreign('picture_id')->references('picture_id')->on('pictures')->onDelete('cascade');
            $table->foreign('mobile_number_id')->references('mobile_number_id')->on('mobile_numbers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
