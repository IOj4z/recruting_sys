<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Permission::insert([
            ['name' => 'view_users'],
            ['name' => 'edit_users'],
            ['name' => 'view_roles'],
            ['name' => 'edit_roles'],
            ['name' => 'view_resumes'],
            ['name' => 'edit_resumes'],
            ['name' => 'add_resumes'],
            ['name' => 'view_vacancy'],
            ['name' => 'edit_vacancy'],
            ['name' => 'add_vacancy'],
        ]);
    }
}
