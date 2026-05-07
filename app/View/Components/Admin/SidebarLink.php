<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class SidebarLink extends Component
{
    public string $route;
    public string $icon;
    public string $label;

    public function __construct(string $route, string $icon, string $label)
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->label = $label;
    }

    public function isActive(): bool
    {
        return request()->routeIs($this->route);
    }

    public function render()
    {
        return view('components.admin.sidebar-link');
    }
}
