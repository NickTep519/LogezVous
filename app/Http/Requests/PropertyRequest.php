<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
{
    public function authorize()
    {

        return true;
    }

    public function rules()
    {
        return [
            // 'agency_id' => ['nullable', 'exists:agencies,id'],
            'user_id' => ['required', 'exists:users,id'],

            'title' => ['required', 'string', 'max:255'],

            'listing_type' => ['required', Rule::in(['vente', 'location'])],
            'property_type' => ['required', Rule::in([
                'Apartment', 'House', 'Villa', 'Studio', 'Duplex', 'Penthouse',
                'Plot', 'Magasin', 'Boutique', 'Bureaux', 'Terrain', 'Autre'
            ])],

            'price' => ['required', 'numeric', 'min:0'],

            'bedrooms' => ['nullable', 'integer', 'min:0'],
            'bathrooms' => ['nullable', 'integer', 'min:0'],
            'rooms' => ['nullable', 'integer', 'min:0'],
            'surface' => ['nullable', 'numeric', 'min:0'],

            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],

            'description' => ['required', 'string'],

            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],

            'cooling' => ['nullable', Rule::in(['None', 'Window A/C', 'Split A/C', 'Central A/C', 'Autre'])],

            'exterior_finish' => ['nullable', Rule::in(['brique', 'crépi', 'pierre', 'bardage_bois', 'bardage_vinyle', 'carreaux', 'mixte', 'autre'])],

            'year_built' => ['nullable', Rule::in(['0-5', '0-10', '0-15', '15-20', '20+'])],

            'status' => ['nullable', Rule::in(['disponible', 'loue', 'vendu'])],

            'garage' => ['boolean'],
            'heating' => ['boolean'],
            'fireplace' => ['boolean'],
            'elevator' => ['boolean'],
            'kitchen' => ['boolean'],
            'smoking_allowed' => ['boolean'],
            'parking' => ['boolean'],
            'internet' => ['boolean'],
            'wifi' => ['boolean'],
            'bedding' => ['boolean'],
            'balcony' => ['boolean'],
            'terrace' => ['boolean'],
            'swimming_pool' => ['boolean'],

            'published_at' => ['nullable', 'date'],

            'gallery.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120']
        ];
    }
}
