<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderGlobal extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'quantity',
        'color',
        'price',
        'note',
    ];
}
