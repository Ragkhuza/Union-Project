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
        School::create([
            'name' => 'feutech',
            'email' => 'feutech@gmail.com',
            'req_grade' => 1.0,
            'interviews' => true,
            'password' => Hash::make('12345678')
        ]);
    }
}
