<?php

// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'flor@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);

        Contact::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
