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
}
