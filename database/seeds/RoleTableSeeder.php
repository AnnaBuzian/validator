<?php

use App\Entity\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'employee';
        $role_employee->description = 'A Employee User';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'A Manager User';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'admin';
        $role_manager->description = 'A Admin User';
        $role_manager->save();
  }
}
