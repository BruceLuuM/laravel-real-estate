<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminIndependentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::factory()->create([
            'name' => 'Minh',
            'email' => 'minh@email.com',
            'roles' => '1.1 1.2 1.3 1.4',
            'phonenumber' => '0123456789',
        ]);

        Admin::factory()->create([
            'name' => 'Minh2',
            'email' => 'minhadmin@email.com',
            'roles' => '1.1 1.2 1.3 1.4',
            'phonenumber' => '0936481861',
        ]);
    }
}
