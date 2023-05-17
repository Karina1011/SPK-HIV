<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'ini admin';
        $admin->usename = 'admin';
        $admin->email = 'admin@gmil.com';
        $admin->password = Hash::make ('admin');
        $admin->save();
        $admin->roles()->attach(role::where('name','admin')->first());

        $user = new User;
        $user->name = 'ini user';
        $user->usename = 'user';
        $user->email = 'user@gmil.com';
        $user->password = Hash::make ('password');
        $user->save();
        $user->roles()->attach(role::where('name','user')->first());
    }
}
