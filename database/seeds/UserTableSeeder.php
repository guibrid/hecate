<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_editor = Role::where('name', 'Editor')->first();
        $role_manager = Role::where('name', 'Manager')->first();
        $role_director = Role::where('name', 'Director')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'User Michel';
        $user->email = 'user@hecate.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($role_user);

        $editor = new User();
        $editor->name = 'Editor Martin';
        $editor->email = 'editor@hecate.com';
        $editor->password = bcrypt('password');
        $editor->save();
        $editor->roles()->attach($role_editor);

        $manager = new User();
        $manager->name = 'Manager Kevin';
        $manager->email = 'manager@hecate.com';
        $manager->password = bcrypt('password');
        $manager->save();
        $manager->roles()->attach($role_manager);

        $director = new User();
        $director->name = 'Director Patrick';
        $director->email = 'director@hecate.com';
        $director->password = bcrypt('password');
        $director->save();
        $director->roles()->attach($role_director);

        $admin = new User();
        $admin->name = 'Admin Guillaume';
        $admin->email = 'admin@hecate.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
