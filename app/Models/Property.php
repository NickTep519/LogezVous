<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug ;

    protected $guarded = [] ;

    public function getRouteKeyName()
    {
        return 'slug' ;
    }

    /**
     *  Gérnération automatique de  slug avec Spatie/laravel-sluggable
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function user() : BelongsTo {

        return $this->belongsTo(User::class) ;
    }

}
