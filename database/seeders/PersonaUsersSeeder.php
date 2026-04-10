<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PersonaUsersSeeder extends Seeder
{
    /**
     * Seed persona users for the project brief.
     */
    public function run(): void
    {
        $defaultPassword = Hash::make('Password123!');

        User::updateOrCreate(
            ['email' => 'orikornel@yahoo.co.uk'],
            ['name' => 'Kornel', 'password' => $defaultPassword]
        );

        User::updateOrCreate(
            ['email' => 'sarah.smith@example.com'],
            ['name' => 'Sarah Smith', 'password' => $defaultPassword]
        );

        User::updateOrCreate(
            ['email' => 'mark.byrne@example.com'],
            ['name' => 'Mark Byrne', 'password' => $defaultPassword]
        );
    }
}
