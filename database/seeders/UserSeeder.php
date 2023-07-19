<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => "fsilva.web@gmail.com",
            'password' => bcrypt("ADMIN#123"),
            'is_admin' => true
        ]);

        User::factory()->create([
            'email' => "felipe.teste@gmail.com",
            'password' => bcrypt('usuario@123')
        ]);
    }
}
