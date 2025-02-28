<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

        //Validate fields
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'language' => 'required'
        ]);

        //Response if validation fails
        if($validator->fails()) {
            $data = [
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        };


        //Create new student using Student model
        $student = Student::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'language' => $request -> language
        ]);

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
