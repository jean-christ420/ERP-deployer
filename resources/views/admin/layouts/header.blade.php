<!-- <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 flex-shrink-0">

    <div class="font-semibold">
        Administration
    </div>

    <div class="flex items-center gap-3">
        <span class="text-sm font-medium">
            {{ auth()->user()->name ?? 'Admin' }}
        </span>

        <div class="size-9 rounded-full bg-primary/10 flex items-center justify-center">
            <span class="material-symbols-outlined text-primary">
                person
            </span>
        </div>
    </div>

</header> -->

<header
    class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 flex-shrink-0">
    <div class="flex-1 max-w-xl">
        <div class="relative group">
            <span
                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">search</span>
            <input
                class="w-full bg-slate-100 border-none rounded-lg pl-11 py-2 text-sm focus:ring-2 focus:ring-primary/20 placeholder:text-slate-500"
                placeholder="Rechercher une demande, un fournisseur ou un contrat..."
                type="text" />
        </div>
    </div>
    <div class="flex items-center gap-4 ml-8">
        <button
            class="p-2 rounded-full hover:bg-slate-100 relative text-slate-600">
            <span class="material-symbols-outlined">notifications</span>
            <span
                class="absolute top-2 right-2 size-2 bg-danger rounded-full border-2 border-white"></span>
        </button>
        <button class="p-2 rounded-full hover:bg-slate-100 text-slate-600">
            <span class="material-symbols-outlined">help_outline</span>
        </button>
        <div class="h-8 w-px bg-slate-200 mx-2"></div>
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 cursor-pointer group">
            <div class="text-right">
                <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-slate-500">{{ auth()->user()->email ?? 'profile@erp.com' }}</p>
            </div>
            <div class="size-10 rounded-full bg-primary/10 border border-primary/20 overflow-hidden flex items-center justify-center text-primary text-base font-bold">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
        </a>
    </div>
</header>
