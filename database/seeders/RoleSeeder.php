<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);

        $permission_create_role = Permission::create(['name' => 'create role']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update role']);
        $permission_delete_role = Permission::create(['name' => 'delete role']);

        //permisos para tipo de tramite
        $permission_create_tipo_tramite = Permission::create(['name' => 'create tipo_tramite']);
        $permission_read_tipo_tramite = Permission::create(['name' => 'read tipo_tramite']);
        $permission_update_tipo_tramite = Permission::create(['name' => 'update tipo_tramite']);
        $permission_delete_tipo_tramite = Permission::create(['name' => 'delete tipo_tramite']);

        //permisos para documento
        $permission_create_document = Permission::create(['name' => 'create document']);
        $permission_read_document = Permission::create(['name' => 'read document']);
        $permission_update_document = Permission::create(['name' => 'update document']);
        $permission_delete_document = Permission::create(['name' => 'delete document']);

        //permisos para tipo de documento
        $permission_create_tipo_documento = Permission::create(['name' => 'create tipo_documento']);
        $permission_read_tipo_documento = Permission::create(['name' => 'read tipo_documento']);
        $permission_update_tipo_documento = Permission::create(['name' => 'update tipo_documento']);
        $permission_delete_tipo_documento = Permission::create(['name' => 'delete tipo_documento']);

        $permissions_admin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role,
            $permission_create_tipo_tramite,
            $permission_read_tipo_tramite,
            $permission_update_tipo_tramite,
            $permission_delete_tipo_tramite,
            $permission_create_document,
            $permission_read_document,
            $permission_update_document,
            $permission_delete_document,
            $permission_create_tipo_documento,
            $permission_read_tipo_documento,
            $permission_update_tipo_documento,
            $permission_delete_tipo_documento
        ];

        $permissions_user = [
            $permission_read_tipo_tramite,
            $permission_read_document,
            $permission_create_document,
            $permission_update_document,
            $permission_read_tipo_documento

        ];

        // Asignar permisos a los roles
        // $role_admin->givePermissionTo($permissions_admin);
        // $role_user->givePermissionTo($permissions_user);
        $role_admin->syncPermissions($permissions_admin);
        $role_user->syncPermissions($permissions_user);




    }
}
