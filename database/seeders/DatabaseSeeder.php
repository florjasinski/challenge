<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str; // Add this import statement

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);



    }
}
