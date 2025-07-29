<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Owner extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    public function agency() : BelongsTo {

        return $this->belongsTo(Agency::class) ;
    }

    public function mentor() : BelongsTo {

        return $this->belongsTo(User::class, 'mentor_id') ;
    }
}
