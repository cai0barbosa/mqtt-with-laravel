<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgencyDoorOpening extends Model
{
    use HasFactory;

    protected $table = 'agency_door_openings';

    protected $fillable = [
        'agency_id',
        'date',
        'status',
    ];

    public function agency() : BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }
}
