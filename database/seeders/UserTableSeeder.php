<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'admin',
                'email'=>'iniadmin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'dokter',
                'email'=>'dokter@gmail.com',
                'role'=>'dokter',
                'password'=>bcrypt('123456')
            ],
        ];
        
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
