<?php

namespace Database\Seeders;


use App\Models\Module;
use App\Models\ModuleFunction;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModuleFunction::create([
            'function_name' => 'MANAGE',
            'function_folder' => 'manage_users',
            'function_file' => 'manage',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminManageUser',
            'description' => 'User management',
            'used' => 1,
            'active' => 1,
        ]);
        ModuleFunction::create([
            'function_name' => 'ADD',
            'function_folder' => 'manage_users',
            'function_file' => 'create',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminCreateUser',
            'description' => 'User creation',
            'used' => 1,
            'active' => 1,
        ]);

        ModuleFunction::create([
            'function_name' => 'MANAGE',
            'function_folder' => 'manage_admins',
            'function_file' => 'manage',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminManageAdmin',
            'description' => 'Admin management',
            'used' => 1,
            'active' => 1,
        ]);
        ModuleFunction::create([
            'function_name' => 'ADD',
            'function_folder' => 'manage_admins',
            'function_file' => 'create',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminCreateAdmin',
            'description' => 'Admin creation',
            'used' => 1,
            'active' => 1,
        ]);
        ModuleFunction::create([
            'function_name' => 'MANAGE',
            'function_folder' => 'manage_categories',
            'function_file' => 'manage',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminManageCategory',
            'description' => 'Category management',
            'used' => 1,
            'active' => 1,
        ]);
        ModuleFunction::create([
            'function_name' => 'ADD',
            'function_folder' => 'manage_categories',
            'function_file' => 'create',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminCreateCategory',
            'description' => 'Category creation',
            'used' => 1,
            'active' => 1,
        ]);

        ModuleFunction::create([
            'function_name' => 'MANAGE',
            'function_folder' => 'manage_investers',
            'function_file' => 'manage',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminManageInvester',
            'description' => 'Invester management',
            'used' => 1,
            'active' => 1,
        ]);
        ModuleFunction::create([
            'function_name' => 'ADD',
            'function_folder' => 'manage_investers',
            'function_file' => 'create',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminCreateInvester',
            'description' => 'Invester creation',
            'used' => 1,
            'active' => 1,
        ]);

        ModuleFunction::create([
            'function_name' => 'MANAGE',
            'function_folder' => 'manage_news',
            'function_file' => 'manage',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminManageNew',
            'description' => 'New management',
            'used' => 1,
            'active' => 1,
        ]);
        ModuleFunction::create([
            'function_name' => 'ADD',
            'function_folder' => 'manage_news',
            'function_file' => 'create',
            'function_css' => '',
            'function_position' => '',
            'function_route' => 'adminCreateNew',
            'description' => 'New creation',
            'used' => 1,
            'active' => 1,
        ]);

        $module = Module::create(
            [
                'module_name' => 'USER',
                'module_folder' => 'manage_users',
                'module_file' => 'manage',
                'module_css' => '',
                'module_position' => '',
                'module_route' => 'adminManageUser',
                'module_function_id' => '1 2',
                'active' => 1
            ]
        );
        $module = Module::create(
            [
                'module_name' => 'ADMIN',
                'module_folder' => 'manage_admins',
                'module_file' => 'manage',
                'module_css' => '',
                'module_position' => '',
                'module_route' => 'adminManageUser',
                'module_function_id' => '3 4',
                'active' => 1
            ]
        );
        $module = Module::create(
            [
                'module_name' => 'CATEGORY',
                'module_folder' => 'manage_categories',
                'module_file' => 'manage',
                'module_css' => '',
                'module_position' => '',
                'module_route' => 'adminManageCategory',
                'module_function_id' => '5 6',
                'active' => 1
            ]
        );
        $module = Module::create(
            [
                'module_name' => 'INVESTER',
                'module_folder' => 'manage_investers',
                'module_file' => 'manage',
                'module_css' => '',
                'module_position' => '',
                'module_route' => 'adminManageInvester',
                'module_function_id' => '7 8',
                'active' => 1
            ]
        );
        $module = Module::create(
            [
                'module_name' => 'NEW',
                'module_folder' => 'manage_news',
                'module_file' => 'manage',
                'module_css' => '',
                'module_position' => '',
                'module_route' => 'adminManageNew',
                'module_function_id' => '9 10',
                'active' => 1
            ]
        );
    }
}
