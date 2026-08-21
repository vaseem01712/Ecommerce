<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Creates (or safely updates) the panel owner from deployment-only env vars.
     * No reusable password is committed to the application source.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command?->warn('Admin user skipped: set ADMIN_EMAIL and ADMIN_PASSWORD first.');
            return;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_NAME', 'Store Administrator'),
                'password' => Hash::make($password),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
        );
    }
}
