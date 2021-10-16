<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::query()->firstOrCreate([
            'email' => 'admin@app.com',

        ], [
            'name' => 'Admin',
            'password' => Hash::make('123456789'),
        ]);

        if ($admin->wasRecentlyCreated) {
            $this->command->info('Created successfully');
            return;
        }

        $this->command->info('Admin created before!');
    }
}
