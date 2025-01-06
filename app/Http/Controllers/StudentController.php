<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students= Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name'=>'required',
            'Email'=>'required',
            'Roll_Number'=>'required|integer',
            'image'=>'required'
        ]);

        $file= $request->file('image');
        $fileName= time() . '_' . $file->getClientOriginalName();
        $path= public_path($fileName);
        $manager = new ImageManager(new Driver());
        $image=$manager->read($file);
        $image= $image->resize(300, 200);
        $image->toJpeg(80)->save($path);
        
        

        Student::create([
            'Name'=>$request->Name,
            'Email'=>$request->Email,
            'Roll_Number'=>$request->Roll_Number,
            'image'=>$fileName
        ]);
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'Name'=>'required',
            'Email'=>'required',
            'Roll_Number'=>'required|integer',
            'image'=>'required'
        ]);

        $file= $request->file('image');
        $fileName= time() . '_' . $file->getClientOriginalName();
        $path= public_path($fileName);
        $manager = new ImageManager(new Driver());
        $image=$manager->read($file);
        $image= $image->resize(300, 200);
        $image->toJpeg(80)->save($path);

        $student->update([
            'Name'=>$request->Name,
            'Email'=>$request->Email,
            'Roll_Number'=>$request->Roll_Number,
            'image'=>$fileName
        ]);
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
