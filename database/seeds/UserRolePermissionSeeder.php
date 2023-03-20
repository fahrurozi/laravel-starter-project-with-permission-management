<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '11111111',
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $super_admin = User::create(array_merge([
                'name' => 'Super Admin',
                'email' => 'superadmin@mail.com',
            ], $default_user_value));

            $admin = User::create(array_merge([
                'name' => 'admin',
                'email' => 'admin@mail.com',
            ], $default_user_value));

            $user = User::create(array_merge([
                'name' => 'User 1',
                'email' => 'user1@mail.com',
            ], $default_user_value));

            $super_admin->assignRole('super_admin');
            $admin->assignRole('admin');
            $user->assignRole('user');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
