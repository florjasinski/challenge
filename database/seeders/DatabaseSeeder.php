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
        $users = User::factory(5)->create(); 
    
        foreach ($users as $user) {
            
    
            Contact::factory(10)->create([
                'user_id' => $user->id,
            ]);
        }
    }
    
}
