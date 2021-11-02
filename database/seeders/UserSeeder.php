<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Jose Daniel Soliz',
            'email'=>'jsoliz064@gmail.com',
            'password'=>password_hash('1234',PASSWORD_DEFAULT),
        ])->assignRole('Admin');

        User::create([
            'name'=>'Harold Romero',
            'email'=>'harold@gmail.com',
            'password'=>password_hash('1234',PASSWORD_DEFAULT),
        ])->assignRole('abogado');

        User::create([
            'name'=>'Darwin Mamani',
            'email'=>'darwin@gmail.com',
            'password'=>password_hash('1234',PASSWORD_DEFAULT),
        ])->assignRole('procurador');
    }
}
