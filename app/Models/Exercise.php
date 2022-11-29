<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

enum ExerciseState: string
{
    case building = 'building';
    case answering = 'answering';
    case closed = 'closed';
}

class Exercise extends Model
{
    protected $fillable = ['title'];

    protected $casts = [
        'state' => ExerciseState::class,
    ];


    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
