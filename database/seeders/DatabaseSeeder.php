<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $premissions = [
            'admin_show',
            'post_access',
            'post_delete',
            'post_edit',
            'post_show',
            'comment_edit',
            'commnet_delete',
            'reaply_edit',
            'reaply_delete',
            'category_access',
            'category_edit',
            'category_delete',
            'category_show',
            'category_accept',
            'user_access',
            'user_delete',
            'user_edit',
            'user_show',
            'role_access',
            'role_delete',
            'role_edit',
            'role_show',
            'role_create',
            'permission_access',
            'permission_delete',
            'permission_edit',
            'permission_show',
            'user_give_role',
            'chat_show',
        ];

        foreach ($premissions as $premission) {
            Permission::create(['name' => $premission]);
        }

        $admin = Role::create(['name' => 'Super Admin']);

        foreach ($premissions as $premission) {
            $admin->givePermissionTo($premission);
        }

        $categorys = [
            'Programim',
            'Sport',
            'IT',
            'Teknollogji',
            'Lajme',
            'Kosovë',
            'Botë',
            'Sport',
            'Eksperti',
            'Ekonomi',
            'Stili',
            'Shëndetësi',
        ];

        foreach ($categorys as $category) {
            Category::create(['category' => Str::title($category), 'slug' => Str::slug($category, '-'), 'is_active' => 1]);
        }

        User::create([
            'name' => 'Admin',
            'mbiemri' => 'Admin',
            'email' => 'agexha@gmail.com',
            'username' => 'alpetg',
            'password' => Hash::make('Alpet123'),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Super Admin');
    }
}
