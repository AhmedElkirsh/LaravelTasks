<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrackRequest;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $track = Track::all();
        return $track ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrackRequest $request)
    {
        $validated = $request->validated();
        $track = Track::create($validated);
        return response()->json($track, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        return $track;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTrackRequest $request, Track $track)
    {
        $track->update($request->all());
        return response()->json($track);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return "track deleted successfully";
    }
}
