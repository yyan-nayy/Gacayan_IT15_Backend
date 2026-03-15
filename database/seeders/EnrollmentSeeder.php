<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseIds = Course::pluck('id')->toArray();

        Student::chunk(100, function ($students) use ($courseIds) {
            foreach ($students as $student) {
                $selected = collect($courseIds)
                    ->shuffle()
                    ->take(rand(3, 5))
                    ->toArray();

                foreach ($selected as $courseId) {
                    Enrollment::firstOrCreate([
                        'student_id' => $student->id,
                        'course_id' => $courseId,
                    ]);
                }
            }
        });
    }
}
