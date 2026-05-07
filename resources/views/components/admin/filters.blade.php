<div
    class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm mb-6">

    <form method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">

        {{-- 🔍 Search --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-bold text-slate-700">Recherche</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="ID, objet..."
                class="px-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-sm focus:ring-2 focus:ring-primary">
        </div>

        {{-- 📊 Status --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-bold text-slate-700">Statut</label>
            <select name="statut" class="px-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-sm">
                <option value="">Tous</option>
                <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="approuve" {{ request('statut') == 'approuve' ? 'selected' : '' }}>Approuvé</option>
                <option value="rejete" {{ request('statut') == 'rejete' ? 'selected' : '' }}>Rejeté</option>
                <option value="en_cours" {{ request('statut') == 'en_cours' ? 'selected' : '' }}>En cours</option>
            </select>
        </div>

        {{-- 📅 Date --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-bold text-slate-700">Date</label>
            <input type="date" name="date" value="{{ request('date') }}"
                class="px-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-sm">
        </div>

        {{-- 🏢 Beneficiary --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-bold text-slate-700">Bénéficiaire</label>
            <select name="beneficiaire" class="px-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-sm">
                <option value="">Tous</option>
                @foreach(\App\Models\Demande::distinct()->pluck('beneficiaire')->filter() as $benef)
                    <option value="{{ $benef }}" {{ request('beneficiaire') == $benef ? 'selected' : '' }}>{{ $benef }}</option>
                @endforeach
            </select>
        </div>

        {{-- 🔘 Actions --}}
        <div class="flex items-end gap-2">
            <button type="submit"
                class="flex-1 bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-primary/90">
                Filtrer
            </button>

            <a href="{{ url()->current() }}"
                class="flex-1 text-center border border-slate-200 px-4 py-2 rounded-lg text-sm hover:bg-slate-50">
                Reset
            </a>
        </div>

    </form>

</div>
