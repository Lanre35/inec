<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    protected $table = 'polling_unit';

    protected $fillable = [
        'uniqueid',
        'polling_unit_id',
        'ward_id',
        'lga_id',
        'uniquewardid',
        'polling_unit_number',
        'polling_unit_name',
        'polling_unit_description',
        'lat',
        'long',
        'entered_by_user',
        'date_entered',
        'user_ip_address',
    ];

    public static function where(string $string)
    {
    }

    public function localGovernmentArea()
    {
        return $this->belongsTo(LocalGovernmentArea::class, 'lga_id', 'uniqueid');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'uniqueid');
    }

    public function announcedResults()
    {
        return $this->hasMany(AnnouncedPollingUnitResult::class, 'polling_unit_uniqueid', 'uniqueid');
    }
}
