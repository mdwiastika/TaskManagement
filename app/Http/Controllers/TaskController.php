<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        try {
            $tasks = Task::query()->with(['course'])->latest()->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Tasks fetched successfully',
                'data' => $tasks
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
                'course_id' => 'required|integer|exists:courses,id',
                'name' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|string',
                'deadline' => 'required|date'
            ]);
            $task = Task::query()->create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Task created successfully',
                'data' => $task
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
            $task = Task::query()->with(['course'])->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Task fetched successfully',
                'data' => $task
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
            $task = Task::query()->findOrFail($id);
            $validatedData = $request->validate([
                'course_id' => 'required|integer|exists:courses,id',
                'name' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|string',
                'deadline' => 'required|date'
            ]);
            $task->update($validatedData);
            $task->load('course');
            return response()->json([
                'status' => 'success',
                'message' => 'Task updated successfully',
                'data' => $task
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
            $task = Task::query()->findOrFail($id);
            $task->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Task deleted successfully',
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
