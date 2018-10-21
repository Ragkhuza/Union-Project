<?php

use App\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            School::create([
                'name' => "feutech$i",
                'email' => "feutech$i@gmail.com",
                'req_grade' => 1.0,
                'interviews' => true,
                'password' => Hash::make('12345678')
            ]);
        }

    }
}
