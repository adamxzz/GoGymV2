<?php

namespace App\Http\Controllers;

use App\Http\Resources\HabitCollection;
use App\Http\Resources\HabitResource;
use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new HabitCollection(Habit::all());
    }

    public function getbyAuth(){
       
        return new HabitCollection(Habit::where('user_id', Auth::id())->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $habit = Habit::create($request->only([
        //     'name','description','type','user_id'
        // ]));

        $habit = Habit::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'user_id' => Auth::id()
            ]);


        return new HabitResource($habit);
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        return new HabitResource($habit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habit $habit)
    {
        $habit->update($request->only([
            'name','description','type', 'user_id'
        ]));
        return new HabitResource($habit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $habit->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
