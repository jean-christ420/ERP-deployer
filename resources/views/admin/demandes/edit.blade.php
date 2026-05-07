@extends('admin.layouts.app')

@section('content')

<form method="POST" action="{{ route('admin.demandes.update', $demande->id) }}" id="demande-form" onsubmit="reindexArticlesOnSubmit(event)">
    @csrf
    @method('PUT')
    <main class="min-h-screen pb-20">
        <!-- Page Header Area -->
        <section class="px-8 py-12 max-w-7xl mx-auto">
            <div
                class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                <div>
                    <nav class="flex items-center gap-2 mb-2">
                        <a href="{{ route('admin.demandes.index') }}" class="flex items-center text-primary hover:underline gap-1 text-[10px] font-black uppercase tracking-widest mr-2">
                            <span class="material-symbols-outlined text-sm">arrow_back</span>
                            Retour
                        </a>
                        <span
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Achats</span>
                        <span
                            class="material-symbols-outlined text-slate-300 text-xs"
                            data-icon="chevron_right">chevron_right</span>
                        <span
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Demandes</span>
                        <span
                            class="material-symbols-outlined text-slate-300 text-xs"
                            data-icon="chevron_right">chevron_right</span>
                        <span
                            class="text-[10px] font-black text-primary uppercase tracking-widest">{{ $demande->reference }}</span>
                    </nav>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                        Modifier la demande
                    </h2>
                </div>
                <div class="flex items-center gap-3">
                    <span
                        class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-black uppercase tracking-wider rounded-full ring-1 ring-amber-200">Brouillon</span>
                    <span class="text-xs font-bold text-slate-400 italic">Dernière modification: {{ $demande->updated_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-8">
                <!-- Main Form Column -->
                <div class="col-span-12 lg:col-span-8 space-y-8">
                    <!-- Section: Informations Générales -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="px-6 py-4 border-b border-slate-50 flex items-center justify-between">
                            <h3
                                class="text-xs font-black text-slate-900 uppercase tracking-widest flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-primary text-sm"
                                    data-icon="info">info</span>
                                Informations Générales
                            </h3>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-1.5">
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Type de demande</label>
                                <select
                                    class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20 @error('type') ring-2 ring-rose-500 @enderror" name="type" required>
                                    <option value="achat" {{ old('type', $demande->type) == 'achat' ? 'selected' : '' }}>Demande d'achat</option>
                                    <option value="fonds" {{ old('type', $demande->type) == 'fonds' ? 'selected' : '' }}>Sortie de fonds</option>
                                    <option value="reglement" {{ old('type', $demande->type) == 'reglement' ? 'selected' : '' }}>Demande de règlement</option>
                                </select>
                                @error('type')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Direction</label>
                                <select
                                    class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20 @error('direction') ring-2 ring-rose-500 @enderror" name="direction" required>
                                    <option value="Cabinet du Président" {{ old('direction', $demande->direction) == 'Cabinet du Président' ? 'selected' : '' }}>Cabinet du Président</option>
                                    <option value="Secrétariat Général" {{ old('direction', $demande->direction) == 'Secrétariat Général' ? 'selected' : '' }}>Secrétariat Général</option>
                                    <option value="Trésorerie Générale" {{ old('direction', $demande->direction) == 'Trésorerie Générale' ? 'selected' : '' }}>Trésorerie Générale</option>
                                    <option value="Direction des Achats" {{ old('direction', $demande->direction) == 'Direction des Achats' ? 'selected' : '' }}>Direction des Achats</option>
                                    <option value="Direction du Protocole" {{ old('direction', $demande->direction) == 'Direction du Protocole' ? 'selected' : '' }}>Direction du Protocole</option>
                                    <option value="DDHS" {{ old('direction', $demande->direction) == 'DDHS' ? 'selected' : '' }}>DDHS</option>
                                    <option value="DAP" {{ old('direction', $demande->direction) == 'DAP' ? 'selected' : '' }}>DAP</option>
                                </select>
                                @error('direction')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="col-span-2 flex flex-col gap-1.5">
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Bénéficiaire</label>
                                <input
                                    class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20 @error('beneficiaire') ring-2 ring-rose-500 @enderror"
                                    type="text"
                                    name="beneficiaire"
                                    value="{{ old('beneficiaire', $demande->beneficiaire) }}" required />
                                @error('beneficiaire')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="col-span-2 flex flex-col gap-1.5">
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Titre de la demande</label>
                                <input
                                    class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20 @error('objet') ring-2 ring-rose-500 @enderror"
                                    type="text"
                                    name="objet"
                                    value="{{ old('objet', $demande->objet) }}" required />
                                @error('objet')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="col-span-2 flex flex-col gap-1.5">
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Description</label>
                                <textarea
                                    class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20 resize-none @error('description') ring-2 ring-rose-500 @enderror"
                                    rows="3" name="description" required>{{ old('description', $demande->description) }}</textarea>
                                @error('description')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="col-span-2 flex flex-col gap-1.5">
                                <label
                                    class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Justification</label>
                                <textarea
                                    class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20 resize-none @error('justification') ring-2 ring-rose-500 @enderror"
                                    rows="2" name="justification" required>{{ old('justification', $demande->justification) }}</textarea>
                                @error('justification')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                            </div>

                            <!-- Dynamic fields start -->
                            <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6 mt-4" id="dynamic-fields-container">
                                <div class="flex flex-col gap-1.5" id="entreprise-div" style="display: none;">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Entreprise</label>
                                    <input class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20" type="text" name="entreprise" value="{{ old('entreprise', $demande->entreprise) }}" />
                                </div>
                                <div class="flex flex-col gap-1.5" id="libelle-facture-div" style="display: none;">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Libellé Facture</label>
                                    <input class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20" type="text" name="libelle_facture" value="{{ old('libelle_facture', $demande->libelle_facture) }}" />
                                </div>
                                <div class="flex flex-col gap-1.5" id="fournisseur-div" style="display: none;">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Fournisseur</label>
                                    <input class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20" type="text" name="fournisseur" value="{{ old('fournisseur', $demande->fournisseur) }}" />
                                </div>
                                <div class="flex flex-col gap-1.5" id="montant-direct-div" style="display: none;">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Montant Direct (FCFA)</label>
                                    <input class="bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20" type="number" name="montant_direct" value="{{ old('montant_direct', $demande->type != 'achat' && $demande->articles->count() == 0 ? $demande->montant : '') }}" />
                                </div>
                                <div class="col-span-2 flex flex-col gap-1.5 mt-2" id="piece-justificative-div" style="display: none;">
                                    <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Pièce Justificative (Règlement)</label>
                                    <div class="flex gap-4">
                                        <input class="w-1/2 bg-slate-50 border-none rounded-lg text-sm font-medium py-2.5 focus:ring-2 focus:ring-primary/20" type="text" name="piece_justificative_text" placeholder="N° de facture ou texte..." value="{{ old('piece_justificative_text', !Str::contains($demande->piece_justificative ?? '', '/') ? $demande->piece_justificative : '') }}" />
                                        <input class="w-1/2 bg-slate-50 border-none rounded-lg text-sm font-medium py-2 focus:ring-2 focus:ring-primary/20" type="file" name="piece_justificative_file" accept=".pdf,.jpg,.jpeg,.png" />
                                    </div>
                                    @if($demande->piece_justificative && Str::contains($demande->piece_justificative, '/'))
                                        <p class="text-xs text-slate-500">Fichier actuel : <a href="{{ asset('storage/' . $demande->piece_justificative) }}" target="_blank" class="text-primary underline">Voir</a></p>
                                    @endif
                                </div>
                            </div>
                            <!-- Dynamic fields end -->
                        </div>
                    </div>
                    <!-- Section: Articles / Services -->
                    <div id="articles-section" class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div
                            class="px-6 py-4 border-b border-slate-50 flex items-center justify-between">
                            <h3
                                class="text-xs font-black text-slate-900 uppercase tracking-widest flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-primary text-sm"
                                    data-icon="list_alt">list_alt</span>
                                Articles / Services
                            </h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-slate-50 border-b border-slate-100">

                                    <tr>
                                        <th
                                            class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                            Description
                                        </th>
                                        <th
                                            class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                            Quantité
                                        </th>
                                        <th
                                            class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                            Prix Unitaire (FCFA)
                                        </th>
                                        <th
                                            class="px-6 py-4 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                            Total
                                        </th>
                                        <th class="px-6 py-4 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @foreach($demande->articles as $index => $article)
                                    <tr class="hover:bg-slate-50 transition-colors group">
                                        <td class="px-6 py-4">
                                            <input type="text" name="articles[{{ $index }}][description]" value="{{ old('articles.'.$index.'.description', $article->description) }}" class="w-full bg-slate-100 border-none rounded px-2 py-1 text-sm font-bold" required />
                                        </td>
                                        <td class="px-6 py-4">
                                            <input
                                                class="w-20 bg-slate-100 border-none rounded px-2 py-1 text-sm font-bold text-center"
                                                type="number" name="articles[{{ $index }}][quantite]"
                                                value="{{ old('articles.'.$index.'.quantite', $article->quantite) }}" required oninput="calculRowTotal(this); calculTotalGlobal();" min="1" />
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" name="articles[{{ $index }}][prix]"
                                                value="{{ old('articles.'.$index.'.prix', $article->prix) }}" class="w-28 bg-slate-100 border-none rounded px-2 py-1 text-sm font-bold text-right" required oninput="calculRowTotal(this); calculTotalGlobal();" min="0" />
                                        </td>

                                        <td class="px-6 py-4">
                                            <p class="text-sm font-black text-slate-900 row-total" data-value="{{ $article->quantite * $article->prix }}">
                                                {{ number_format($article->quantite * $article->prix, 0, ',', ' ') }} FCFA
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div
                                                class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button
                                                    class="p-1 text-slate-400 hover:text-error transition-colors" type="button" onclick="this.closest('tr').remove(); calculTotalGlobal();">
                                                    <span
                                                        class="material-symbols-outlined text-lg"
                                                        data-icon="delete">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="p-6 bg-slate-50/50 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                            <button type="button" onclick="addArticleRow()"
                                class="px-4 py-2 border-2 border-dashed border-slate-200 text-slate-500 rounded-lg text-[10px] font-black uppercase tracking-widest hover:border-primary hover:text-primary transition-all flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-sm"
                                    data-icon="add_circle">add_circle</span>
                                Ajouter un article
                            </button>
                            <div class="w-full md:w-80 space-y-2">
                                <div
                                    class="flex justify-between items-center text-xs text-slate-500 font-bold">
                                    <span>Sous-total</span>
                                    <span id="sous-total-display">0 FCFA</span>
                                </div>
                                <div
                                    class="flex justify-between items-center text-xs text-slate-500 font-bold">
                                    <span>TVA (20%)</span>
                                    <span id="tva-display">0 FCFA</span>
                                </div>
                                <div
                                    class="flex justify-between items-center pt-2 border-t border-slate-200">
                                    <span
                                        class="text-xs font-black text-slate-900 uppercase tracking-widest">Total Général</span>
                                    <span id="total-global-display" class="text-xl font-black text-primary tracking-tight">0 FCFA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Sidebar Column -->
                <div class="col-span-12 lg:col-span-4 space-y-8">
                    <!-- Section: Pièces Jointes -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-slate-50">
                            <h3
                                class="text-xs font-black text-slate-900 uppercase tracking-widest flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-primary text-sm"
                                    data-icon="attach_file">attach_file</span>
                                Pièces Jointes
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <!-- Existing Files -->
                            <div class="space-y-2">
                                <div
                                    class="flex items-center justify-between p-3 bg-slate-50 rounded-lg border border-slate-100 group">
                                    <div class="flex items-center gap-3 overflow-hidden">
                                        <div
                                            class="w-8 h-8 bg-blue-100 rounded flex items-center justify-center text-blue-600 flex-shrink-0">
                                            <span
                                                class="material-symbols-outlined text-lg"
                                                data-icon="description">description</span>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p
                                                class="text-[11px] font-bold text-slate-900 truncate">
                                                devis_apple_store_oct.pdf
                                            </p>
                                            <p
                                                class="text-[9px] text-slate-400 font-black uppercase tracking-tighter">
                                                1.2 MB
                                            </p>
                                        </div>
                                    </div>
                                    <button
                                        class="text-slate-400 hover:text-error transition-colors p-1">
                                        <span
                                            class="material-symbols-outlined text-lg"
                                            data-icon="close">close</span>
                                    </button>
                                </div>
                                <div
                                    class="flex items-center justify-between p-3 bg-slate-50 rounded-lg border border-slate-100 group">
                                    <div class="flex items-center gap-3 overflow-hidden">
                                        <div
                                            class="w-8 h-8 bg-rose-100 rounded flex items-center justify-center text-rose-600 flex-shrink-0">
                                            <span
                                                class="material-symbols-outlined text-lg"
                                                data-icon="picture_as_pdf">picture_as_pdf</span>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p
                                                class="text-[11px] font-bold text-slate-900 truncate">
                                                justificatif_besoin_tech.pdf
                                            </p>
                                            <p
                                                class="text-[9px] text-slate-400 font-black uppercase tracking-tighter">
                                                845 KB
                                            </p>
                                        </div>
                                    </div>
                                    <button
                                        class="text-slate-400 hover:text-error transition-colors p-1">
                                        <span
                                            class="material-symbols-outlined text-lg"
                                            data-icon="close">close</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Drop Zone -->
                            <div
                                class="border-2 border-dashed border-slate-200 rounded-xl p-8 flex flex-col items-center justify-center text-center group hover:border-primary transition-colors cursor-pointer">
                                <div
                                    class="w-12 h-12 bg-slate-50 rounded-full flex items-center justify-center mb-3 group-hover:bg-primary/5 transition-colors">
                                    <span
                                        class="material-symbols-outlined text-slate-400 group-hover:text-primary"
                                        data-icon="upload_file">upload_file</span>
                                </div>
                                <p
                                    class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-1">
                                    Glisser &amp; Déposer
                                </p>
                                <p class="text-[10px] text-slate-400 font-medium">
                                    Ou cliquez pour parcourir les fichiers
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Workflow Hint -->
                    <div class="bg-primary/5 rounded-xl p-6 border border-primary/10">
                        <h4
                            class="text-[10px] font-black text-primary uppercase tracking-widest mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm" data-icon="bolt">bolt</span>
                            Prochaine Étape
                        </h4>
                        <p
                            class="text-xs text-slate-600 leading-relaxed font-medium mb-4">
                            Après mise à jour, la demande sera renvoyée en file d'attente
                            pour validation par le
                            <span class="font-bold text-slate-900">Responsable Financier</span>.
                        </p>
                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2">
                                <img
                                    alt="Approver Avatar 1"
                                    class="w-6 h-6 rounded-full border-2 border-white"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuALMTMuJ-HprY3szUbUkacSSz0fspM5RRkZE1M0-bE5W58hy2R4r4Zj5sGfACZUBs4HiuWO9tvjhzCv_FRl2YqDOEVqaV1NMQfy0jdDLpDpCJvSsNTiG2B0Bp18oKCOrUvIAoQHn1WEyze2SFAcEpj7ZCex94zOtGU3ZBp9MmxyVWU7K6YElh1mPF9x9lXK2F3gLCklJ6ycH8rcuO4smtMSwto9jLfLdOM-dsGAfrs2opg6FW3AWTzwttMuvYsiy6jC7y5lJjrT4J4" />
                                <img
                                    alt="Approver Avatar 2"
                                    class="w-6 h-6 rounded-full border-2 border-white"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYJQ6Q64SpRliX_VAxoW5tXUN-M9Qg40W2olFHiwy6C9_3Gt_iTB7C2AsKPP04Uw7bsJm0X3m5b4ysuP2lLHpASy7K0RtYZyNIsJ3Jq8h8xNXR6uFuBiBdbO7hOzA7-c6XH5dJrV1E5lpDUq3PZknnNrXFnZv90wCq2OH7ZdBkskbMa6STt1UDK_R1xE23-6ViEwtTK5okwPtHoim1hW0O79bT2Oyn_W4PDjnlIsSeRIK6ybQH4MnO9FVG4-wzBymTAZljEmUdSHc" />
                            </div>
                            <span
                                class="text-[10px] text-slate-400 font-bold uppercase tracking-tight">2 validateurs requis</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer Actions Bar -->
        <footer
            class="fixed bottom-0  w-full bg-white/95 backdrop-blur-sm border-t border-slate-200 py-4">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <a href="{{ route('admin.demandes.show', $demande->id) }}"
                    class="px-6 py-2 text-slate-500 text-[10px] font-black uppercase tracking-widest hover:text-slate-900 hover:bg-slate-50 transition-all rounded-lg">
                    Annuler
                </a>
                <div class="flex items-center gap-4">
                    <button
                        class="px-6 py-2 text-primary text-[10px] font-black uppercase tracking-widest border-2 border-primary/10 hover:bg-primary/5 transition-all rounded-lg">
                        Enregistrer en brouillon
                    </button>
                    <button
                        class="px-8 py-3 bg-primary text-white text-[11px] font-black uppercase tracking-widest rounded-lg shadow-lg shadow-primary/20 hover:shadow-primary/30 active:scale-95 transition-all" type="submit" onclick="" >
                        Mettre à jour la demande
                    </button>
                </div>
            </div>
        </footer>
    </main>
</form>
<script>
function calculRowTotal(input) {
    const tr = input.closest('tr');
    const qty = parseFloat(tr.querySelector('input[name*="[quantite]"]').value) || 0;
    const price = parseFloat(tr.querySelector('input[name*="[prix]"]').value) || 0;
    const total = qty * price;
    const totalEl = tr.querySelector('.row-total');
    if (totalEl) {
        totalEl.setAttribute('data-value', total);
        totalEl.innerText = total.toLocaleString('fr-FR') + ' FCFA';
    }
}

function calculTotalGlobal() {
    const totals = document.querySelectorAll('.row-total');
    let subtotal = 0;
    totals.forEach(span => {
        subtotal += parseFloat(span.getAttribute('data-value') || 0);
    });

    const tva = subtotal * 0.20;
    const global = subtotal + tva;

    document.getElementById('sous-total-display').innerText = subtotal.toLocaleString('fr-FR') + ' FCFA';
    document.getElementById('tva-display').innerText = tva.toLocaleString('fr-FR') + ' FCFA';
    document.getElementById('total-global-display').innerText = global.toLocaleString('fr-FR') + ' FCFA';
}

function addArticleRow() {
    const tbody = document.querySelector('tbody');
    const index = Date.now();

    const row = `
        <tr class="hover:bg-slate-50 transition-colors group">
            <td class="px-6 py-4">
                <input type="text" name="articles[${index}][description]" class="w-full bg-slate-100 border-none rounded px-2 py-1 text-sm font-bold" required />
            </td>
            <td class="px-6 py-4">
                <input class="w-20 bg-slate-100 border-none rounded px-2 py-1 text-sm font-bold text-center" type="number" name="articles[${index}][quantite]" value="1" required oninput="calculRowTotal(this); calculTotalGlobal();" min="1" />
            </td>
            <td class="px-6 py-4">
                <input type="number" name="articles[${index}][prix]" value="0" class="w-28 bg-slate-100 border-none rounded px-2 py-1 text-sm font-bold text-right" required oninput="calculRowTotal(this); calculTotalGlobal();" min="0" />
            </td>
            <td class="px-6 py-4">
                <p class="text-sm font-black text-slate-900 row-total" data-value="0">0 FCFA</p>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-1 text-slate-400 hover:text-error transition-colors" type="button" onclick="this.closest('tr').remove(); calculTotalGlobal();">
                        <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                    </button>
                </div>
            </td>
        </tr>
    `;

    tbody.insertAdjacentHTML('beforeend', row);
}

function reindexArticlesOnSubmit(event) {
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, newIndex) => {
        row.querySelectorAll('input').forEach(input => {
            if (input.name && input.name.includes('articles')) {
                input.name = input.name.replace(/articles\[\d+\]/, `articles[${newIndex}]`);
            }
        });
    });
}

function toggleFieldsByType() {
    const type = document.querySelector('select[name="type"]').value;
    const articlesSection = document.getElementById('articles-section');
    const entrepriseDiv = document.getElementById('entreprise-div');
    const libelleFactureDiv = document.getElementById('libelle-facture-div');
    const fournisseurDiv = document.getElementById('fournisseur-div');
    const montantDirectDiv = document.getElementById('montant-direct-div');
    const pieceJustificativeDiv = document.getElementById('piece-justificative-div');

    // Reset all
    articlesSection.style.display = 'none';
    entrepriseDiv.style.display = 'none';
    libelleFactureDiv.style.display = 'none';
    fournisseurDiv.style.display = 'none';
    montantDirectDiv.style.display = 'none';
    pieceJustificativeDiv.style.display = 'none';

    if (type === 'achat') {
        articlesSection.style.display = 'block';
        entrepriseDiv.style.display = 'block';
        libelleFactureDiv.style.display = 'block';
    } else if (type === 'fonds') {
        articlesSection.style.display = 'block';
        montantDirectDiv.style.display = 'block';
    } else if (type === 'reglement') {
        fournisseurDiv.style.display = 'block';
        montantDirectDiv.style.display = 'block';
        pieceJustificativeDiv.style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('select[name="type"]').addEventListener('change', toggleFieldsByType);
    toggleFieldsByType();
    calculTotalGlobal();
});
</script>
@endsection