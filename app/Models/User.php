<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Review;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zap\Models\Concerns\HasSchedules;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasSlug, HasSchedules;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'pseudo_or_agency',
        'phone',
        'email',
        'gender',
        'dob',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('pseudo_or_agency')
            ->saveSlugsTo('slug');
    }


    public function getNameAttribute()
    {

        return "{$this->fname} {$this->lname}";
    }

    public function getImageAttribute()
    {

        if ($this->avatar === 'images/default.png') {

            return asset('images/default_user.png');
        }

        return asset('storage/' . $this->avatar);
    }

    public function properties(): HasMany
    {

        return $this->hasMany(Property::class);
    }

    public function agency(): BelongsTo
    {

        return $this->belongsTo(Agency::class);
    }

    public function tenant(): HasOne
    {

        return $this->hasOne(Tenant::class);
    }

    public function tenants(): HasMany
    {

        return $this->hasMany(Tenant::class, 'mentor_id');
    }

    public function owners(): HasMany
    {

        return $this->hasMany(Owner::class, 'mentor_id');
    }


    public function receivedReviews()
    {
        return $this->hasMany(Review::class, 'agent_id');
    }


    public function writtenReviews()
    {
        return $this->hasMany(Review::class, 'client_id');
    }

    // Note moyenne
    public function averageRating()
    {
        return round($this->receivedReviews()->avg('rating'), 1);
    }

    public function leases() : HasMany {

        return $this->hasMany(Lease::class, 'agent_id') ;
    }
}
