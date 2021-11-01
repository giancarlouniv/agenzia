<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Richieste extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'richieste';

    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class);
    }

    public function contract()
    {
        return $this->belongsTo(\App\Models\Contract::class);
    }

    public function house_type()
    {
        return $this->belongsTo(\App\Models\HouseType::class);
    }
}
