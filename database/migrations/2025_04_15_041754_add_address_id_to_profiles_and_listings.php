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
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
        });

        Schema::table('agent_profiles', function (Blueprint $table) {
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
        });

        Schema::table('listing_requests', function (Blueprint $table) {
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
        });

        // Schema::table('properties', function (Blueprint $table) {
        //     $table->foreignId('address_id')->nullable()->constrained()->onDelete('set null');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles_and_listings', function (Blueprint $table) {
            //
        });
    }
};
