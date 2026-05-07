<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class TableCard extends Component
{
    public string $title;
    public ?string $actionLabel;
    public ?string $actionUrl;

    public function __construct(
        string $title,
        ?string $actionLabel = null,
        ?string $actionUrl = null
    ) {
        $this->title = $title;
        $this->actionLabel = $actionLabel;
        $this->actionUrl = $actionUrl;
    }

    public function render()
    {
        return view('components.admin.table-card');
    }
}
