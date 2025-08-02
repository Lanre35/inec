<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward';

    protected $fillable = [
        'uniqueid',
        'ward_id',
        'lga_id',
        'ward_name',
        'ward_description',
        'entered_by_user',
        'date_entered',
        'user_ip_address',
    ];

    public function localGovernmentArea()
    {
        return $this->belongsTo(LocalGovernmentArea::class, 'lga_id', 'uniqueid');
    }
}
