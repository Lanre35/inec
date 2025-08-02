<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'state_id',
        'state_name',
    ];

    public function localGovernmentAreas()
    {
        return $this->hasMany(LocalGovernmentArea::class);
    }

    // public function wards()
    // {
    //     return $this->hasManyThrough(Ward::class, LocalGovernmentArea::class);
    // }
}
