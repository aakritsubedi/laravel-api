<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);

        return response($students, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        $student->fullname = $request->fullname;
        $student->email = $request->email;
        $student->contact_no = $request->contact_no;
        $student->status = 1;
        $student->save();

        return response()->json([
            "status" => 1,
            "message" => "Student Record added successfully."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::findOrFail($id)->toJson(JSON_PRETTY_PRINT);

            return response($student, 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Student not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::findOrFail($id)->update($request->all());

            return response([
                "success" => 1,
                "message" => "Student Record updated successfully"
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Student not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Student::where('id', $id)->exists()) {
            Student::destroy($id);

            return response()->json([
                "message" => "Student recorded delected."
            ], 202);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Student not found"
            ], 404);
        }
    }
}
