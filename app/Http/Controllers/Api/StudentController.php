<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class StudentController extends Controller
{
    public function index() 
    {   

        //Get all students
        $students = Student::all();

        $data = [
            'students' => $students,
            'status' => 200
        ];

        return response()->json($data, 200); 
    }

    public function store(Request $request) 
    {

         // Validate fields
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:Javascript,Go'
        ]);

        // Log the validated data
        Log::info('Validated data:', $validatedData);

        // Create new student using Student model
        $student = Student::create($validatedData);

        
        //Response if there was an error creating the student
        if(!$student) {
            $data = [
                'message' => 'Error creating the student',
                'status' => 500
            ];

            return response()->json($data, 500);
        };

        //Response if the student was created successfully
        $data = [
            'student' => $student,
            'status' => 201
        ];

        return response()->json($data, 201);

    }

    public function show($id) 
    {
        $student = Student::find($id);

        if(!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'student' => $student,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function destroy($id) 
    {
        $student = Student::find($id);

        if(!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
        }

        $student->delete();

        $data = [
            'message' => 'Student deleted successfully',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)  
    {
        $student = Student::find($id);

        if(!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        // Validate fields
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:Javascript,Go'
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->language = $request->language;

        $student->save();

        $data = [
            'message' => 'Student updated', 
            'student' => $student,
            'status' => 200
        ];

        return response()->json($data, 200);

    }
}
