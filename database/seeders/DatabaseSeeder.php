<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'siulacio',
            'email' => 'siulacio@hotmail.com',
            'password' => '12345678',
        ]);
    }
}
