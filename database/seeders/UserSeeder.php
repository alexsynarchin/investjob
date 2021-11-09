<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('slug', 'super-admin')->first();
        $super_admin = new User();
        $super_admin->name = 'Алексей';
        $super_admin->login = "gwynbleid11";
        $super_admin->surname = "Сунарчин";
        $super_admin->email = "gwynbleid11@yandex.ru";
        $super_admin->password = bcrypt('rivia111');
        $super_admin->save();
        $super_admin->roles()->attach($role);
    }
}
