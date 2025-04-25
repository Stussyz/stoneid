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
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('land_area', 8, 2)->nullable();     // Luas Tanah (m²)
            $table->decimal('building_area', 8, 2)->nullable(); // Luas Bangunan (m²)
            $table->string('carport')->nullable();
            $table->string('certificate')->nullable();       // Sertifikat
            $table->string('furnishing')->nullable();        // Furnished or Not-Furnished
            $table->integer('electricity')->nullable();      // Listrik (Watt)
            $table->integer('kitchen')->nullable();          // Dapur
            $table->string('concept_and_style')->nullable(); // Konsep dan Gaya
            $table->string('condition')->nullable();         // Kondisi Properti
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_details');
    }
};
