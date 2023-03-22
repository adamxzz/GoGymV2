<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\WorkoutTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workout extends Model
{
    use HasFactory;
    protected $fillable = ['dates', 'workouttype', 'sets', 'reps', 'weight', 'duration', 'comment', 'user_id'];

    protected $casts = [
        'workouttype' => WorkoutTypeEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}