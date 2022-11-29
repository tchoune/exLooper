<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum FieldsTypeValue : string
{
    case singleLine = 'single_line';
    case multiLine = 'multi_line';
    case singleLineList = 'single_line_list';
}

class Field extends Model
{
    use HasFactory;

    protected $casts = [
        'value_type' => FieldsTypeValue::class,
    ];

    protected $fillable = ['label', 'value_type'];

    public $timestamps = false;

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
