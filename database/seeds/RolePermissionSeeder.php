<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin = Role::whereName('Admin')->first();

        foreach ($permissions as $permission) {
            DB::table('role_permissions')->insert([
                'role_id' => $admin->id,
                'permission_id' => $permission->id,
            ]);
        }

        $employer = Role::whereName('Employer')->first();

        foreach ($permissions as $permission) {
            if (!in_array($permission->name, ['employer_roles'])) {
                DB::table('role_permissions')->insert([
                    'role_id' => $employer->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }

        $applicant = Role::whereName('Applicant')->first();

        $viewerRoles = [
            'view_resume',
            'add_resume',
            'edit_resume',
            'view_roles',
            'view_vacancy',
        ];

        foreach ($permissions as $permission) {
            if (in_array($permission->name, $viewerRoles)) {
                DB::table('role_permissions')->insert([
                    'role_id' => $applicant->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }
    }
}
