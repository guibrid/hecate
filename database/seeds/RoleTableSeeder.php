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
        $role_client->name = 'user';
        $role_client->save();

        $role_editor = new Role();
        $role_editor->name = 'editor';
        $role_editor->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->save();

        $role_director = new Role();
        $role_director->name = 'director';
        $role_director->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->save();
    }
}
