@props([
    'title',
    'value',
    'icon' => 'dashboard',
    'color' => 'primary',
    'trend' => null
])

<div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">

    <div class="flex justify-between items-start mb-4">
        <div class="size-12 rounded-lg bg-{{ $color }}/10 flex items-center justify-center text-{{ $color }}">
            <span class="material-symbols-outlined">{{ $icon }}</span>
        </div>

        @if($trend)
            <span class="text-xs font-bold px-2 py-1 rounded-full
                {{ str_contains($trend, '+') ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100' }}">
                {{ $trend }}
            </span>
        @endif
    </div>

    <p class="text-slate-500 text-sm font-medium">
        {{ $title }}
    </p>

    <h3 class="text-2xl font-bold text-slate-900 mt-1">
        {{ $value }}
    </h3>

</div>
