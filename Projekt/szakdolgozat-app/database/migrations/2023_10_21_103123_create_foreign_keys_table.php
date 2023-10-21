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
        Schema::create('foreign_keys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobile_number_id')->nullable();
            $table->timestamps();

            $table->foreign('mobile_number_id')->references('mobile_number_id')->on('mobile_numbers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_keys');
    }
};
