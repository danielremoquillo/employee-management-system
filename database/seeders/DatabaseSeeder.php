<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Leave;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        Employee::create([
            'employee_name' => 'Daniel Remoquillo',
            'employee_email' => fake()->unique()->safeEmail(),
            'employee_bday' => fake()->date(),
            'employee_gender' => 'Male',
            'employee_address' => fake()->address(),
            'employee_degree' => 'Doctoral Degree',
            'position_id' => '6'
        ]);

        User::create([
            'employee_id' => '1',
            'role_id' => '1',
            'email' => 'admin@ncf.ph',
            'password' => Hash::make('123')
        ]);

        Project::factory(10)->create();
        Employee::factory(20)->create();
        Leave::factory(10)->create();


        Position::create([
            'position_name' => 'Administrative Assistant',
            'position_salary' => '250000'
        ]);
        Position::create([
            'position_name' => 'Office Manager',
            'position_salary' => '100000'
        ]);
        Position::create([
            'position_name' => 'Account Executive',
            'position_salary' => '110000'
        ]);
        Position::create([
            'position_name' => 'Administrative Analyst',
            'position_salary' => '92000'
        ]);
        Position::create([
            'position_name' => 'Data Entry',
            'position_salary' => '50000'
        ]);
        Position::create([
            'position_name' => 'Admin Executive',
            'position_salary' => '500000'
        ]);

        Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'Employee'
        ]);
    }
}
