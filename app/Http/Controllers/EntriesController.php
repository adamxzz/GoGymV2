<?php

namespace App\Http\Controllers;
use App\Http\Resources\EntriesCollection;
use App\Http\Resources\EntriesResource;
use App\Models\Entries;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntriesController extends Controller
{
    public function index()
    {
        return new EntriesCollection(Entries::all());
    }

    public function store(Request $request)
    {
        $entries = Entries::create($request->only([
            'habit_id','entry','datetime'
        ]));
        return new EntriesResource($entries);
    }
}
