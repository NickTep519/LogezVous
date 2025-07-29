<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Property::query();

        // 1️ Listing type
        if ($request->filled('listing_type')) {
            $query->where('listing_type', $request->listing_type);
        }

        // 2️ Property type
        if ($request->filled('property_type')) {
            $query->where('property_type', $request->property_type);
        }

        // Ville et Quartier
        if ($request->filled('location')) {
            $query->where(function ($q) use ($request) {
                $q->where('city', 'LIKE', '%' . $request->location . '%')
                    ->orWhere('neighborhood', 'LIKE', '%' . $request->location . '%');
            });
        }

        // 5️ Prix min/max
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        // 6️ Surface min/max
        if ($request->filled('surface_min')) {
            $query->where('surface', '>=', $request->surface_min);
        }
        if ($request->filled('surface_max')) {
            $query->where('surface', '<=', $request->surface_max);
        }

        // 7️ Chambres
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', $request->bedrooms);
        }

        // 8️ Salles de bain
        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', $request->bathrooms);
        }

        // 9️ Avec garage
        if ($request->boolean('garage')) {
            $query->where('garage', true);
        }

        // 10 Piscine
        if ($request->boolean('swimming_pool')) {
            $query->where('swimming_pool', true);
        }

        // 🔥 Chauffage, wifi, internet...
        if ($request->boolean('heating')) {
            $query->where('heating', true);
        }

        if ($request->boolean('wifi')) {
            $query->where('wifi', true);
        }

        if ($request->boolean('internet')) {
            $query->where('internet', true);
        }

        if ($request->boolean('parking')) {
            $query->where('parking', true);
        }

        if ($request->boolean('kitchen')) {
            $query->where('kitchen', true);
        }

        if ($request->boolean('fireplace')) {
            $query->where('fireplace', true);
        }

        if ($request->boolean('elevator')) {
            $query->where('elevator', true);
        }

        if ($request->boolean('smoking_allowed')) {
            $query->where('smoking_allowed', true);
        }

        if ($request->boolean('balcony')) {
            $query->where('balcony', true);
        }

        if ($request->boolean('terrace')) {
            $query->where('terrace', true);
        }

        if ($request->boolean('bedding')) {
            $query->where('bedding', true);
        }



        if ($request->filled('year_built')) {
            $query->where('year_built', $request->year_built);
        }

        // 1️1️ Statut
        $query->where('status', 'disponible');

        $properties = $query->latest()->paginate(15);



        $show = $request->query('show');

        if ($show === 'grid') {
            return view('properties.index-grid', [
                'properties' => $properties
            ]);
        } elseif ($show === 'list') {
            return view('properties.index-list', [
                'properties' => $properties
            ]);
        } else {
            return view('properties.index-grid', [
                'properties' => $properties
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $enumvalues = Property::getEnumValues('listing_type') ;

        return view('properties.form', [

            'property' => new Property()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        // dd($request->file('gallery'));

        $user = Auth::user() ;

        $data = $request->except(['gallery', 'aj-1']);

        $property = Property::create($data);

        if($user->hasRole('agent')){
            $property->agency_id = $user->agency->id ;
            $property->save() ;
        }


        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $property->addMedia($file)->toMediaCollection('gallery');
            }
        }

        // Récupérer l’image principale
        // $property->getFirstMediaUrl('main_image');

        // Récupérer toutes les images de la galerie
        // $property->getMedia('gallery');
        // dd($property->getMedia('gallery')[0]->getUrl()) ;

        return redirect()->route('home')->with('success', 'Bien soumis');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('properties.form', [
            'property' => $property
        ] ) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
