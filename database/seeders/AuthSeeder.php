<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin1',
            'email'=>'admin@admin.com',
            'role'=>'admin',
            'mobile'=>'01000000000',
            'password'=>Hash::make('admin@123456'),
        ]);


        User::create([
            'name'=>'admin2',
            'email'=>'car@admin.com',
            'role'=>'admin',
            'mobile'=>'01000000001',
            'password'=>Hash::make('car@123456'),
        ]);
    }
}
