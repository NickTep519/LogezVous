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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete() ;
            $table->string('title') ;
            $table->text('description') ;
            $table->decimal('price', 15, 2) ;
            $table->enum('listing_type', ['vente', 'location']) ;
            $table->enum('status', ['disponible', 'loue', 'vendu'])->default('disponible') ;
            $table->string('address') ;
            $table->string('country')->default('Bénin') ;
            $table->string('neighborhood') ;
            $table->string('slug')->unique()->after('title') ;
            $table->enum('property_type', ['Apartment', 'House', 'Villa', 'Studio', 'Duplex', 'Penthouse', 'Plot', 'Magasin', 'Boutique', 'Bureaux','Autre']);
            $table->decimal('surface', 8, 2)->nullable() ;
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('bedrooms')->nullable() ; // chambres à coucher
            $table->integer('bathrooms')->nullable() ; // salle de bain (douche)
            $table->enum('cooling', ['None', 'Window A/C', 'Split A/C', 'Central A/C', 'Autre'])->nullable(); //climatiseur
            $table->enum('exterior_finish', ['brique', 'crépi', 'pierre', 'bardage_bois', 'bardage_vinyle', 'carreaux', 'mixte', 'autre'])->nullable();
            $table->year('year_built')->nullable();
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
