<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'dates' => $this->dates,
            'sets' => $this->sets,
            'reps' => $this->reps,
            'weight' => $this->weight,
            'duration' => $this->duration,
            'comment' => $this->comment,
            'workouttype' => $this->workouttype,
        ];    }
}
