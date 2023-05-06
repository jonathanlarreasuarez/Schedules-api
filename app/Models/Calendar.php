<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Calendar extends Model
{

    protected $table = 'calendars';

    protected $fillable = [
        'calendar_id',
        'name',
        'updated_at',
        'created_at'
    ];

    public function calendarDisabledDays() : HasMany
    {
        return $this->hasMany(CalendarDayDisable::class);
    }

    public function routeData() : HasMany
    {
        return $this->hasMany(RouteData::class);
    }

}
