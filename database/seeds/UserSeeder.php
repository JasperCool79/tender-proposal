<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'name'=> 'Admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('123456789'),
            'is_admin'=> 1,
            'city'=>'Yangon',
            'country'=>"Myanmar",
            'phone'=>'098888888',
            'company'=>'A Company'
        ]);
        User::create([
            'name'=> 'User',
            'email'=> 'user@gmail.com',
            'password'=> Hash::make('123456789'),
            'is_admin'=> 0,
            'city'=>'Mandalay',
            'country'=>"Myanmar",
            'phone'=>'097766655',
            'company'=>'B Company'
        ]);
    }
}