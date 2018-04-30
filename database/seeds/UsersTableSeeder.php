<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Antonio Ramirez',
            'email' => 'ajrmzcs@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        $user->assignRole('super-admin');

    }
}
