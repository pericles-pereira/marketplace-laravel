<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
                'firstName' => 'Rodrigo',
                'lastName' => 'Oliveirs',
                'email' => 'contato@rodrigo.com',
                'password' => bcrypt('1234567'),
        ]);
    }
}
