<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory ;

    protected $fillable = [
        'lease_id',
        'tenant_id',
        'property_id',
        'amount',
        'year',
        'month',
        'paid_at',
        'payment_method',
    ] ;

    public function lease()  : BelongsTo {

        return $this->belongsTo(Lease::class) ;
    }

    public function tenant() : BelongsTo {

        return $this->belongsTo(Tenant::class) ;
    }

    public function property() : BelongsTo {

        return $this->belongsTo(Property::class) ;
    }


}
