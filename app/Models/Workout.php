<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\WorkoutTypeEnum;

class Workout extends Model
{
    use HasFactory;
    protected $fillable = ['dates', 'sets', 'reps', 'weight', 'duration', 'comment', 'workouttype'];

    protected $casts = [
        'workouttype' => WorkoutTypeEnum::class
    ];
}