<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolDay;
use Carbon\Carbon;

class SchoolDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start = Carbon::create(2025,8,1);
        $end = Carbon::create(2026,5,30);

        while ($start <= $end) {

            $type = 'class_day';

            if ($start->isWeekend()) {
                $type = 'holiday';
            }

            SchoolDay::create([
                'date'=>$start->toDateString(),
                'type'=>$type,
                'title'=>$type == 'holiday' ? 'Weekend' : 'Regular Class',
                'description'=>null
            ]);

            $start->addDay();
        }

        SchoolDay::create([
            'date'=>'2025-12-25',
            'type'=>'holiday',
            'title'=>'Christmas Break'
        ]);

        SchoolDay::create([
            'date'=>'2026-03-15',
            'type'=>'event',
            'title'=>'University Foundation Day'
        ]);
    }
}
