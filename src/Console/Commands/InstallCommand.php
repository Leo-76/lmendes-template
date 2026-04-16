<?php

declare(strict_types=1);

namespace Lmendes\Template\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'template:install
                            {--force : Overwrite existing files}
                            {--no-migration : Skip running migrations}';

    protected $description = 'Install the lmendes/template package into your Laravel project';

    public function handle(): int
    {
        $this->info('Installing lmendes/template...');
        $this->newLine();

        $this->publishConfig();
        $this->publishViews();
        $this->publishMigrations();

        if (! $this->option('no-migration')) {
            $this->runMigrations();
        }

        $this->newLine();
        $this->info('lmendes/template installed successfully!');
        $this->newLine();
        $this->comment('Visit /template/dashboard to see your new dashboard.');

        return self::SUCCESS;
    }

    protected function publishConfig(): void
    {
        $this->callSilently('vendor:publish', [
            '--tag'   => 'template-config',
            '--force' => $this->option('force'),
        ]);

        $this->line('  [OK] Config published → <comment>config/template.php</comment>');
    }

    protected function publishViews(): void
    {
        $this->callSilently('vendor:publish', [
            '--tag'   => 'template-views',
            '--force' => $this->option('force'),
        ]);

        $this->line('  [OK] Views published → <comment>resources/views/vendor/template</comment>');
    }

    protected function publishMigrations(): void
    {
        $this->callSilently('vendor:publish', [
            '--tag'   => 'template-migrations',
            '--force' => $this->option('force'),
        ]);

        $this->line('  [OK] Migrations published');
    }

    protected function runMigrations(): void
    {
        $this->call('migrate');
        $this->line('  [OK] Migrations run');
    }
}
