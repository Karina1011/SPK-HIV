<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin_user = new role;
        $role_admin_user->name ='admin';
        $role_admin_user->save();

        $role_regular_user = new role;
        $role_regular_user->name ='user';
        $role_regular_user->save();
    }
}
