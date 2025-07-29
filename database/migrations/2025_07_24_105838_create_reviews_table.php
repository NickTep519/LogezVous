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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('users', 'id')->cascadeOnDelete() ;
            $table->foreignId('client_id')->constrained('users', 'id')->cascadeOnDelete() ;
            $table->tinyInteger('rating')->unsigned() ;
            $table->text('comment') ;
            $table->timestamps();

            // $table->unique(['agent_id', 'client_id']) ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
