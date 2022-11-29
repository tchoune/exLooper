<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum FieldsTypeValue : string
{
    case single_line = 'single_line';
    case multi_line = 'multi_line';
    case single_line_list = 'single_line_list';
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
