<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrackRequest;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    public function index() 
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }

    public function store(StoreTrackRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Track::create($validated);
        return to_route('tracks.index');
    }

    public function create()
    {    
        return view('tracks.create');
    }

    public function show(Track $track)
    {
        
        $students = $track->students;
       
        return view('tracks.show', compact('track', 'students'));
    }

    public function update(Track $track, StoreTrackRequest $request)
    { 
        $validated = $request->validated();

        if ($request->hasFile('image')) {

            if ($track->image) {
                Storage::disk('public')->delete($track->image);
            }

            $imagePath = $request->file('image')->store('images/tracks', 'public');
            $validated['image'] = $imagePath;
        }

        $track->update($validated);

        return to_route('tracks.index')->with('success', 'Track updated successfully.');
    }

    public function destroy(Track $track)
    {
        if ($track->image) {
            Storage::disk('public')->delete($track->image);
        }

        $track->delete();

        return to_route('tracks.index')->with('success', 'Track deleted successfully.');
    }

    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }
}
