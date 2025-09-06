<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IoTData extends Model
{
    protected $fillable = [
        'detected_at',
        'mode',
        'area',
    ];

    protected $casts = [
        'detected_at' => 'datetime',
        'mode' => 'integer',
        'area' => 'integer',
    ];
}
