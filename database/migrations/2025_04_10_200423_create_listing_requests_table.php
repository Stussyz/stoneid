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
        Schema::create('listing_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');                      // Seller's ID
            $table->foreignId('agent_id')->nullable()->constrained('users')->onDelete('set null'); // Agent's ID
            $table->string('property_title');
            $table->text('description');
            $table->decimal('price', 15, 2);
            $table->string('location');
            $table->enum('transaction_type', ['Dijual', 'Disewa', 'Dijual/Disewa'])->default('Dijual');
            $table->enum('status', ['initiated', 'pending', 'accepted', 'ready'])->default('initiated');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_requests');
    }
};
