<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Profesor']);
        Role::create(['name' => 'Estudiante']);
        Role::create(['name' => 'Padre']);
        Role::create(['name' => 'Admin']);
    }
}
