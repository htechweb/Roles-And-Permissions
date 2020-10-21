<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions


        Permission::create(['name' => 'access users management']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'manage roles and permissions']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'assign permissions']);



        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());


        $role = Role::create(['name' => 'admin'])
                        ->givePermissionTo([
                            'access users management',
                            'manage users',
                            'update users',
                            'manage roles and permissions',
                            'create roles',
                            'update roles',
                            'delete roles',
                            'assign permissions'
                        ]);

        $role = Role::create(['name' => 'customer']);
        $role = Role::create(['name' => 'driver']);

        $superAdmin1 = \App\Models\User::find(1)->assignRole('super-admin');
        $superAdmin1 = \App\Models\User::find(2)->assignRole('admin');
        $superAdmin1 = \App\Models\User::find(3)->assignRole('driver');
        $superAdmin1 = \App\Models\User::find(4)->assignRole('customer');

    }
}
