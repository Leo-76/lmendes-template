<?php

declare(strict_types=1);

namespace Lmendes\Template\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $type = 'info',   // info | success | warning | danger
        public ?string $title = null,
        public bool $dismissible = false,
    ) {}

    public function render()
    {
        return view('template::components.alert');
    }
}
