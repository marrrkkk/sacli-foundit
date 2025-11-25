<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/**
 * TEMPORARY SETUP ROUTE - DELETE AFTER USE
 * 
 * Access this route once to create the admin user, then delete this file
 * and remove the require from bootstrap/app.php
 */

Route::get('/setup-admin-user', function () {
  // Check if admin user already exists
  $existingAdmin = User::where('email', 'startupadmin@gmail.com')->first();

  if ($existingAdmin) {
    $existingAdmin->update([
      'password' => Hash::make('12345678'),
      'role' => 'admin',
    ]);
    return response()->json([
      'success' => true,
      'message' => 'Admin user already existed. Password has been updated.',
      'email' => 'startupadmin@gmail.com',
      'note' => 'DELETE routes/setup.php and remove it from bootstrap/app.php NOW!'
    ]);
  }

  User::create([
    'name' => 'Admin',
    'email' => 'startupadmin@gmail.com',
    'password' => Hash::make('12345678'),
    'role' => 'admin',
    'email_verified_at' => now(),
  ]);

  return response()->json([
    'success' => true,
    'message' => 'Admin user created successfully!',
    'email' => 'startupadmin@gmail.com',
    'note' => 'DELETE routes/setup.php and remove it from bootstrap/app.php NOW!'
  ]);
});
