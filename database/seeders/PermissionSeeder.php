<?php

namespace Database\Seeders;

use App\Models\Permission as Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermission();
        $this->createRoles();
    }
    private function createPermission()
    {
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission["name"]],
                $permission
            );
        }
        $this->command->info('Default Permissions addded');
    }

    private function createRoles()
    {
        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'description' => 'administrador'
        ]);
        $admin->permissions()->sync(Permission::all());
    }
}
