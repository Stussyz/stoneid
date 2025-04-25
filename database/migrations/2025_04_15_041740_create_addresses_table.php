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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street')->nullable();      //nama jalan / detail alamat blok
            $table->string('village')->nullable();     //kelurahan
            $table->string('district')->nullable();    //kecamatan
            $table->string('city')->nullable();        //kota
            $table->string('province')->nullable();    //provinsi
            $table->string('postal_code')->nullable(); //kode pos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
