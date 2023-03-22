<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habit extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'type', 'user_id'];

    protected $casts = [
        'type' => TypeEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
