@php
$active = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}"
   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors group
   {{ $active
        ? 'bg-white/10 border-l-4 border-white font-semibold'
        : 'hover:bg-white/10' }}">

    <span class="material-symbols-outlined {{ $active ? 'opacity-100' : 'opacity-70 group-hover:opacity-100' }}">
        {{ $icon }}
    </span>

    <span class="text-sm font-medium">
        {{ $label }}
    </span>
</a>
