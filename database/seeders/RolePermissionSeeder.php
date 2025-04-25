<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define permissions
        $permissions = [
            'create-listing',
            'edit-property',
            'view-transactions',
            'request-listing',
            'save-favorite',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign to roles
        $agent     = Role::firstOrCreate(['name' => 'agent']);
        $user      = Role::firstOrCreate(['name' => 'user']);
        $developer = Role::firstOrCreate(['name' => 'developer']);
        // $admin  = Role::firstOrCreate(['name' => 'admin']);
        // $owner  = Role::firstOrCreate(['name' => 'owner']);

        //seeder not running yet, define the permission here first:
        $agent->syncPermissions(['create-listing', 'edit-property', 'view-transactions']);
        $user->syncPermissions(['request-listing', 'save-favorite']);
    }
}
