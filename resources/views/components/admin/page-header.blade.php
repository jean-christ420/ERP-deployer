<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

    {{-- Left --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-900">
            {{ $title ?? '' }}
        </h1>

        @if(!empty($subtitle))
            <p class="text-sm text-slate-500 mt-1">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    {{-- Right action --}}
    @if(!empty($actionLabel) && !empty($actionUrl))
        <a href="{{ $actionUrl }}"
           class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition">
            <span class="material-symbols-outlined text-sm">add</span>
            {{ $actionLabel }}
        </a>
    @endif

</div>
