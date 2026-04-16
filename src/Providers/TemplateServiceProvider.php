<?php

declare(strict_types=1);

namespace Lmendes\Template\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Lmendes\Template\Console\Commands\InstallCommand;
use Lmendes\Template\View\Components\Alert;
use Lmendes\Template\View\Components\Badge;
use Lmendes\Template\View\Components\Button;
use Lmendes\Template\View\Components\Card;
use Lmendes\Template\View\Components\Modal;

class TemplateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/template.php',
            'template'
        );
    }

    public function boot(): void
    {
        $this
            ->loadViews()
            ->loadTranslations()
            ->loadRoutes()
            ->registerComponents()
            ->registerPublishables();

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    protected function loadViews(): static
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'template');

        return $this;
    }

    protected function loadTranslations(): static
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../resources/lang');

        return $this;
    }

    protected function loadRoutes(): static
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        return $this;
    }

    protected function registerComponents(): static
    {
        Blade::componentNamespace('Lmendes\\Template\\View\\Components', 'template');

        Blade::component('template-alert',  Alert::class);
        Blade::component('template-badge',  Badge::class);
        Blade::component('template-button', Button::class);
        Blade::component('template-card',   Card::class);
        Blade::component('template-modal',  Modal::class);

        return $this;
    }

    protected function registerPublishables(): static
    {
        // Config
        $this->publishes([
            __DIR__ . '/../../config/template.php' => config_path('template.php'),
        ], 'template-config');

        // Views
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/template'),
        ], 'template-views');

        // Migrations
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
        ], 'template-migrations');

        // Stubs (auth controllers, etc.)
        $this->publishes([
            __DIR__ . '/../../stubs' => base_path('stubs/template'),
        ], 'template-stubs');

        // All at once
        $this->publishes([
            __DIR__ . '/../../config/template.php'  => config_path('template.php'),
            __DIR__ . '/../../resources/views'       => resource_path('views/vendor/template'),
            __DIR__ . '/../../database/migrations'   => database_path('migrations'),
        ], 'template');

        return $this;
    }
}
