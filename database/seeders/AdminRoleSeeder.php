<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\PermissionAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *s
     */
    public function run()
    {
        $permission_action_1 = PermissionAction::create([
            'action_name' => 'Create',
            'description' => 'Admin',
        ]);
        $permission_action_2 = PermissionAction::create([
            'action_name' => 'Edit',
            'description' => 'Admin',
        ]);
        $permission = Permission::create([
            'permission_name' => 'Create-only Admin Manage',
            'action_id' => "$permission_action_1->id $permission_action_2->id",
        ]);
        $permission = Permission::create([
            'permission_name' => 'Create-only Admin Manage',
            'action_id' => "$permission_action_1->id $permission_action_2->id",
        ]);
        Role::create([
            'role_name' => 'adminstrator',
            'permission_id' => $permission->id,
            'description' => 'Mange literally everything'
        ]);
    }
}
