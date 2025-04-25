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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_profile_id')->constrained('agent_profiles');
            $table->foreignId('user_profiles_id')->nullable()->constrained('user_profiles'); //nullable
            $table->foreignId('listing_request_id')->nullable()->constrained('listing_requests');
            $table->foreignId('address_id')->constrained('addresses');
            $table->string('name', 120);
            $table->decimal('price', 15, 2);
            $table->enum('transaction_type', ['rent', 'sell', 'both']);
            $table->integer('min_rent_period')->nullable();
            $table->string('property_type');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
