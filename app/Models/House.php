<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use HasFactory, SoftDeletes;

    function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

    function contract()
    {
        return $this->belongsTo('\App\Models\Contract', 'contract_id');
    }

    function houseType()
    {
        return $this->belongsTo('\App\Models\HouseType', 'house_type_id');
    }

    public function customers(){
        return $this->belongsToMany(\App\Models\Customer::class, 'house_customers');
    }

    public function person(){
        return $this->belongsTo(\App\Models\Person::class);
    }

    public function photos(){
        return $this->hasMany(\App\Models\HousePhoto::class)->where('is_planimetria',0);
    }

    public function photosPlanimetria(){
        return $this->hasMany(\App\Models\HousePhoto::class)->where('is_planimetria',1);
    }
}
