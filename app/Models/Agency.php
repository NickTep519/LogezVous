<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;

class Agency extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug, HasFactory;

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
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function agents(): HasMany
    {

        return $this->hasMany(User::class);
    }

    public function tenants() {

        return $this->hasMany(Tenant::class) ;
    }

    public function owners() : HasMany {

        return $this->hasMany(Owner::class) ;
    }
}
