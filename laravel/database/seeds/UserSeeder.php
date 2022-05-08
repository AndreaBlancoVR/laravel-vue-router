<?php

use\App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Andrea',
            'email' => 'andreablanco@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
