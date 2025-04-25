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
        Schema::create('property_transaction_processes', function (Blueprint $table) {
            $table->id();
            $table->string('id_preview')->unique();
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->foreignId('user_profiles_id')->nullable()->constrained('user_profiles')->onDelete('cascade');
            $table->date('transaction_date');
            $table->enum('status', ['initiated', 'processed', 'completed', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_transaction_processes');
    }
};
