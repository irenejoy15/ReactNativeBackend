<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $password = 'irene143143';
        $hash_password = bcrypt($password);
        User::factory()->create([
            'name' => 'IRENE JOY',
            'email' => 'irenejoy15@gmail.com',
            'password' => $hash_password,
        ]);
    }
}
