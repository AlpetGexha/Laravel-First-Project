<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPremissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $premissions = [
            'post_access',
            'post_delte',
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
            'user_give_role',
            'chat_show',
        ];

        foreach ($premissions as $premission) {
            Permission::create(['name' => $premission]);
        }

        $admin = Role::create(['name' => 'admin']);
           Role::create(['name' => 'Super Admin']);

        foreach ($premissions as $premission) {
            $admin->givePermissionTo($premission);
        }
    }
}
