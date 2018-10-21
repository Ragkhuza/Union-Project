<?php

use App\Course;
use App\Role;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max_school = School::count() - 1;
        $max_course = Course::count() - 1;

/*        $role1 = Role::create([
            'name' => 'school',
        ]);*/

        $role2 = Role::create([
            'name' => 'student',
        ]);

        $role3 = Role::create([
            'name' => 'deped',
        ]);

/*        $user1 = User::create([
            'first_name'  => 'FEU',
            'middle_name' => 'feutech',
            'last_name'   => 'TECH',
            'email'       => 'feutech@gmail.com',
            'gender'       => 'male',
//            'contact'       => 9178373273,
            'password'    => Hash::make('12345678'),
//            'activated'   => true,
        ]);

        $user1->roles()->attach($role1->id);*/
        for ($i = 0; $i < 100; $i++) {
            $user2 = User::create([
                'first_name'  => "juancho$i",
                'middle_name' => 'student',
                'last_name'   => 'dela cruz',
                'email'       => "student$i@gmail.com",
                'gender'      => 'male',
//            'contact'       => 9178373873,
                'password'    => Hash::make('12345678'),
                'school_id'   => rand(1, $max_school),
                'course_id'   => rand(1, $max_course),
//            'activated'   => true,
            ]);

            $user2->roles()->attach($role2->id);
        }

        $user3 = User::create([
            'first_name'  => 'DEP',
            'middle_name' => 'deped',
            'last_name'   => 'ED',
            'email'       => 'deped@gmail.com',
            'gender'       => 'male',
//            'contact'       => 9178373873,
            'password'    => Hash::make('12345678'),
//            'activated'   => true,
            'school_id'    => 1,
        ]);

        $user3->roles()->attach($role3->id);
    }
}
