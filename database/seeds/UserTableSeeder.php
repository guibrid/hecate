<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Customer;

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

        $customer_user = Customer::where('name', 'Loockeed Martin')->first();

        $user = new User();
        $user->name = 'User Michel';
        $user->email = 'user@hecate.com';
        $user->password = bcrypt('a6wv7q85');
        $user->customer_id = $customer_user->id;
        $user->save();
        $user->roles()->attach($role_user);

        $editor = new User();
        $editor->name = 'Editor Martin';
        $editor->email = 'editor@hecate.com';
        $editor->password = bcrypt('a6wv7q85');
        $editor->save();
        $editor->roles()->attach($role_editor);

        $manager = new User();
        $manager->name = 'Manager Kevin';
        $manager->email = 'manager@hecate.com';
        $manager->password = bcrypt('a6wv7q85');
        $manager->save();
        $manager->roles()->attach($role_manager);

        $director = new User();
        $director->name = 'Director Patrick';
        $director->email = 'director@hecate.com';
        $director->password = bcrypt('a6wv7q85');
        $director->save();
        $director->roles()->attach($role_director);

        $admin = new User();
        $admin->name = 'Admin Guillaume';
        $admin->email = 'admin@hecate.com';
        $admin->password = bcrypt('a6wv7q85');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
