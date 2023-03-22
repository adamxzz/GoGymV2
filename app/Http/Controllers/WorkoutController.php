<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new WorkoutCollection(Workout::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $workout = Workout::create($request->only([
            'dates' , 'workouttype', 'sets', 'reps', 'weight', 'duration', 'comment', 'user_id'
        ]));
        return new WorkoutResource($workout);
    }

    /**
     * Display the specified resource.
     */
    public function show(Workout $workout)
    {
        return new WorkoutResource($workout);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workout $workout)
    {
        $workout->update($request->only([
            'dates' , 'workouttype', 'sets', 'reps', 'weight', 'duration', 'comment'
        ]));
        return new WorkoutResource($workout);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workout $workout)
    {
        $workout->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
