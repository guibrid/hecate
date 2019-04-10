<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_client = new Role();
        $role_client->name = 'User';
        $role_client->save();

        $role_editor = new Role();
        $role_editor->name = 'Editor';
        $role_editor->save();

        $role_manager = new Role();
        $role_manager->name = 'Manager';
        $role_manager->save();

        $role_director = new Role();
        $role_director->name = 'Director';
        $role_director->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->save();
    }
}
