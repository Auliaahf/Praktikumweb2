<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("students")->insert([
            [
                'name' => 'Aulia Fitri Hanifah',
                'student_id_number' => 'F55122068',
                'email' => 'auliaa@gmail.com',
                'phone_number' => '6282259520912',
                'birth_date' => '2004-11-20',
                'gender' => 'female',
                'status' => 'Active',
                'major_id' => 1,
            ],
            [
                'name' => 'Hifa Alia',
                'student_id_number' => 'F55122300',
                'email' => 'hifaalya@gmail.com',
                'phone_number' => '6282255432199',
                'birth_date' => '2004-02-11',
                'gender' => 'Female',
                'status' => 'Inactive',
                'major_id' => 2,
            ]
        ]);
    }
}
