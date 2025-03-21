<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => "Mohamed",
            'last_name' => "Afssas",
            'email' => "afssas@wikybook.com",
            'password' => Hash::make('afssas'),
            'status' => true
        ]);


         User::create([
            'first_name' => "Hassan",
            'last_name' => "Agmir",
            'email' => "agmir@wikybook.com",
            'password' => Hash::make('agmir'),
            'status' => true
        ]);
    }
}
