@extends('admin.layouts.app')

@section('content')
<!-- Main Content Area (Full width centered) -->
<main class="p-6 sm:p-8 min-h-screen">
    <!-- Page Content: Nouvelle Demande -->
    <div class="max-w-5xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
            <!-- Header Section -->
            <div class="px-6 sm:px-10 py-8 bg-surface-container-low border-b border-slate-50">
                <div class="mb-4">
                    <a class="flex items-center text-primary hover:underline gap-1 text-[11px] font-black uppercase tracking-widest" href="{{ route('admin.demandes.index') }}">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                        Retour à la liste
                    </a>
                </div>
                <x-admin.page-Header title="Nouvelle Demande" subtitle="Créer une nouvelle demande" :actionLabel="null" />

            </div>
            @error('objet')
            <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
            <!-- Form Section -->
            <form method="POST" action="{{ route('admin.demandes.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Section 1: Informations Générales -->
                <div class="px-6 sm:px-10 py-10">
                    <h3 class="text-[11px] font-black uppercase tracking-[0.2em] text-primary mb-6 flex items-center gap-2">
                        <span class="w-1 h-1 bg-primary rounded-full"></span>
                        Informations Générales
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Demandeur</label>
                            <input class="w-full bg-slate-50 border-none rounded-lg py-3 px-4 font-medium text-slate-500 cursor-not-allowed"
                                type="text" value="{{ auth()->user()->name }}" disabled readonly />
                            <input type="hidden" name="demandeur" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Bénéficiaire</label>
                            <input class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700 @error('beneficiaire') ring-2 ring-rose-500 @enderror"
                                placeholder="Nom du bénéficiaire ou service" type="text" name="beneficiaire" value="{{ old('beneficiaire') }}" required />
                            @error('beneficiaire')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Type de demande</label>
                            <select class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700 @error('type') ring-2 ring-rose-500 @enderror" name="type" required>
                                <option value="achat" {{ old('type') == 'achat' ? 'selected' : '' }}>Demande d'achat</option>
                                <option value="fonds" {{ old('type') == 'fonds' ? 'selected' : '' }}>Sortie de fonds</option>
                                <option value="reglement" {{ old('type') == 'reglement' ? 'selected' : '' }}>Demande de règlement</option>
                            </select>
                            @error('type')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Direction</label>
                            <select class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700 @error('direction') ring-2 ring-rose-500 @enderror" name="direction" required>
                                <option value="Cabinet du Président" {{ old('direction') == 'Cabinet du Président' ? 'selected' : '' }}>Cabinet du Président</option>
                                <option value="Secrétariat Général" {{ old('direction') == 'Secrétariat Général' ? 'selected' : '' }}>Secrétariat Général</option>
                                <option value="Trésorerie Générale" {{ old('direction') == 'Trésorerie Générale' ? 'selected' : '' }}>Trésorerie Générale</option>
                                <option value="Direction des Achats" {{ old('direction') == 'Direction des Achats' ? 'selected' : '' }}>Direction des Achats</option>
                                <option value="Direction du Protocole" {{ old('direction') == 'Direction du Protocole' ? 'selected' : '' }}>Direction du Protocole</option>
                                <option value="DDHS" {{ old('direction') == 'DDHS' ? 'selected' : '' }}>DDHS</option>
                                <option value="DAP" {{ old('direction') == 'DAP' ? 'selected' : '' }}>DAP</option>
                            </select>
                            @error('direction')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="space-y-2 mb-8">
                        <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Titre de la demande</label>
                        <input class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700 @error('objet') ring-2 ring-rose-500 @enderror"
                            placeholder="Ex: Renouvellement parc informatique Q4" type="text" name="objet" value="{{ old('objet') }}" required />
                        @error('objet')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Description</label>
                            <textarea class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700 resize-none @error('description') ring-2 ring-rose-500 @enderror"
                                placeholder="Détails techniques du besoin..." rows="4" name="description" required>{{ old('description') }}</textarea>
                            @error('description')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Justification</label>
                            <textarea class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700 resize-none @error('justification') ring-2 ring-rose-500 @enderror"
                                placeholder="Pourquoi cette demande est-elle nécessaire ?" rows="4" name="justification" required>{{ old('justification') }}</textarea>
                            @error('justification')<p class="text-xs text-rose-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <!-- Dynamic Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                        <div class="space-y-2" id="entreprise-div" style="display: none;">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Entreprise</label>
                            <input class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700" type="text" name="entreprise" value="{{ old('entreprise') }}" placeholder="Nom de l'entreprise" />
                        </div>
                        <div class="space-y-2" id="libelle-facture-div" style="display: none;">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Libellé Facture</label>
                            <input class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700" type="text" name="libelle_facture" value="{{ old('libelle_facture') }}" placeholder="Ex: FACT-2023-001" />
                        </div>
                        <div class="space-y-2" id="fournisseur-div" style="display: none;">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Fournisseur</label>
                            <input class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700" type="text" name="fournisseur" value="{{ old('fournisseur') }}" placeholder="Nom du fournisseur" />
                        </div>
                        <div class="space-y-2" id="montant-direct-div" style="display: none;">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Montant Direct (FCFA)</label>
                            <input class="w-full bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700" type="number" name="montant_direct" value="{{ old('montant_direct') }}" placeholder="0" min="0" />
                        </div>
                    </div>
                    <div class="space-y-2 mt-8" id="piece-justificative-div" style="display: none;">
                        <label class="text-[11px] font-black uppercase tracking-widest text-slate-400">Pièce Justificative (Règlement)</label>
                        <div class="flex gap-4">
                            <input class="w-1/2 bg-surface-container border-none rounded-lg py-3 px-4 font-medium text-slate-700" type="text" name="piece_justificative_text" placeholder="N° de facture ou texte explicatif..." value="{{ old('piece_justificative_text') }}" />
                            <div class="w-1/2 relative">
                                <input class="w-full bg-surface-container border-none rounded-lg py-2.5 px-4 font-medium text-slate-700 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-primary file:text-white hover:file:bg-primary/90" type="file" name="piece_justificative_file" accept=".pdf,.jpg,.jpeg,.png" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Section 2: Articles / Services -->
                <div id="articles-section" class="px-6 sm:px-10 py-10 bg-white border-y border-slate-50">
                    <div class="flex items-center gap-3 min-w-0 mb-8">
                        <div class="w-1.5 h-8 bg-primary rounded-full"></div>
                        <h3 class="text-xl font-black text-slate-900 tracking-tight truncate">Articles / Services</h3>
                    </div>

                    <!-- Mini Form to Add Article -->
                    <div class="bg-surface-container-low p-6 rounded-2xl border border-slate-100 mb-8">
                        <h4 class="text-xs font-black uppercase tracking-widest text-slate-500 mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">add_circle</span>
                            Ajouter un nouvel article
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                            <div class="md:col-span-5 space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Description</label>
                                <input type="text" id="new-article-desc" class="w-full bg-white border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium text-slate-700 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="Ex: Ordinateur Portable Delta">
                            </div>
                            <div class="md:col-span-2 space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Quantité</label>
                                <input type="number" id="new-article-qty" class="w-full bg-white border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium text-slate-700 text-center focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" value="1" min="1">
                            </div>
                            <div class="md:col-span-3 space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Prix unitaire (FCFA)</label>
                                <input type="number" id="new-article-price" class="w-full bg-white border border-slate-200 rounded-lg py-2.5 px-4 text-sm font-medium text-slate-700 text-center focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all" placeholder="0" min="1">
                            </div>
                            <div class="md:col-span-2">
                                <button type="button" id="btn-add-article" onclick="addArticleFromForm()" class="w-full flex items-center justify-center gap-2 bg-slate-900 text-white px-4 py-2.5 rounded-lg font-bold text-sm hover:!bg-primary transition-all">
                                    <span class="material-symbols-outlined text-[18px]">add</span>
                                    Ajouter
                                </button>
                                <button type="button" id="btn-cancel-edit" onclick="cancelEdit()" class="hidden w-full mt-2 flex items-center justify-center gap-2 bg-slate-100 text-slate-500 px-4 py-1.5 rounded-lg font-bold text-xs hover:bg-slate-200 transition-all">
                                    Annuler
                                </button>
                            </div>
                        </div>
                        <div id="add-article-error" class="hidden text-rose-500 text-xs mt-4 flex items-center gap-1.5 font-bold bg-rose-50 p-3 rounded-lg border border-rose-100">
                            <span class="material-symbols-outlined text-[16px]">warning</span>
                            Veuillez remplir la description et renseigner une quantité/prix valides.
                        </div>
                    </div>

                    <!-- Articles Table -->
                    <div class="overflow-x-auto -mx-6 sm:mx-0 w-[calc(100%+3rem)] sm:w-full border border-slate-100 rounded-xl mb-8">
                        <table class="w-full min-w-full text-left text-sm">
                            <thead class="bg-slate-50 border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.15em] text-slate-400">Description</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.15em] text-slate-400 text-center w-32">Quantité</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.15em] text-slate-400 text-center w-48">Prix Unitaire</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.15em] text-slate-400 text-right w-40">Total</th>
                                    <th class="px-6 py-4 w-24 text-center text-[10px] font-black uppercase tracking-[0.15em] text-slate-400">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="articles-body" class="divide-y divide-slate-100 bg-white">
                                <tr id="empty-state-row">
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-50 text-slate-300 mb-3">
                                            <span class="material-symbols-outlined text-2xl">receipt_long</span>
                                        </div>
                                        <p class="text-slate-500 text-sm font-medium">Aucun article ajouté.</p>
                                        <p class="text-slate-400 text-xs mt-1">Utilisez le formulaire ci-dessus pour ajouter des articles à la demande.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col items-end">
                        <div class="bg-surface-container-low p-6 rounded-2xl border border-slate-100 w-full sm:w-[320px]">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-xs font-black uppercase tracking-widest text-slate-400">Sous-total</span>
                                <span id="sous-total" class="text-sm font-bold text-slate-700">0 FCFA</span>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center gap-2">
                                    <label class="text-xs font-black uppercase tracking-widest text-slate-400">TVA</label>
                                    <div class="flex items-center bg-slate-100 rounded border border-slate-200">
                                        <input type="checkbox" id="tva-enabled" name="has_tva" onchange="calculTotalGlobal()" checked class="w-3.5 h-3.5 text-primary bg-white border-slate-300 rounded focus:ring-primary ml-1.5 cursor-pointer">
                                        <input type="number" id="tva-rate" name="tva_rate" value="20" min="0" max="100" class="w-10 bg-transparent border-none p-1 text-center text-xs font-bold text-slate-700 focus:ring-0" oninput="calculTotalGlobal()">
                                        <span class="text-xs font-bold text-slate-500 mr-1.5">%</span>
                                    </div>
                                </div>
                                <span id="tva" class="text-sm font-bold text-slate-700 transition-all">0 FCFA</span>
                            </div>
                            <div class="w-full h-px bg-slate-200 mb-4"></div>
                            <div class="flex flex-col items-end">
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Montant Total Estimé</span>
                                <span id="total-global" class="text-2xl font-black text-primary">0 FCFA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Section 3: Pièces Jointes -->
                <div class="px-6 sm:px-10 py-10">
                    <h3
                        class="text-[11px] font-black uppercase tracking-[0.2em] text-primary mb-6 flex items-center gap-2">
                        <span class="w-1 h-1 bg-primary rounded-full"></span>
                        Pièces jointes
                    </h3>
                    <div
                        class="border-2 border-dashed border-slate-200 rounded-2xl p-12 flex flex-col items-center justify-center text-center hover:bg-slate-50 hover:border-primary transition-all group cursor-pointer" onclick="document.getElementById('fileInput').click()">
                        <input type="file" name="pieces[]" multiple class="hidden" accept=".pdf,.png,.jpg,.jpeg" data-max-size="10485760" id="fileInput" onchange="document.getElementById('file-label').innerText = this.files.length > 0 ? (this.files.length === 1 ? this.files[0].name : this.files.length + ' fichiers sélectionnés') : 'Glissez vos fichiers ici ou cliquez pour télécharger'" />
                        <div
                            class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-4 group-hover:bg-primary-container transition-colors">
                            <span class="material-symbols-outlined text-3xl text-slate-400 group-hover:text-primary"
                                data-icon="cloud_upload">cloud_upload</span>
                        </div>
                        <p id="file-label" class="text-slate-900 font-bold">Glissez vos fichiers ici ou cliquez pour télécharger</p>
                        <p class="text-[11px] text-slate-400 font-black uppercase tracking-widest mt-2">PDF, PNG,
                            JPG, JPEG (MAX. 10MB)</p>
                    </div>
                </div>
                <!-- Footer Actions -->
                <div class="px-6 sm:px-10 py-8 bg-surface-container-low flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                    <input type="hidden" name="subtotal" id="input-subtotal">
                    <input type="hidden" name="tva" id="input-tva">
                    <input type="hidden" name="total" id="input-total">

                    <a href="{{ route('admin.demandes.index') }}"
                        class="w-full md:w-auto px-6 py-3 text-sm font-bold text-slate-500 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg" data-icon="close">close</span>
                        Annuler
                    </a>
                    <div class="flex flex-col w-full gap-4 md:flex-row md:w-auto md:items-center">
                        <button
                            class="w-full md:w-auto px-6 py-3 text-sm font-bold text-slate-700 border border-slate-200 rounded-lg hover:bg-white hover:shadow-sm transition-all flex items-center justify-center gap-2"
                            type="button">
                            <span class="material-symbols-outlined text-lg" data-icon="drafts">drafts</span>
                            Sauvegarder en brouillon
                        </button>
                        <button
                            class="w-full md:w-auto px-8 py-3 bg-primary text-white font-bold rounded-lg shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-2"
                            type="submit">
                            <span class="material-symbols-outlined text-lg" data-icon="send">send</span>
                            Soumettre la demande
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Contextual Info Cards (Bento Grid Style) -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mt-8 mb-12">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl" data-icon="check_circle">check_circle</span>
                    </div>
                    <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Budget Disponible
                    </h4>
                </div>
                <p class="text-2xl font-black text-slate-900">45 200,00 €</p>
                <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                    <div class="bg-emerald-500 h-full w-3/4 rounded-full"></div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl" data-icon="timer">timer</span>
                    </div>
                    <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Délai Approbation
                    </h4>
                </div>
                <p class="text-2xl font-black text-slate-900">~ 48 heures</p>
                <p class="text-xs text-slate-500 mt-2">Moyenne observée ce mois-ci</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-primary-container text-primary rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl" data-icon="policy">policy</span>
                    </div>
                    <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Prochaine Étape</h4>
                </div>
                <p class="text-lg font-bold text-slate-900 leading-tight">Validation par le responsable direct</p>
                <p class="text-xs text-slate-500 mt-2">M. Marc Lefebvre</p>
            </div>
        </div>
    </div>
</main>
<script>
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

    let articleIndex = 0;
    let editingRowId = null;

    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function updateRowHTML(tr, index, desc, qty, price, total, rowId) {
        const escapedDesc = escapeHtml(desc);
        tr.innerHTML = `
        <td class="px-6 py-4">
            <span class="text-sm font-bold text-slate-700 desc-text">${escapedDesc}</span>
            <input type="hidden" name="articles[${index}][description]" value="${escapedDesc}" class="input-desc">
        </td>
        <td class="px-6 py-4 text-center">
            <span class="text-sm font-medium text-slate-600 qty-text">${qty}</span>
            <input type="hidden" name="articles[${index}][quantite]" value="${qty}" class="input-qty">
        </td>
        <td class="px-6 py-4 text-center">
            <span class="text-sm font-medium text-slate-600 price-text">${price.toLocaleString()} FCFA</span>
            <input type="hidden" name="articles[${index}][prix]" value="${price}" class="input-price">
        </td>
        <td class="px-6 py-4 text-right">
            <span class="text-sm font-bold text-slate-900 row-total" data-value="${total}">${total.toLocaleString()} FCFA</span>
        </td>
        <td class="px-6 py-4 text-center">
            <div class="flex items-center justify-center gap-1 opacity-50 group-hover:opacity-100 transition-opacity">
                <button type="button" onclick="editArticle('${rowId}')" class="text-slate-500 hover:text-primary p-1.5 rounded-lg hover:bg-primary-container transition-colors" title="Modifier">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                </button>
                <button type="button" onclick="deleteArticle('${rowId}')" class="text-slate-500 hover:text-rose-500 p-1.5 rounded-lg hover:bg-rose-50 transition-colors" title="Supprimer">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                </button>
            </div>
        </td>
    `;
    }

    function addArticleFromForm() {
        const descInput = document.getElementById('new-article-desc');
        const qtyInput = document.getElementById('new-article-qty');
        const priceInput = document.getElementById('new-article-price');
        const errorMsg = document.getElementById('add-article-error');

        const desc = descInput.value.trim();
        const qty = parseFloat(qtyInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;

        if (!desc.trim() || isNaN(qty) || isNaN(price) || qty <= 0 || price <= 0) {
            errorMsg.classList.remove('hidden');
            return;
        }

        errorMsg.classList.add('hidden');

        const total = qty * price;

        if (editingRowId) {
            // En mode modification
            const tr = document.getElementById(editingRowId);
            if (tr) {
                const index = tr.dataset.index;
                updateRowHTML(tr, index, desc, qty, price, total, editingRowId);
                tr.classList.remove('bg-primary-container/30', 'border-primary/50');
            }

            // Quitter le mode édition
            quitEditMode();
        } else {
            // Mode ajout normal
            // Remove empty state if present
            const emptyState = document.getElementById('empty-state-row');
            if (emptyState) {
                emptyState.remove();
            }

            const tbody = document.getElementById('articles-body');
            const rowId = 'article-row-' + articleIndex;

            const tr = document.createElement('tr');
            tr.id = rowId;
            tr.dataset.index = articleIndex;
            tr.className = 'hover:bg-slate-50/50 transition-colors group';

            updateRowHTML(tr, articleIndex, desc, qty, price, total, rowId);

            tbody.appendChild(tr);
            articleIndex++;
        }

        // Reset form
        descInput.value = '';
        qtyInput.value = '1';
        priceInput.value = '';
        descInput.focus();

        calculTotalGlobal();
    }

    function editArticle(rowId) {
        const tr = document.getElementById(rowId);
        if (!tr) return;

        // Remove highlight from any other currently edited row
        if (editingRowId) {
            const oldTr = document.getElementById(editingRowId);
            if (oldTr) oldTr.classList.remove('bg-primary-container/30', 'border-primary/50');
        }

        editingRowId = rowId;
        tr.classList.add('bg-primary-container/30', 'border-primary/50');

        // Get current values
        const desc = tr.querySelector('.input-desc').value;
        const qty = tr.querySelector('.input-qty').value;
        const price = tr.querySelector('.input-price').value;

        // Populate the form
        document.getElementById('new-article-desc').value = desc;
        document.getElementById('new-article-qty').value = qty;
        document.getElementById('new-article-price').value = price;

        // Update buttons
        const btnAdd = document.getElementById('btn-add-article');
        btnAdd.innerHTML = '<span class="material-symbols-outlined text-[18px]">save</span> Enregistrer';
        btnAdd.classList.add('bg-primary');
        btnAdd.classList.remove('bg-slate-900');

        document.getElementById('btn-cancel-edit').classList.remove('hidden');

        // Scroll and focus
        document.getElementById('new-article-desc').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
        document.getElementById('new-article-desc').focus();
    }

    function quitEditMode() {
        if (editingRowId) {
            const oldTr = document.getElementById(editingRowId);
            if (oldTr) oldTr.classList.remove('bg-primary-container/30', 'border-primary/50');
        }
        editingRowId = null;

        const btnAdd = document.getElementById('btn-add-article');
        btnAdd.innerHTML = '<span class="material-symbols-outlined text-[18px]">add</span> Ajouter';
        btnAdd.classList.remove('bg-primary');
        btnAdd.classList.add('bg-slate-900');

        document.getElementById('btn-cancel-edit').classList.add('hidden');

        document.getElementById('new-article-desc').value = '';
        document.getElementById('new-article-qty').value = '1';
        document.getElementById('new-article-price').value = '';
    }

    function cancelEdit() {
        quitEditMode();
    }

    function deleteArticle(rowId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet article ?")) {
            const tr = document.getElementById(rowId);
            if (tr) {
                tr.remove();
                if (editingRowId === rowId) {
                    quitEditMode();
                }
                checkEmptyState();
                calculTotalGlobal();
            }
        }
    }

    function checkEmptyState() {
        const tbody = document.getElementById('articles-body');
        const rows = tbody.querySelectorAll('tr:not(#empty-state-row)');

        if (rows.length === 0) {
            tbody.innerHTML = `
            <tr id="empty-state-row">
                <td colspan="5" class="px-6 py-12 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-50 text-slate-300 mb-3">
                        <span class="material-symbols-outlined text-2xl">receipt_long</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium">Aucun article ajouté.</p>
                    <p class="text-slate-400 text-xs mt-1">Utilisez le formulaire ci-dessus pour ajouter des articles à la demande.</p>
                </td>
            </tr>
        `;
        }
    }

    function calculTotalGlobal() {
        const totals = document.querySelectorAll('.row-total');
        let subtotal = 0;

        totals.forEach(span => {
            subtotal += parseInt(span.getAttribute('data-value') || 0);
        });

        const isTvaEnabled = document.getElementById('tva-enabled').checked;
        const tvaRate = parseFloat(document.getElementById('tva-rate').value) || 0;

        let tva = 0;
        if (isTvaEnabled) {
            tva = Math.round(subtotal * (tvaRate / 100));
        }

        let global = subtotal + tva;

        document.getElementById('sous-total').innerText = subtotal.toLocaleString() + ' FCFA';
        document.getElementById('tva').innerText = tva.toLocaleString() + ' FCFA';
        document.getElementById('total-global').innerText = global.toLocaleString() + ' FCFA';
        document.getElementById('input-subtotal').value = subtotal;
        document.getElementById('input-tva').value = tva;
        document.getElementById('input-total').value = global;

    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('select[name="type"]').addEventListener('change', toggleFieldsByType);
        toggleFieldsByType();
        calculTotalGlobal();
    });


    document.querySelector('form').addEventListener('submit', function() {
        const rows = document.querySelectorAll('#articles-body tr:not(#empty-state-row)');

        rows.forEach((row, newIndex) => {
            row.querySelectorAll('input').forEach(input => {
                if (input.name.includes('articles')) {
                    input.name = input.name.replace(/articles\[\d+\]/, `articles[${newIndex}]`);
                }
            });
        });
    });
</script>
@endsection