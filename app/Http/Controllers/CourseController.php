<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Track;

class CourseController extends Controller
{
    
    public function index()
    {
        $courses=Course::all();
        return view('courses.index',compact("courses"));
    }


    public function create()
    {
        $tracks=Track::all();
        return view('courses.create',compact('tracks'));
    }

 
    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();
        $course = Course::create($validated);
        $course->tracks()->attach($request->input('track_ids'));
        return to_route('courses.index');
    }


    public function show(Course $course)
    {
        return view('courses.show',compact("course"));
    }

    public function edit(Course $course)
    {
        $tracks=Track::all();
        return view('courses.edit', compact('course','tracks'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $validated = $request->validated();
        $course->update($validated);
        $course->tracks()->sync($request->input('track_ids'));
        return to_route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return to_route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
