<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['CS101','Intro to Programming','Computer Science',3],
            ['CS102','Data Structures','Computer Science',3],
            ['CS201','Algorithms','Computer Science',3],
            ['CS301','Web Development','Computer Science',3],
            ['CS302','Database Systems','Computer Science',3],

            ['BA101','Principles of Management','Business',3],
            ['BA102','Marketing','Business',3],
            ['BA201','Financial Accounting','Business',3],
            ['BA202','Business Law','Business',3],

            ['ED101','Foundations of Education','Education',3],
            ['ED201','Educational Psychology','Education',3],
            ['ED301','Curriculum Development','Education',3],

            ['ENG101','Engineering Math','Engineering',4],
            ['ENG201','Thermodynamics','Engineering',3],
            ['ENG301','Fluid Mechanics','Engineering',3],

            ['NUR101','Fundamentals of Nursing','Nursing',3],
            ['NUR201','Medical Surgical Nursing','Nursing',3],
            ['NUR202','Pharmacology','Nursing',3],
            ['NUR301','Community Health Nursing','Nursing',3],
            ['NUR302','Pediatric Nursing','Nursing',3],
        ];

        foreach ($courses as $course) {
            Course::create([
                'course_code'=>$course[0],
                'course_name'=>$course[1],
                'department'=>$course[2],
                'units'=>$course[3]
            ]);
        }
    }
}