<?php

namespace App\Models;

use App\Traits\HasEnumColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug, HasEnumColumn, HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     *  Gérnération automatique de  slug avec Spatie/laravel-sluggable
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    /**
     *  Gestion des images dans le model avec Spatie Media Library
     */
    public function registerMediaCollections(): void
    {
        // $this->addMediaCollection('main_image')->singleFile();
        $this->addMediaCollection('gallery');
    }

    /**
     *  Pour convertir images avec Spatie Media Library
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->sharpen(10);
    } // Et on appelle $property->getFirstMediaUrl('main_image', 'thumb');

    public function getConfigurationCodeAttribute(): string
    {
        $bedrooms = $this->bedrooms ?? 0;
        $kitchens = $this->kitchen ? 1 : 0;
        $bathrooms = $this->bathrooms ?? 0;

        $parts = [];

        if ($bedrooms > 0) {
            $parts[] = ($bedrooms === 1) ? 'CS' : "{$bedrooms}CS";
        }

        if ($kitchens > 0) {
            $parts[] = ($kitchens === 1) ? 'C' : "{$kitchens}C";
        }

        if ($bathrooms > 0) {
            $parts[] = ($bathrooms === 1) ? 'D' : "{$bathrooms}D";
        }

        return implode('', $parts);
    }

    // public function getFormattedPriceAttribute(): string
    // {
    //     $locale = app()->getLocale();
    //     $formatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);

    //     return $formatter->formatCurrency($this->price, 'XOF');
    // }


    public function getFormattedPriceAttribute(): string
    {
        $locale = app()->getLocale();
        $formatter = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);
        $formatted = $formatter->format($this->price);

        return "{$formatted} XOF";
    }


    public function getFormattedAbbPriceAttribute(): string
    {
        $price = $this->price;

        if ($price >= 1_000_000_000) {
            $formatted = number_format($price / 1_000_000_000, 1) . 'B';
        } elseif ($price >= 1_000_000) {
            $formatted = number_format($price / 1_000_000, 1) . 'M';
        } elseif ($price >= 1_000) {
            $formatted = number_format($price / 1_000, 1) . 'k';
        } else {
            $formatted = number_format($price, 0);
        }

        // Supprimer le .0 si pas nécessaire
        $formatted = preg_replace('/\.0([kMB])/', '$1', $formatted);

        return "{$formatted} XOF";
    }


    public function agency(): BelongsTo
    {

        return $this->belongsTo(Agency::class);
    }

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function tenant(): HasOne
    {

        return $this->hasOne(Tenant::class);
    }

    public function lease(): HasOne
    {

        return $this->hasOne(Lease::class);
    }

    public function payments(): HasMany
    {

        return $this->hasMany(Payment::class);
    }

    public function owner() : BelongsTo {

        return $this->belongsTo(Owner::class) ;
    }
}
