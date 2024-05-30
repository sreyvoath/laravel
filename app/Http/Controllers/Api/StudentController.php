<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::list();
        $students = StudentResource::collection($students);
        return response()->json(['success' => true, 'data' => $students], 200);
    }

    public function store(Request $request)
    {
        Student::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'student created successfully'
        ], 200);
    }
    public function show(string $id)
    {
        $student = Student::find($id);
        $student = new ($student);
        return response()->json(['success' => true, 'data' => $student], 200);

    }
    public function update(Request $request, string $id)
    {
        Student::store($request,$id);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'student updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'student deleted successfully'
        ], 200);
    }
}
