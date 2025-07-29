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
            $table->foreignId('agency_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete() ;
            $table->foreignId('owner_id')->constrained('owners', 'id')->cascadeOnDelete() ;
            $table->string('title') ;
            $table->enum('listing_type', ['vente', 'location']) ;
            $table->enum('property_type', ['Apartment', 'House', 'Villa', 'Studio', 'Duplex', 'Penthouse', 'Plot', 'Magasin', 'Boutique', 'Bureaux', 'Terrain','Autre']);
            $table->decimal('price', 15, 2) ;
            $table->integer('bedrooms')->nullable() ; // chambres à coucher
            $table->integer('bathrooms')->nullable() ; // salle de bain (douche)
            $table->integer('rooms')->nullable() ; // nombre de piece
            $table->decimal('surface', 8, 2)->nullable() ;
            $table->string('country')->default('Bénin') ;
            $table->string('city') ;
            $table->string('neighborhood') ;
            $table->text('description') ;
            $table->string('slug')->unique() ;
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->enum('cooling', ['None', 'Window A/C', 'Split A/C', 'Central A/C', 'Autre'])->nullable(); //climatiseur
            $table->enum('exterior_finish', ['brique', 'crépi', 'pierre', 'bardage_bois', 'bardage_vinyle', 'carreaux', 'mixte', 'autre'])->nullable();
            $table->enum('year_built', ['0-5', '0-10', '0-15', '15-20', '20+'])->nullable();
            $table->enum('status', ['disponible', 'loue', 'vendu', 'maintenance'])->default('disponible') ;
            $table->boolean('garage')->default(false) ;
            $table->boolean('heating')->default(false); //chauffage
            $table->boolean('fireplace')->default(false) ; // Cheminée
            $table->boolean('elevator')->default(false)  ; // Ascenseur
            $table->boolean('kitchen')->default(false) ; // Cuisine
            $table->boolean('smoking_allowed')->default(false) ;
            $table->boolean('parking')->default(false) ;
            $table->boolean('internet')->default(false) ;
            $table->boolean('wifi')->default(false) ;
            $table->boolean('bedding')->default(false) ; // Literie
            $table->boolean('balcony')->default(false) ; // Balcon
            $table->boolean('terrace')->default(false) ;
            $table->boolean('swimming_pool')->default(false);
            $table->timestamp('published_at')->nullable() ;
            $table->timestamps();

            $table->index(['listing_type', 'status', 'property_type']) ;
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
