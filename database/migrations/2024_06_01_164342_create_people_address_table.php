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
        Schema::create('people_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id');
            $table->foreignId('address_id');
            $table->boolean('_is_active')->default(true);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_address');
    }
};
