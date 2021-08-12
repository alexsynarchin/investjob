<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = new Role();
        $super_admin -> name = 'Супер Администратор';
        $super_admin -> slug = 'super-admin';
        $super_admin -> save();

        $applicant = new Role();
        $applicant -> name = 'Соискатель';
        $applicant -> slug = 'applicant';
        $applicant -> save();

        $employer = new Role();
        $employer -> name = 'Работодатель';
        $employer -> slug = 'employer';
        $employer -> save();

        $agent  = new Role();
        $agent -> name = 'Агент';
        $agent  -> slug = 'agent';
        $agent  -> save();
        //learning-center

        $learning_center =  new Role();
        $learning_center -> name = 'Учебное заведение';
        $learning_center  -> slug = 'learning-center';
        $learning_center  -> save();
    }
}
