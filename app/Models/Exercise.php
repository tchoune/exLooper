<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


enum ExerciseState {
    case building;
    case answering;
    case closed;
}

class Exercise extends Model
{
    
    protected $casts = [
        'state' => ExerciseState::class,
    ];
}
