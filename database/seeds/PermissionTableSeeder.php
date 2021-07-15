<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            'proveedor-list',
            'proveedor-create',
            'proveedor-edit',
            'proveedor-delete',
            'purchase-list',
            'purchase-create',
            'purchase-edit',
            'purchase-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
