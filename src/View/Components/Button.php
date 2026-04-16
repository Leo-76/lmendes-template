<?php

declare(strict_types=1);

namespace Lmendes\Template\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $variant = 'primary',  // primary | secondary | danger | ghost
        public string $size = 'md',          // sm | md | lg
        public string $type = 'button',
        public bool $loading = false,
        public ?string $href = null,
    ) {}

    public function render()
    {
        return view('template::components.button');
    }
}
