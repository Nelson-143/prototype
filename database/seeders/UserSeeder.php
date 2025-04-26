<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect([
            [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'phone_number' => '+254715144962',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'photo' => 'default_admin.jpg'
            ],
            [
                'name' => 'quest',
                'email' => 'quest@quest.com',
                'email_verified_at' => now(),
                'phone_number' => '+254715144962',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'photo' => 'admin.jpg'
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'phone_number' => '+254715144962',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'photo' => 'admin.jpg'
            ]
        ]);

        $users->each(function ($user) {
            User::insert($user);
        });
    }
}
