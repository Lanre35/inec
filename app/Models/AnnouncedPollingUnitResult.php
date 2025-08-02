<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnouncedPollingUnitResult extends Model
{
    protected $table = 'announced_pu_results';

    protected $fillable = [
        'polling_unit_uniqueid',
        'party_abbreviation',
        'party_score',
        'entered_by_user',
        'date_entered',
        'user_ip_address',
        'created_at' => 'default',
        'updated_at' => 'default'
    ];

    public function pollingUnit()
    {
        return $this->belongsTo(PollingUnit::class, 'polling_unit_uniqueid', 'uniqueid');
    }
}
