<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SchoolDay;

class SchoolDayController extends Controller
{
    public function index()
    {
        return SchoolDay::orderBy('date')->get();
    }

    public function show($id)
    {
        return SchoolDay::findOrFail($id);
    }
}