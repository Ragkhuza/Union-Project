<?php

use App\Course;
use App\School;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = School::count();
        for ($i = 0; $i < 50; $i++) {
            Course::create([
                'name' => "course$i",
                'tuition' => rand(5000, 70000),
                'school_id' => rand(1, $max),
            ]);
        }
    }
}
