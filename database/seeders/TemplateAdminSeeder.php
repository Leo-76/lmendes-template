<?php

declare(strict_types=1);

namespace Lmendes\Template\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TemplateAdminSeeder extends Seeder
{
    /**
     * Seed a default admin user for quick start.
     * Run with: php artisan db:seed --class="Lmendes\Template\Database\Seeders\TemplateAdminSeeder"
     */
    public function run(): void
    {
        $model = config('auth.providers.users.model', \App\Models\User::class);

        $model::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $this->command->info('Default admin created: admin@example.com / password');
    }
}
