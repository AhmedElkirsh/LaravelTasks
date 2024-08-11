<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    function index() 
    {
        $students=Student::all();
        return view('students/index',compact("students"));
    }

    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $student = Student::create($validated);
        return to_route('students.index');
    }

    public function create()
    {    
        $tracks=Track::all();
        return view('students/create',compact('tracks'));
    }

    function show(Student $student)
    {
        return view('students/show',compact("student"));
    }

    public function update(Student $student, StoreStudentRequest $request)
    { 
        
        $validated = $request->validated();

        if ($request->hasFile('image')) {

            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }

            $imagePath = $request->file('image')->store('images/students', 'public');
            $validated['image'] = $imagePath;
        }

        $student->update($validated);

        return to_route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return to_route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function edit(Student $student)
    {
        $tracks = Track::all();
        return view('students.edit', compact('student', 'tracks'));
    }

}
