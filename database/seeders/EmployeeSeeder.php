<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* `DB::table('employees')->insert([` is inserting data into the 'employees' table in the
        database. The data being inserted is an array of associative arrays, where each associative
        array represents a row to be inserted into the 'employees' table. Each key in the
        associative array corresponds to a column in the table, and the value represents the data to
        be inserted into that column for the respective row. */
        DB::table('employees')->insert([
            [
                'firstname'=>'arya',
                'lastname'=>'latanzana',
                'email'=>"aryalatanzana@soleroso.com",
                'age'=>'20',
                'positions_id'=>2
            ],
            [
                'firstname'=>'ya',
                'lastname'=>'maulana',
                'email'=>"mau@soleroso.com",
                'age'=>'21',
                'positions_id'=>4
            ]
        ]);
    }
}
