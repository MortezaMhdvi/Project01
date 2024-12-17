<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'index-user', 'title' => 'ساخت کاربر', 'guard_name' => 'web'],
            ['name' => 'create-user', 'title' => 'ساخت کاربر', 'guard_name' => 'web'],
            ['name' => 'edit-user', 'title' => 'ساخت کاربر', 'guard_name' => 'web'],
            ['name' => 'delete-user', 'title' => 'ساخت کاربر', 'guard_name' => 'web'],

            ['name' => 'index-role', 'title' => 'ساخت نقش', 'guard_name' => 'web'],
            ['name' => 'create-role', 'title' => 'ساخت نقش', 'guard_name' => 'web'],
            ['name' => 'edit-role', 'title' => 'ویرایش نقش', 'guard_name' => 'web'],
            ['name' => 'delete-role', 'title' => 'حدف نقش', 'guard_name' => 'web'],

        ];
        DB::table('permissions')->insert($permissions);
    }
}
