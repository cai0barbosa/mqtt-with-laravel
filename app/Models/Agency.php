<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agency extends Model
{
    use HasFactory;

    protected $table    = 'agencies';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'status',
    ];

    public function agencyDoorOpening() : HasMany
    {
        return $this->hasMany(AgencyDoorOpening::class);
    }
}
