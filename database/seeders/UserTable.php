<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newAdmin =  User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            // 'uuid' => Str::uuid(),
            'password' => Hash::make('password'),
            
        ]);
        $newAdmin->assignRole('Super Admin');

        $newUser =  User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            // 'uuid' => Str::uuid(),
            'password' => Hash::make('password'),
            
        ]);
        $newUser->assignRole('Student');

    }
}
