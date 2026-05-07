@extends('admin.layouts.app')

@section('content')
    {{-- PAGE HEADER  --}}
    <x-admin.page-Header title="Tableau de bord" subtitle="Vue d’ensemble du système de procurement"
        actionLabel="Mon profil" actionUrl="{{ route('profile.edit') }}" />

    {{-- ================= KPI ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        {{-- KPI 1 --}}

        <x-admin.kpi-card title="Demandes en attente" :value="$kpis['pending_requests']" icon="assignment_late" color="primary" trend="+12%" />

        {{-- KPI 2 --}}

        <x-admin.kpi-card title="Commandes actives" :value="$kpis['active_orders']" icon="shopping_cart_checkout" color="emerald"
            trend="+5%" />


        {{-- KPI 3 --}}

        <x-admin.kpi-card title="Stock critique" :value="$kpis['critical_stock']" icon="inventory" color="warning" trend="-2%" />

        {{-- KPI 4 --}}

        <x-admin.kpi-card title="Dépenses du mois" :value="$kpis['monthly_expenses'] . 'FCFA'" icon="euro" color="indigo" trend="+8%" />

    </div>

    {{-- ================= GRID PRINCIPAL ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

        {{-- TABLE DEMANDES --}}
        <div class="lg:col-span-2">

            <x-admin.table-card title="Workflow des demandes" subtitle="Aperçu des demandes récentes"
                actionLabel="Voir tout" actionUrl="{{ route('admin.demandes.index') }}">

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 text-slate-500 text-[11px] font-bold uppercase tracking-wider">
                                <th class="px-6 py-4">ID Demande</th>
                                <th class="px-6 py-4">Demandeur</th>
                                <th class="px-6 py-4">Date</th>
                                <th class="px-6 py-4">Montant</th>
                                <th class="px-6 py-4">Statut</th>
                                <th class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        {{-- <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                    #PR-2023-001
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    Ministère de la Santé
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    12 Oct 2023
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                    45,000 €
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-warning/10 text-warning">En
                                        attente</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button
                                        class="material-symbols-outlined text-slate-400 hover:text-primary transition-colors">
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                    #PR-2023-002
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    Direction Education
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    11 Oct 2023
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                    12,500 €
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-success/10 text-success">Approuvé</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button
                                        class="material-symbols-outlined text-slate-400 hover:text-primary transition-colors">
                                        visibility
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                    #PR-2023-003
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    Service Transport
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    10 Oct 2023
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                    8,900 €
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-danger/10 text-danger">Rejeté</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button
                                        class="material-symbols-outlined text-slate-400 hover:text-primary transition-colors">
                                        visibility
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                    #PR-2023-004
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    Administration Centrale
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    10 Oct 2023
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                    120,000 €
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">En
                                        cours</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button
                                        class="material-symbols-outlined text-slate-400 hover:text-primary transition-colors">
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                    #PR-2023-005
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    Sécurité Publique
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    09 Oct 2023
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                    3,200 €
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-success/10 text-success">Approuvé</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button
                                        class="material-symbols-outlined text-slate-400 hover:text-primary transition-colors">
                                        visibility
                                    </button>
                                </td>
                            </tr>
                        </tbody> --}}

                        <tbody class="divide-y divide-slate-100">

                            @forelse($requests as $request)
                                <tr class="hover:bg-slate-50 transition-colors">

                                    {{-- REF --}}
                                    <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                        {{ $request->reference }}
                                    </td>

                                    {{-- BENEFICIAIRE --}}
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $request->beneficiaire }}
                                    </td>

                                    {{-- DATE --}}
                                    <td class="px-6 py-4 text-sm text-slate-500">
                                        {{ $request->created_at->format('d M Y') }}
                                    </td>

                                    {{-- MONTANT --}}
                                    <td class="px-6 py-4 text-sm font-semibold text-slate-900">
                                        {{ number_format($request->montant, 0, ',', ' ') }} FCFA
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-6 py-4">
                                        <span
                                            class="
                    px-2 py-1 rounded-full text-xs font-bold

                    @if ($request->statut === 'en_attente') bg-amber-100 text-amber-700
                    @elseif($request->statut === 'approuve') bg-emerald-100 text-emerald-700
                    @elseif($request->statut === 'rejete') bg-red-100 text-red-700
                    @else bg-blue-100 text-blue-700 @endif
                ">
                                            {{ ucfirst(str_replace('_', ' ', $request->statut)) }}
                                        </span>
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('admin.demandes.show', $request->id) }}">
                                            <button class="material-symbols-outlined text-blue-500 hover:text-primary">
                                                visibility
                                            </button>
                                        </a>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-6 text-slate-500">
                                        Aucune demande trouvée
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </x-admin.table-card>















        </div>

        {{-- ALERTES --}}
        <div class="space-y-6">

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h2 class="text-base font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-warning">notifications_active</span>
                    Alertes système
                </h2>
                <div class="space-y-4">
                    <div class="flex gap-3 p-3 bg-red-50 rounded-lg border border-red-100">
                        <span class="material-symbols-outlined text-danger shrink-0 mt-0.5">report</span>
                        <div>
                            <p class="text-sm font-bold text-slate-900">
                                Stock épuisé
                            </p>
                            <p class="text-xs text-slate-600 mt-1">
                                Fournitures médicales (lot #442) en rupture au dépôt
                                central.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-3 p-3 bg-amber-50 rounded-lg border border-amber-100">
                        <span class="material-symbols-outlined text-warning shrink-0 mt-0.5">timer</span>
                        <div>
                            <p class="text-sm font-bold text-slate-900">
                                Approbation en retard
                            </p>
                            <p class="text-xs text-slate-600 mt-1">
                                La demande #PR-2023-098 attend une signature depuis 48h.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                        <span class="material-symbols-outlined text-primary shrink-0 mt-0.5">info</span>
                        <div>
                            <p class="text-sm font-bold text-slate-900">
                                Mise à jour tarifaire
                            </p>
                            <p class="text-xs text-slate-600 mt-1">
                                Les prix des carburants ont été mis à jour dans le
                                catalogue.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

    {{-- ================= ACTIVITÉ ================= --}}
    {{-- <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">

        <h2 class="text-lg font-bold text-slate-900 mb-4">
            Activité récente
        </h2>

        <p class="text-sm text-slate-500">
            Aucune activité pour le moment.
        </p>

    </div> --}}

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100">
            <h2 class="text-lg font-bold text-slate-900">Activité récente</h2>
            <p class="text-sm text-slate-500">
                Journal d'audit des dernières actions administratives
            </p>
        </div>
        <div class="p-6 relative">
            <div class="absolute left-[39px] top-6 bottom-6 w-0.5 bg-slate-100"></div>
            <div class="space-y-8 relative">
                <!-- Timeline Item 1 -->
                <div class="flex gap-6 items-start">
                    <div
                        class="size-10 rounded-full bg-blue-100 border-4 border-white flex items-center justify-center text-primary z-10 shrink-0">
                        <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-bold text-slate-900">
                                Nouvelle commande créée
                                <span class="font-normal text-slate-500">par Marc Lemoine</span>
                            </p>
                            <span class="text-xs text-slate-400 font-medium">Il y a 10 min</span>
                        </div>
                        <p class="text-xs text-slate-600 mt-1">
                            Commande #ORD-8821 validée pour l'achat de 50 ordinateurs
                            portables (Ministère Intérieur).
                        </p>
                    </div>
                </div>
                <!-- Timeline Item 2 -->
                <div class="flex gap-6 items-start">
                    <div
                        class="size-10 rounded-full bg-success/10 border-4 border-white flex items-center justify-center text-success z-10 shrink-0">
                        <span class="material-symbols-outlined text-sm">check_circle</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-bold text-slate-900">
                                Demande approuvée
                                <span class="font-normal text-slate-500">par Système Automatique</span>
                            </p>
                            <span class="text-xs text-slate-400 font-medium">Il y a 1 heure</span>
                        </div>
                        <p class="text-xs text-slate-600 mt-1">
                            La demande #PR-2023-045 a passé les contrôles de
                            conformité budgétaire avec succès.
                        </p>
                    </div>
                </div>
                <!-- Timeline Item 3 -->
                <div class="flex gap-6 items-start">
                    <div
                        class="size-10 rounded-full bg-amber-100 border-4 border-white flex items-center justify-center text-warning z-10 shrink-0">
                        <span class="material-symbols-outlined text-sm">warning</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <p class="text-sm font-bold text-slate-900">
                                Alerte de conformité
                                <span class="font-normal text-slate-500">sur le contrat #CTR-990</span>
                            </p>
                            <span class="text-xs text-slate-400 font-medium">Il y a 3 heures</span>
                        </div>
                        <p class="text-xs text-slate-600 mt-1">
                            Le fournisseur "Global Log" a un certificat d'assurance
                            expirant dans moins de 30 jours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slate-50 p-4 text-center">
            <button class="text-sm font-bold text-primary hover:underline">
                Charger plus d'activités
            </button>
        </div>
    </div>
@endsection
