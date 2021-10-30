<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    function type()
    {
        return $this->belongsTo('\App\Models\CustomerType', 'customer_type_id');
    }

    public function houses(){
        return $this->belongsToMany(\App\Models\House::class, 'house_customers');
    }
}
