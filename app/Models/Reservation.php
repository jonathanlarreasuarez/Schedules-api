<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{

    protected $table = 'reservations';

    protected $fillable = [
        'user_plan_id',
        'route_id',
        'track_id',
        'reservation_start',
        'reservation_end',
        'route_stop_origin_id',
        'route_stop_destination_id',
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    public function userPlan() : BelongsTo
    {
        return $this->belongsTo(UserPlan::class);
    }

    public function route() : BelongsTo
    {
        return $this->belongsTo(Route::class);
    }
}
