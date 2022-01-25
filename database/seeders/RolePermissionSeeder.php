<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'user_give_verify',
            'chat_show',
        ];

        foreach ($premissions as $premission) {
            Permission::create(['name' => $premission]);
        }

        $admin = Role::create(['name' => 'Super Admin']);

        foreach ($premissions as $premission) {
            $admin->givePermissionTo($premission);
        }
    }
}
