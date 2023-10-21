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
        Schema::create('mobile_numbers', function (Blueprint $table) {
            $table->id('mobile_number_id');
            $table->unsignedBigInteger('advertisement_id');
            $table->string('number')->nullable();
            $table->timestamps();

            $table->foreign('advertisement_id')->references('advertisement_id')->on('advertisements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_numbers');
    }
};
