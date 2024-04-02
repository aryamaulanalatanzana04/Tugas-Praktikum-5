<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
      /* The code `->call([PositionSeeder::class, EmployeeSeeder::class]);` is calling the `run`
      method of the `PositionSeeder` and `EmployeeSeeder` classes. This is a common practice in
      Laravel database seeding to populate the database with initial data. The `run` method
      typically contains the logic to insert data into the database tables using Eloquent models or
      raw SQL queries. By calling the `run` method of seeders in the `DatabaseSeeder` class, you can
      easily seed the database with the specified data when running the database seeder. */
        $this->call([
            PositionSeeder::class,
            EmployeeSeeder::class
        ]);

    }
}
