@extends('admin.layouts.app')

@section('content')
    <div class="relative flex min-h-screen flex-col overflow-x-hidden">
        <main class="flex-1 px-6 py-8 max-w-[1440px] mx-auto w-full">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Demandes d’achat</h1>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Gestion des demandes d’approvisionnement
                        gouvernementales</p>
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <button
                        class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 rounded-xl font-bold hover:bg-slate-50 transition-all shadow-sm">
                        <span class="material-symbols-outlined text-[20px]">file_download</span>
                        <span>Exporter</span>
                    </button>
                    <a href="{{ route('admin.demandes.create') }}"
                        class="flex-1 md:flex-none flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white rounded-xl font-bold hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        <span>Nouvelle demande</span>
                    </a>
                </div>
            </div>

            {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div
                    class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">description</span>
                    </div>
                    <div>
                        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Total demandes</p>
                        <p class="text-2xl font-black text-slate-900 dark:text-white">156</p>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="size-12 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">En attente</p>
                        <p class="text-2xl font-black text-slate-900 dark:text-white">24</p>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="size-12 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                    <div>
                        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Approuvées</p>
                        <p class="text-2xl font-black text-slate-900 dark:text-white">89</p>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center gap-4">
                    <div class="size-12 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                    <div>
                        <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Achats directs</p>
                        <p class="text-2xl font-black text-slate-900 dark:text-white">43</p>
                    </div>
                </div>
            </div> --}}
            {{-- ================= KPI ================= --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                {{-- KPI 1 --}}

                <x-admin.kpi-card title="Demandes en attente" value="1,284" icon="assignment_late" color="primary"
                    trend="+12%" />

                {{-- KPI 2 --}}

                <x-admin.kpi-card title="Commandes actives" value="856" icon="shopping_cart_checkout" color="emerald"
                    trend="+5%" />

                {{-- KPI 3 --}}

                <x-admin.kpi-card title="Commandes actives" value="856" icon="shopping_cart_checkout" color="emerald"
                    trend="+5%" />

                {{-- KPI 4 --}}

                <x-admin.kpi-card title="Dépenses du mois" value="4.2M €" icon="euro" color="indigo" trend="+8%" />

            </div>
            {{-- Filters component --}}
            {{-- <div
                class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm mb-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Recherche</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                            <input
                                class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm"
                                placeholder="ID ou objet..." type="text" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Type</label>
                        <select
                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm font-medium">
                            <option>Tous les types</option>
                            <option>Achat</option>
                            <option>Fonds</option>
                            <option>Paiement</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Statut</label>
                        <select
                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm font-medium">
                            <option>Tous les statuts</option>
                            <option>En attente</option>
                            <option>Approuvée</option>
                            <option>Rejetée</option>
                            <option>En cours</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Période</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">calendar_today</span>
                            <input
                                class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm"
                                placeholder="Sélectionner dates" type="text" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Bénéficiaire</label>
                        <select
                            class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm font-medium">
                            <option>Tous les ministères</option>
                            <option>Ministère de la Santé</option>
                            <option>Ministère de l'Éducation</option>
                            <option>Ministère des Finances</option>
                        </select>
                    </div>
                </div>
            </div> --}}

            <x-admin.filters />
            <div
                class="bg-white dark:bg-slate-900 rounded-xl border border-slate-100 dark:border-slate-800 shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-800">
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">ID
                                    Demande</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    Bénéficiaire</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Type
                                </th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Objet
                                </th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">
                                    Montant</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Statut
                                </th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Date
                                    Création</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            <tr
                                class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors cursor-pointer group">
                                <td class="px-6 py-4 font-bold text-primary text-sm whitespace-nowrap">#PR-2023-001</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-slate-900 dark:text-white">Ministère de
                                            la Santé</span>
                                        <span class="text-xs text-slate-500">Direction Générale</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                                        <span
                                            class="material-symbols-outlined text-[18px] text-blue-500">shopping_bag</span>
                                        <span class="text-sm font-medium">Achat</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Fournitures de bureau
                                    (Lot 1)</td>
                                <td
                                    class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white text-right whitespace-nowrap">
                                    12,500.00 €</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 dark:bg-amber-900/20 dark:text-amber-400 border border-amber-200 dark:border-amber-800">
                                        <span class="size-1.5 rounded-full bg-amber-500"></span>
                                        En attente
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">12 Oct 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr
                                class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors cursor-pointer group">
                                <td class="px-6 py-4 font-bold text-primary text-sm whitespace-nowrap">#PR-2023-002</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-slate-900 dark:text-white">Ministère des
                                            Finances</span>
                                        <span class="text-xs text-slate-500">Dpt Informatique</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                                        <span
                                            class="material-symbols-outlined text-[18px] text-emerald-500">account_balance_wallet</span>
                                        <span class="text-sm font-medium">Fonds</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Maintenance Serveurs
                                    2024</td>
                                <td
                                    class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white text-right whitespace-nowrap">
                                    45,820.00 €</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                        Approuvée
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">11 Oct 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr
                                class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors cursor-pointer group">
                                <td class="px-6 py-4 font-bold text-primary text-sm whitespace-nowrap">#PR-2023-003</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-slate-900 dark:text-white">Ministère de
                                            l'Éducation</span>
                                        <span class="text-xs text-slate-500">Ressources Matérielles</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                                        <span class="material-symbols-outlined text-[18px] text-purple-500">payments</span>
                                        <span class="text-sm font-medium">Paiement</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Mobilier scolaire -
                                    Zone Sud</td>
                                <td
                                    class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white text-right whitespace-nowrap">
                                    8,400.00 €</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 dark:bg-blue-900/20 dark:text-blue-400 border border-blue-200 dark:border-blue-800">
                                        <span class="size-1.5 rounded-full bg-blue-500"></span>
                                        En cours
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">10 Oct 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr
                                class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors cursor-pointer group">
                                <td class="px-6 py-4 font-bold text-primary text-sm whitespace-nowrap">#PR-2023-004</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-slate-900 dark:text-white">Premier
                                            Ministre</span>
                                        <span class="text-xs text-slate-500">Protocole</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                                        <span
                                            class="material-symbols-outlined text-[18px] text-slate-500">more_horiz</span>
                                        <span class="text-sm font-medium">Autre</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Équipements
                                    Audio-visuels</td>
                                <td
                                    class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white text-right whitespace-nowrap">
                                    2,150.00 €</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-red-50 text-red-700 dark:bg-red-900/20 dark:text-red-400 border border-red-200 dark:border-red-800">
                                        <span class="size-1.5 rounded-full bg-red-500"></span>
                                        Rejetée
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">09 Oct 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr
                                class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors cursor-pointer group">
                                <td class="px-6 py-4 font-bold text-primary text-sm whitespace-nowrap">#PR-2023-005</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-slate-900 dark:text-white">Ministère de
                                            la Santé</span>
                                        <span class="text-xs text-slate-500">Hôpital Central</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                                        <span
                                            class="material-symbols-outlined text-[18px] text-blue-500">shopping_bag</span>
                                        <span class="text-sm font-medium">Achat</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Matériel de Laboratoire
                                </td>
                                <td
                                    class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white text-right whitespace-nowrap">
                                    156,000.00 €</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-900/20 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                        <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                        Approuvée
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">08 Oct 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button
                                            class="p-1.5 hover:bg-primary/10 rounded-lg text-slate-400 hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody> --}}

                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            @forelse ($demandes as $demande)
                                <tr
                                    class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors cursor-pointer group">

                                    {{-- ID --}}
                                    <td class="px-6 py-4 font-bold text-primary text-sm whitespace-nowrap">
                                        #{{ $demande->reference }}
                                    </td>

                                    {{-- Bénéficiaire --}}
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-semibold text-slate-900 dark:text-white">
                                                {{ $demande->beneficiaire ?? 'Non défini' }}
                                            </span>
                                            <span class="text-xs text-slate-500">
                                                {{ $demande->service ?? '' }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Type --}}
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">

                                            @if ($demande->type === 'achat')
                                                <span
                                                    class="material-symbols-outlined text-[18px] text-blue-500">shopping_bag</span>
                                            @elseif($demande->type === 'fonds')
                                                <span
                                                    class="material-symbols-outlined text-[18px] text-emerald-500">account_balance_wallet</span>
                                            @elseif($demande->type === 'paiement')
                                                <span
                                                    class="material-symbols-outlined text-[18px] text-purple-500">payments</span>
                                            @else
                                                <span
                                                    class="material-symbols-outlined text-[18px] text-slate-500">more_horiz</span>
                                            @endif

                                            <span class="text-sm font-medium capitalize">
                                                {{ $demande->type }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Objet --}}
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                        {{ $demande->objet ?? 'Non défini' }}
                                    </td>

                                    {{-- Montant --}}
                                    <td
                                        class="px-6 py-4 text-sm font-bold text-slate-900 dark:text-white text-right whitespace-nowrap">
                                        {{ number_format($demande->montant ?? 0, 0, ',', ' ') }} FCFA
                                    </td>

                                    {{-- Statut --}}
                                    <td class="px-6 py-4">
                                        @php
                                            $colors = [
                                                'en_attente' => 'bg-yellow-100 text-yellow-700',
                                                'approuve' => 'bg-green-100 text-green-700',
                                                'rejete' => 'bg-red-100 text-red-700',
                                                'en_cours' => 'bg-blue-100 text-blue-700',
                                            ];
                                        @endphp

                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-bold {{ $colors[$demande->statut] ?? 'bg-slate-100 text-slate-700' }}">
                                            {{ ucfirst(str_replace('_', ' ', $demande->statut)) }}
                                        </span>
                                    </td>

                                    {{-- Date --}}
                                    <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">
                                        {{ $demande->created_at ? $demande->created_at->format('d/m/Y') : '-' }}
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.demandes.show', $demande->id) }}"
                                                class="p-1.5 hover:bg-primary/10 rounded-lg text-blue-500 hover:text-primary">
                                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                                            </a>
                                            <a href="{{ route('admin.demandes.edit', $demande->id) }}"
                                                class="p-1.5 hover:bg-primary/10 rounded-lg text-green-500 hover:text-primary">
                                                <span class="material-symbols-outlined text-[20px]">edit</span>
                                            </a>
                                            <form action="{{ route('admin.demandes.destroy', $demande->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-1.5 hover:bg-danger/10 rounded-lg text-red-500 hover:text-danger">
                                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center py-6 text-slate-500">
                                        Aucune demande trouvée
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div
                    class="px-6 py-4 bg-slate-50/50 dark:bg-slate-800/50 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                    <p class="text-sm text-slate-500 font-medium">
                        Affichage de
                        <span class="text-slate-900 dark:text-white font-bold">
                            {{ $demandes->firstItem() }}
                        </span>
                        à
                        <span class="text-slate-900 dark:text-white font-bold">
                            {{ $demandes->lastItem() }}
                        </span>
                        sur
                        <span class="text-slate-900 dark:text-white font-bold">
                            {{ $demandes->total() }}
                        </span> résultats
                    </p>
                    <div class="flex items-center gap-2">

                        {{-- <button
                            class="size-9 flex items-center justify-center rounded-lg bg-primary text-white font-bold shadow-sm">{{ $demandes->previousPageUrl() }}</button> --}}
                        <div
                            class="mt-4 rounded-lg bg-white dark:bg-slate-900 p-2 border border-slate-100 dark:border-slate-800">
                            {{ $demandes->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
