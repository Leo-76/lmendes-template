<?php

declare(strict_types=1);

namespace Lmendes\Template\Tests\Unit;

use Lmendes\Template\Tests\TestCase;

class HelpersTest extends TestCase
{
    public function test_initials_returns_two_letters(): void
    {
        $this->assertSame('JD', initials('Jean Dupont'));
    }

    public function test_initials_single_name(): void
    {
        $this->assertSame('J', initials('Jean'));
    }

    public function test_initials_respects_length(): void
    {
        $this->assertSame('J', initials('Jean Dupont', 1));
    }

    public function test_template_config_returns_value(): void
    {
        config(['template.name' => 'TestApp']);

        $this->assertSame('TestApp', template_config('name'));
    }

    public function test_template_config_returns_default(): void
    {
        $this->assertSame('fallback', template_config('nonexistent_key', 'fallback'));
    }
}
