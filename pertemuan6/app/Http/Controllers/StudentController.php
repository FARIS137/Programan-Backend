<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
       
        $students = Student::all();

        if ($students) {
            $data = [
                'message' => 'Get all students',
                'data' => $students,
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data students is empty'
            ];
    
            return response()->json($data, 204);
        }

    }
    
    public function store(Request $request) {
       
        $student = new Student;
        $student->nama = $request->input('nama');
        $student->nim = $request->input('nim');
        $student->email = $request->input('email');
        $student->jurusan = $request->input('jurusan');
        $student->save();
        $data = [
            'message' => 'Students is created successfully',
            'data' => $student
        ];
        return response()->json($data, 201);

       
    }

    public function update(Request $request, $id) {

        $student = Student::find($id);

        if ($student) {
            $input = [
                'nama' => $request->input('nama') ?? $student->nama,
                'nim' => $request->input('nim') ?? $student->nim,
                'email' => $request->input('email') ?? $student->email,
                'jurusan' => $request->input('nama') ?? $student->jurusan
            ];

            $student->update($input);

            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id) {

        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => 'Student is deleted successfully',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function show($id) {

        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => "Get detail student",
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
            
            return response()->json($data, 404);
        }
    }
}