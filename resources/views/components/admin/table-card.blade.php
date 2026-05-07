@props([
    'title',
    'subtitle' => null,
    'actionLabel' => null,
    'actionUrl' => null
])

<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">

    {{-- Header --}}
    <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-slate-900">
                {{ $title }}
            </h2>

            @if($subtitle)
                <p class="text-sm text-slate-500">
                    {{ $subtitle }}
                </p>
            @endif
        </div>

        @if($actionLabel && $actionUrl)
            <a href="{{ $actionUrl }}"
               class="text-sm font-semibold text-primary hover:underline">
                {{ $actionLabel }}
            </a>
        @endif
    </div>

    {{-- Body --}}
    <div class="overflow-x-auto">
        {{ $slot }}
    </div>

</div>
