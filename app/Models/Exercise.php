<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    enum State {
        case building;
        case answering;
        case closed;
    }

    protected $casts = [
        'state' => State::class,
    ];
}
