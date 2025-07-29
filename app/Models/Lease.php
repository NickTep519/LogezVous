<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lease extends Model
{
    use HasFactory ;

    protected $fillable = [
        'property_id',
        'tenant_id',
        'start_date',
        'end_date',
        'rent_amount',
        'status'
    ] ;

    public function property() : BelongsTo {

        return $this->belongsTo(Property::class) ;
    }

    public function tenant() : BelongsTo {

        return $this->belongsTo(Tenant::class) ;
    }

    public function agent() : BelongsTo {

        return $this->belongsTo(User::class, 'agent_id') ;
    }

    public function payments() : HasMany {

        return $this->hasMany(Payment::class) ;
    }
}
