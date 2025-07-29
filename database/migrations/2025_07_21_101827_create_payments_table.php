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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lease_id')->constrained('leases', 'id')->cascadeOnDelete() ;
            $table->foreignId('tenant_id')->constrained('tenants', 'id')->cascadeOnDelete() ;
            $table->foreignId('property_id')->constrained('properties', 'id')->cascadeOnDelete() ;
            $table->decimal('amount', 15, 2) ;
            $table->unsignedSmallInteger('year') ;
            $table->unsignedTinyInteger('month') ;
            $table->date('paid_at') ;
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
