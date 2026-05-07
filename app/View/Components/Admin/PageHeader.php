<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public string $title;
    public ?string $subtitle;
    public ?string $actionLabel;
    public ?string $actionUrl;

    public function __construct(
        string $title,
        ?string $subtitle = null,
        ?string $actionLabel = null,
        ?string $actionUrl = null
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->actionLabel = $actionLabel;
        $this->actionUrl = $actionUrl;
    }

    public function render()
    {
        return view('components.admin.page-header');
    }
}
