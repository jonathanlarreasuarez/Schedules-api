<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarDayDisable extends Model
{
    protected $table = 'calendar_days_disabled';

    protected $fillable = [
        'calendar_id',
        'day',
        'enabled',
        'updated_at',
        'created_at'
    ];

    public function calendar(): BelongsTo
    {
        return $this->belongsTo(Calendar::class);
    }
}
