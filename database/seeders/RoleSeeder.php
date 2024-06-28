<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// model
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission_guard = ['api','web'];
        $permission_role = ["user create","user update","user delete","user read"];


        $roles = ["admin","user"];

        foreach($permission_guard as $guards){
            foreach($roles as $role){
                Role::create(["name" => $role,"guard_name" => $guards]);
            }
            foreach($permission_role as $permission){
                Permission::create(["name" => $permission,"guard_name" => $guards]);
            }
        }
        

        // penghubungan antar role dan permission (tanggung jawab)
        $permission_admin = Role::findByName('admin');
        foreach($permission_role as $guard){
            $permission_admin->givePermissionTo($guard);
        }

        // penghubungan antar role_user dengan permission
        $permission_user = Role::findByName('user');
        foreach($permission_role as $guard){
            $permission_user->givePermissionTo($guard);
        }




    }
}
