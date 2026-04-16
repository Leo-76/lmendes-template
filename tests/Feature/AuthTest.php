<?php

declare(strict_types=1);

namespace Lmendes\Template\Tests\Feature;

use Lmendes\Template\Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_login_page_is_accessible(): void
    {
        $response = $this->get(route('template.login'));

        $response->assertStatus(200);
    }

    public function test_register_page_is_accessible_when_enabled(): void
    {
        config(['template.auth.register_enabled' => true]);

        $response = $this->get(route('template.register'));

        $response->assertStatus(200);
    }

    public function test_register_page_returns_404_when_disabled(): void
    {
        config(['template.auth.register_enabled' => false]);

        $response = $this->get(route('template.register'));

        $response->assertStatus(404);
    }

    public function test_dashboard_redirects_guests(): void
    {
        $response = $this->get(route('template.dashboard'));

        $response->assertRedirect(route('template.login'));
    }
}
