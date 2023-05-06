<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Route extends Model
{

    protected $table = 'routes';

    protected $fillable = [
        'external_id',
        'invitation_code',
        'title',
        'start_timestamp',
        'end_timestamp'
    ];

    public function routeData() : HasOne
    {
        return $this->hasOne(RouteData::class);
    }

    public function reservations() : hasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
