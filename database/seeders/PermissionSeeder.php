<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $permissions =  [
            //permission for Permissions
            [
                "name" => "permission-index",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-data",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-create",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-store",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-show",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-edit",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-update",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            [
                "name" => "permission-delete",
                "guard_name" => "web",
                "group_name" => "permission",
            ],
            //permission for roles
            [
                "name" => "role-index",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-data",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-create",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-store",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-show",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-edit",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-update",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            [
                "name" => "role-delete",
                "guard_name" => "web",
                "group_name" => "role",
            ],
            //permission for users
            [
                "name" => "user-index",
                "guard_name" => "web",
                "group_name" => "user",
            ],
            [
                "name" => "user-data",
                "guard_name" => "web",
                "group_name" => "user",
            ],
            [
                "name" => "user-create",
                "guard_name" => "web",
                "group_name" => "user",
            ],
            [
                "name" => "user-store",
                "guard_name" => "web",
                "group_name" => "user",
            ],
            [
                "name" => "user-show",
                "guard_name" => "web",
                "group_name" => "user",
            ],
            [
                "name" => "user-edit",
                "guard_name" => "web",
                "group_name" => "user",
            ],
            [
                "name" => "user-update",
                "guard_name" => "web",
                "group_name" => "user",
            ],
            [
                "name" => "user-delete",
                "guard_name" => "web",
                "group_name" => "user",
            ],




            //permission for registration
            [
                "name" => "registration-index",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
            [
                "name" => "registration-data",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
            [
                "name" => "registration-create",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
            [
                "name" => "registration-store",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
            [
                "name" => "registration-show",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
            [
                "name" => "registration-edit",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
            [
                "name" => "registration-update",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
            [
                "name" => "registration-delete",
                "guard_name" => "web",
                "group_name" => "registration",
            ],
        ];

        foreach ($permissions as $permission) {
            $menu = new Permission();
            $menu->fill($permission);
            $menu->save();
        }
    }
}
