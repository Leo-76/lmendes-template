<?php

declare(strict_types=1);

if (! function_exists('template_config')) {
    /**
     * Get a value from the template config.
     */
    function template_config(string $key, mixed $default = null): mixed
    {
        return config("template.{$key}", $default);
    }
}

if (! function_exists('template_asset')) {
    /**
     * Generate a URL for a template asset.
     */
    function template_asset(string $path): string
    {
        return asset("vendor/template/{$path}");
    }
}

if (! function_exists('template_menu')) {
    /**
     * Return the sidebar menu items.
     */
    function template_menu(): array
    {
        return config('template.menu', []);
    }
}

if (! function_exists('template_theme')) {
    /**
     * Return the current theme (light/dark/auto).
     */
    function template_theme(): string
    {
        return config('template.theme', 'light');
    }
}

if (! function_exists('initials')) {
    /**
     * Generate initials from a full name.
     *
     * Example: initials('Jean Dupont') => 'JD'
     */
    function initials(string $name, int $length = 2): string
    {
        return collect(explode(' ', $name))
            ->map(fn (string $word) => strtoupper(mb_substr($word, 0, 1)))
            ->take($length)
            ->implode('');
    }
}

if (! function_exists('money')) {
    /**
     * Format a number as a currency string.
     *
     * Example: money(1500.5) => '1 500,50 €'
     */
    function money(float $amount, string $currency = 'EUR', string $locale = 'fr_FR'): string
    {
        return (new NumberFormatter($locale, NumberFormatter::CURRENCY))
            ->formatCurrency($amount, $currency);
    }
}
