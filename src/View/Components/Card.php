<?php

namespace WireUi\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public ?string $padding;

    public ?string $shadow;

    public ?string $rounded;

    public ?string $color;

    public ?string $divider;

    public ?string $title;

    public ?string $action;

    public ?string $header;

    public ?string $footer;

    public ?string $cardClasses;

    public function __construct(
        ?string $padding = 'px-2 py-5 md:px-4',
        ?string $shadow = 'shadow-md',
        ?string $rounded = 'rounded-lg',
        ?string $color = 'bg-white border border-gray-200',
        ?string $divider = 'divide-y divide-gray-200',
        ?string $title = null,
        ?string $action = null,
        ?string $header = null,
        ?string $footer = null,
        ?string $cardClasses = null
    ) {
        $this->padding     = $padding;
        $this->shadow      = $shadow;
        $this->rounded     = $rounded;
        $this->color       = $color;
        $this->divider     = $divider;
        $this->title       = $title;
        $this->action      = $action;
        $this->header      = $header;
        $this->footer      = $footer;
        $this->cardClasses = $cardClasses;
    }

    public function render()
    {
        return view('wireui::components.card');
    }
}
