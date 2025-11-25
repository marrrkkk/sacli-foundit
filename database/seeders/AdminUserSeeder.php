<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $existingAdmin = User::where('email', 'startupadmin@gmail.com')->first();

        if ($existingAdmin) {
            $this->command->info('Admin user already exists. Updating password...');
            $existingAdmin->update([
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]);
            $this->command->info('Admin user password updated successfully!');
        } else {
            User::create([
                'name' => 'Admin',
                'email' => 'startupadmin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
            $this->command->info('Admin user created successfully!');
        }
    }
}
