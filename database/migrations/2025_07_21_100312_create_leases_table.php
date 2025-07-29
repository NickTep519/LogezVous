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
        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties', 'id')->cascadeOnDelete() ;
            $table->foreignId('tenant_id')->constrained('tenants', 'id')->cascadeOnDelete();
            $table->foreignId('agent_id')->constrained('users', 'id')->cascadeOnDelete() ;
            $table->date('start_date') ;
            $table->date('end_date')->nullable() ;
            $table->decimal('rent_amount', 15, 2) ;
            $table->enum('status', ['active', 'terminated']) ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leases');
    }
};
