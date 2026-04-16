<?php

declare(strict_types=1);

namespace Lmendes\Template\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public function __construct(
        public string $color = 'indigo',  // indigo | green | red | yellow | gray
        public bool $dot = false,
    ) {}

    public function render()
    {
        return view('template::components.badge');
    }
}
