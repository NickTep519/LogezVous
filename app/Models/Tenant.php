<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    use HasFactory ;

    protected $fillable = [
        'user_id',
        'property_id',
        'agency_id',
        'mentor_id'
    ];

    public function user() : BelongsTo {

        return $this->belongsTo(User::class) ;
    }

    public function property() : BelongsTo {

        return $this->belongsTo(Property::class) ;
    }

    public function lease() : HasOne {

        return $this->hasOne(Lease::class) ;
    }

    public function payments() : HasMany {

        return $this->hasMany(Payment::class) ;
    }

    public function agency() : BelongsTo {

        return $this->belongsTo(Agency::class) ;
    }

    public function mentor() : BelongsTo {

        return $this->belongsTo(User::class, 'mentor_id') ;
    }

}
