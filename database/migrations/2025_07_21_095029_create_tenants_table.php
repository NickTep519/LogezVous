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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete() ;
            $table->foreignId('property_id')->constrained('properties', 'id')->cascadeOnDelete() ;
            $table->foreignId('agency_id')->nullable()->constrained('agencies', 'id')->cascadeOnDelete() ;
            $table->foreignId('mentor_id')->constrained('users', 'id')->cascadeOnDelete() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
