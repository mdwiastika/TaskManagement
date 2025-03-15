<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        try {
            $courses = Course::query()->latest()->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Courses fetched successfully',
                'data' => $courses
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string'
            ]);

            $validatedData['slug'] = null;
            $course = Course::query()->create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Course created successfully',
                'data' => $course
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $course = Course::query()->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Course fetched successfully',
                'data' => $course
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => []
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string'
            ]);

            $course = Course::query()->findOrFail($id);
            $validatedData['slug'] = null;
            $course->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Course updated successfully',
                'data' => $course
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $course = Course::query()->findOrFail($id);

            $course->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Course deleted successfully',
                'data' => []
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
}
