<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousePerson extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'house_persons';

    protected $guarded =[];

    public function house()
    {
        return $this->belongsTo(\App\Models\House::class);
    }
}
