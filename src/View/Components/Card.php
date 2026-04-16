<?php

declare(strict_types=1);

namespace Lmendes\Template\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $subtitle = null,
        public bool $padded = true,
    ) {}

    public function render()
    {
        return view('template::components.card');
    }
}
