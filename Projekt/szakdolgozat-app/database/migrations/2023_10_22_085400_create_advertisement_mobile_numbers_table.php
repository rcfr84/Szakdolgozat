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
        Schema::create('advertisement_mobile_number', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advertisement_id');
            $table->unsignedBigInteger('mobile_number_id');
            $table->timestamps();

            $table->foreign('advertisement_id')->references('advertisement_id')->on('advertisements')->onDelete('cascade');
            $table->foreign('mobile_number_id')->references('mobile_number_id')->on('mobile_numbers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement_mobile_number');
    }
};
