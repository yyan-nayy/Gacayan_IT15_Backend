<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return Student::paginate(20);
    }

    public function show($id)
    {
        return Student::findOrFail($id);
    }

    // Chart Data: Monthly Enrollment
    public function enrollmentStats()
    {
        return Student::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    }
}