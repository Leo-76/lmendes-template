<?php

declare(strict_types=1);

namespace Lmendes\Template\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public function __construct(
        public string $id,
        public ?string $title = null,
        public string $size = 'md',  // sm | md | lg | xl
    ) {}

    public function render()
    {
        return view('template::components.modal');
    }
}
