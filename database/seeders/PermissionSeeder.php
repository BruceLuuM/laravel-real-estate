<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = Admin::factory()->create([
            'name' => 'Minh',
            'email' => 'minh@email.com',
            'roles' => '0 1 2',
            'phonenumber' => '0123456789'
        ]);

        $user = Admin::factory()->create([
            'name' => 'Minh2',
            'email' => 'minhadmin@email.com',
            'roles' => '0 1 2',
            'phonenumber' => '0936481861',
        ]);
    }
}
