<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TypeEnum;

class Habit extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'type'];

    protected $casts = [
        'type' => TypeEnum::class
    ];
}
