<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalGovernmentArea extends Model
{
    protected $table = 'lga';

    protected $fillable = [
        'uniqueid',
        'lga_id',
        'lga_name',
        'state_id',
        'lga_description',
        'entered_by_user',
        'date_entered',
        'user_ip_address',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}
