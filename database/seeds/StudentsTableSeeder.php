<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $students = array([
                'name' => 'Jawad Kaisrani',
                'fathername' => 'Kaisrani',
                'gender' => 'male',
                'age' => '24',
                'dob' => '10/11/1993',
                'cnic' => '6110155771901',
                'address' => 'Street 25, Harley Street Rawalpindi',
                'email' => 'Jawadkaisrani@gmail.com',
                'username' => 'jawad',
                'password' => bcrypt('jawad'),
                'dpt' => 'CS',
                'shift' => '1',
                'cgpa' => '2.67',
                'fee_status' => 'clear',
                'library_status' => 'clear'
            ],
            [
                'name' => 'Yasir Ibrar',
                'fathername' => 'Ibrar Ahmed',
                'gender' => 'male',
                'age' => '24',
                'dob' => '10/11/1993',
                'cnic' => '6110155771902',
                'address' => 'Street 25, Harley Street Rawalpindi',
                'email' => 'yasir@gmail.com',
                'username' => 'yasir',
                'password' => bcrypt('yasir'),
                'dpt' => 'CS',
                'shift' => '1',
                'cgpa' => '2.37',
                'fee_status' => 'clear',
                'library_status' => 'clear'
            ],
            [
                'name' => 'Tabish Saleem',
                'fathername' => 'Saleem',
                'gender' => 'male',
                'age' => '21',
                'dob' => '10/11/1993',
                'cnic' => '6110155771931',
                'address' => 'Street 25, Harley Street Rawalpindi',
                'email' => 'tabish@gmail.com',
                'username' => 'tabish',
                'password' => bcrypt('tabish'),
                'dpt' => 'CS',
                'shift' => '1',
                'cgpa' => '2.57',
                'fee_status' => 'pending',
                'library_status' => 'clear'
            ],
            [
                'name' => 'Syed Abdullah',
                'fathername' => 'Syed Yamin Shah',
                'gender' => 'male',
                'age' => '24',
                'dob' => '10/11/1993',
                'cnic' => '6110155771909',
                'address' => 'Street 25, Harley Street Rawalpindi',
                'email' => 'abdullah@gmail.com',
                'username' => 'abdullah',
                'password' => bcrypt('abdullah'),
                'dpt' => 'CS',
                'shift' => '1',
                'cgpa' => '3.57',
                'fee_status' => 'clear',
                'library_status' => 'pending'
            ]
        );
        
        foreach ($students as $key => $student) {
            # code...
            DB::table('students')->insert($student);
        }
    }
}
