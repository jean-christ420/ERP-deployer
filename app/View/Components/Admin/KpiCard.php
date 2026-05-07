<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class KpiCard extends Component
{
    public string $title;
    public string $value;

    public function __construct(string $title, string $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.admin.kpi-card');
    }
}
