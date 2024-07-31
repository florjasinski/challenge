<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un usuario sin la columna 'name'
        $user = User::factory()->create([
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'), // Puedes ajustar esto según tus necesidades
        ]);

        // Crear posts asociados a ese usuario
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
