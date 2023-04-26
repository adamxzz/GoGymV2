<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new WorkoutCollection(Workout::all());
    }

    public function getChartData($type)
    {

        // $myData = Workout::where('user_id', Auth::id())->distinct()->orderBy('dates', 'asc')->get();
        $myData = Workout::select('weight', 'dates')->where('user_id', Auth::id())->where('workouttype', $type)->distinct()->orderBy('dates', 'asc')->get();
        $dates = [];
        $weights = [];

        foreach($myData as $data){
            array_push($dates, $data->dates);
            array_push($weights, $data->weight);
        }

        return response()->json([
            'type' => $type,
            'labels' => $dates,
            'weights' => [
                'id' => 1,
                'label' => 'Weights',
                'data' => $weights
            ],
        ]);
        // return new WorkoutCollection(Workout::where('user_id', Auth::id())->get());
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
