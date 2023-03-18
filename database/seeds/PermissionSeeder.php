<?php

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
        //
        $permission = Permission::create(['name' => 'user.index']);
        $permission = Permission::create(['name' => 'user.create']);
        $permission = Permission::create(['name' => 'user.update']);
        $permission = Permission::create(['name' => 'user.delete']);
    }
}
