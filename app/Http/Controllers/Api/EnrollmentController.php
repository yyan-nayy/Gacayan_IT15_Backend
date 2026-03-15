<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * GET /api/enrollments
     */
    public function index(Request $request)
    {
        $query = Enrollment::with(['student', 'course']);

        if ($request->filled('student_id')) {
            $query->where('student_id', $request->query('student_id'));
        }

        if ($request->filled('course_id')) {
            $query->where('course_id', $request->query('course_id'));
        }

        return $query->paginate(20);
    }

    /**
     * GET /api/enrollments/{id}
     */
    public function show($id)
    {
        return Enrollment::with(['student', 'course'])->findOrFail($id);
    }

    /**
     * POST /api/enrollments
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $enrollment = Enrollment::firstOrCreate($data);

        return response()->json($enrollment->load(['student', 'course']), 201);
    }
}
