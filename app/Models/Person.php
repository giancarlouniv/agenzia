<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'persons';
    protected $guarded = [];

    public function houses()
    {
        return $this->hasMany(\App\Models\House::class);
    }

    public function richieste()
    {
        return $this->hasMany(\App\Models\Richieste::class);
    }
}
