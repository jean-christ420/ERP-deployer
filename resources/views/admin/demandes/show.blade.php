@extends('admin.layouts.app')

@section('content')
<main class="w-full flex flex-col min-h-screen">
  <!-- Page Canvas -->
  <div class="p-8 max-w-7xl mx-auto w-full space-y-8">
    <!-- Header Section -->
    <div
      class="flex flex-col md:flex-row md:items-end justify-between gap-6">
      <div>
        <div class="flex items-center gap-3 mb-2">
          <a
            class="flex items-center text-primary hover:underline gap-1 text-[11px] font-black uppercase tracking-widest"
            href="{{ route('admin.demandes.index') }}">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            Retour à la liste
          </a>
        </div>
        <h2
          class="text-3xl font-black text-slate-900 tracking-tight leading-tight">
          Détail de la demande
        </h2>
        <div class="flex items-center gap-4 mt-2">
          <span class="text-slate-500 font-medium">{{ $demande->reference }}</span>
          <span class="h-1 w-1 rounded-full bg-slate-300"></span>
          <span
            class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase tracking-wider">{{ ucfirst(str_replace('_', ' ', $demande->statut)) }}</span>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <form action="{{ route('admin.demandes.destroy', $demande->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">
          @csrf
          @method('DELETE')
          <button
            class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg text-sm font-bold hover:bg-slate-50 transition-colors">
            Supprimer
          </button>
        </form>
        <a href="{{ route('admin.demandes.edit', $demande->id) }}">
          <button
            class="px-6 py-2 bg-primary text-white rounded-lg text-sm font-bold shadow-lg shadow-primary/20 hover:scale-[0.98] active:scale-95 transition-all">
            Éditer la demande
          </button>
        </a>
      </div>
    </div>
    <!-- Bento Layout Start -->
    <div class="grid grid-cols-12 gap-8">
      <!-- Main Info (Left Column) -->
      <div class="col-span-12 lg:col-span-8 space-y-8">
        <!-- General Information Card -->
        <section
          class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
          <div class="px-8 py-6 border-b border-slate-50">
            <h3
              class="text-[11px] font-black uppercase tracking-widest text-slate-400">
              Informations Générales
            </h3>
          </div>
          <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Type de demande</label>
                <p class="text-slate-900 font-bold">{{ ucfirst($demande->type) }}</p>
              </div>
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Direction</label>
                <p class="text-slate-900 font-bold">
                  {{ $demande->direction }}
                </p>
              </div>
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Bénéficiaire</label>
                <p class="text-slate-900 font-bold">{{ $demande->beneficiaire }}</p>
              </div>
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Demandeur</label>
                <p class="text-slate-900 font-bold">{{ $demande->demandeur }}</p>
              </div>
              @if($demande->entreprise)
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Entreprise</label>
                <p class="text-slate-900 font-bold">{{ $demande->entreprise }}</p>
              </div>
              @endif
              @if($demande->libelle_facture)
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Libellé Facture</label>
                <p class="text-slate-900 font-bold">{{ $demande->libelle_facture }}</p>
              </div>
              @endif
              @if($demande->fournisseur)
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Fournisseur</label>
                <p class="text-slate-900 font-bold">{{ $demande->fournisseur }}</p>
              </div>
              @endif
              <div class="md:col-span-2">
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1">Objet</label>
                <p class="text-lg font-extrabold text-slate-900">
                  {{ $demande->objet }}
                </p>
              </div>
            </div>
            <div class="space-y-6">
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-2">Description</label>
                <div
                  class="bg-slate-50 p-6 rounded-xl text-slate-600 text-sm leading-relaxed border border-slate-100">
                  {{ $demande-> description }}
                </div>
              </div>
              <div>
                <label
                  class="text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-2">Justification</label>
                <div
                  class="bg-slate-50 p-6 rounded-xl text-slate-600 text-sm leading-relaxed border border-slate-100">
                  {{ $demande->justification }}
                </div>
              </div>
            </div>
          </div>
        </section>
        @if($demande->articles->count() > 0)
        <!-- Articles / Services Table Card -->
        <section
          class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
          <div
            class="px-8 py-6 border-b border-slate-50 flex items-center justify-between">
            <h3
              class="text-[11px] font-black uppercase tracking-widest text-slate-400">
              Articles &amp; Services
            </h3>
            <span class="text-slate-900 font-bold text-sm">
              {{ $demande->articles->count() }} items
            </span>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>

                <tr class="bg-slate-50">
                  <th
                    class="px-8 py-4 text-[11px] font-black uppercase tracking-widest text-slate-500">
                    Description
                  </th>
                  <th
                    class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-slate-500 text-center">
                    Quantité
                  </th>
                  <th
                    class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-slate-500 text-right">
                    Prix Unitaire (FCFA)
                  </th>
                  <th
                    class="px-8 py-4 text-[11px] font-black uppercase tracking-widest text-slate-500 text-right">
                    Total (FCFA)
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-50">
                @foreach($demande->articles as $article)
                <tr class="hover:bg-slate-50 transition-colors">
                  <td class="px-8 py-5">
                    <div class="flex items-center gap-3">
                      <div class="h-10 w-10 rounded bg-slate-100 flex items-center justify-center text-slate-400">
                        <span class="material-symbols-outlined">inventory_2</span>
                      </div>
                      <div>
                        <p class="text-sm font-bold text-slate-900">{{ $article->description }}</p>
                        <p class="text-[10px] font-medium text-slate-500 line-clamp-1">Ref: {{ Str::limit(hash('crc32', $article->id), 8) }}</p>
                      </div>
                    </div>
                  </td>
                  <td
                    class="px-6 py-5 text-sm text-slate-600 text-center font-bold">
                    {{ $article->quantite }}
                  </td>
                  <td class="px-6 py-5 text-sm text-slate-600 text-right">
                    {{ number_format($article->prix, 0, ',', ' ') }}
                  </td>
                  <td
                    class="px-8 py-5 text-sm text-slate-900 text-right font-black">
                    {{ number_format($article->quantite * $article->prix, 0, ',', ' ') }}
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <!-- Summary Section -->
          <div
            class="bg-slate-50 p-8 flex flex-col items-end gap-2 border-t border-slate-100">
            <div class="flex items-center gap-12 text-slate-500 text-sm">
              <span>Sous-total</span>
              <span class="font-bold text-slate-700">
                @php
                $subtotal = $demande->articles->sum(fn($a) => $a->quantite * $a->prix);
                @endphp

                {{ number_format($subtotal, 0, ',', ' ') }} FCFA</span>
            </div>
            <div class="flex items-center gap-12 text-slate-500 text-sm">
              <span>Taxes (20%)</span>
              <span class="font-bold text-slate-700">
                @php
                $tva = $subtotal * 0.20;
                @endphp

                {{ number_format($tva, 0, ',', ' ') }} FCFA</span>
            </div>
            <div
              class="mt-4 pt-4 border-t border-slate-200 flex items-center gap-12">
              <span
                class="text-[11px] font-black uppercase tracking-widest text-slate-400">Montant Total</span>
              <span class="text-2xl font-black text-primary tracking-tight">{{ number_format($demande->montant, 0, ',', ' ') }} FCFA</span>
            </div>
          </div>
        </section>
        @else
        <section class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden p-8 flex justify-between items-center">
            <h3 class="text-[11px] font-black uppercase tracking-widest text-slate-400">Montant de la demande</h3>
            <span class="text-2xl font-black text-primary tracking-tight">{{ number_format($demande->montant, 0, ',', ' ') }} FCFA</span>
        </section>
        @endif
      </div>
      <!-- Side Information (Right Column) -->
      <div class="col-span-12 lg:col-span-4 space-y-8">
        <!-- Status / Timeline Quick Card -->
        <section
          class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
          <h3
            class="text-[11px] font-black uppercase tracking-widest text-slate-400 mb-6">
            Visas de validation
          </h3>
          <div
            class="space-y-6 relative before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-[2px] before:bg-slate-100">
            @foreach($demande->validations as $validation)
            <div class="relative pl-8 mb-4">
              @if($validation->statut === 'valide')
              <div
                class="absolute left-0 top-1 h-6 w-6 rounded-full bg-emerald-500 border-4 border-white shadow-sm flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-[12px] font-bold">check</span>
              </div>
              @elseif($validation->statut === 'rejete')
              <div
                class="absolute left-0 top-1 h-6 w-6 rounded-full bg-rose-500 border-4 border-white shadow-sm flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-[12px] font-bold">close</span>
              </div>
              @else
              <div
                class="absolute left-0 top-1 h-6 w-6 rounded-full bg-amber-400 border-4 border-white shadow-sm flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-[12px] font-bold">schedule</span>
              </div>
              @endif
              
              <div class="flex items-center gap-2 mb-1">
                <p class="text-xs font-black uppercase tracking-wider text-slate-900">
                  @if($validation->role === 'directrice_achat')
                    VISA DIRECTRICE DES ACHATS
                  @elseif($validation->role === 'tresorier')
                    VISA TRESORIER GENERAL
                  @elseif($validation->role === 'questeur')
                    AVIS DU QUESTEUR
                  @else
                    {{ ucfirst(str_replace('_', ' ', $validation->role)) }}
                  @endif
                </p>
                
                @if($validation->statut === 'valide')
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded text-[9px] font-black uppercase">Validé</span>
                @elseif($validation->statut === 'rejete')
                    <span class="px-2 py-0.5 bg-rose-100 text-rose-700 rounded text-[9px] font-black uppercase">Rejeté</span>
                @else
                    <span class="px-2 py-0.5 bg-amber-100 text-amber-700 rounded text-[9px] font-black uppercase">En attente</span>
                @endif
              </div>

              @if($validation->user_id)
              <p class="text-[11px] text-slate-600 font-bold mb-0.5">
                <span class="material-symbols-outlined text-[11px] align-middle mr-1">person</span>
                {{ $validation->user->name ?? 'Utilisateur' }}
              </p>
              @endif
              
              @if($validation->validated_at)
              <p class="text-[10px] text-slate-400 font-medium">
                {{ $validation->validated_at->format('d M Y, H:i') }}
              </p>
              @endif
              
              @if($validation->commentaire)
              <p class="text-[10px] text-slate-500 mt-2 p-2 bg-slate-50 rounded italic border border-slate-100">
                "{{ $validation->commentaire }}"
              </p>
              @endif
            </div>
            @endforeach
          </div>
        </section>
        
        @php
            $approvalService = app(\App\Services\ApprovalService::class);
            $currentStep = $approvalService->getCurrentExpectedStep($demande);
            $canValidate = $currentStep && auth()->check() && auth()->user()->hasRole($currentStep->role);
        @endphp

        @if($canValidate && !in_array($demande->statut, ['approuve', 'rejete']))
        <!-- Approval Form Section -->
        <section class="bg-amber-50 p-6 rounded-2xl border border-amber-200">
            <h3 class="text-[11px] font-black uppercase tracking-widest text-amber-800 mb-4">
                Action Requise : {{ ucfirst(str_replace('_', ' ', $currentStep->role)) }}
            </h3>
            
            <div class="flex flex-col gap-4">
                <form action="{{ route('admin.demandes.validate', $demande->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="{{ $currentStep->role }}">
                    <button type="submit" class="w-full py-3 bg-emerald-500 text-white rounded-lg text-sm font-bold shadow-lg shadow-emerald-500/20 hover:bg-emerald-600 transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">check_circle</span>
                        Valider l'étape
                    </button>
                </form>

                <form action="{{ route('admin.demandes.reject', $demande->id) }}" method="POST" class="mt-2 border-t border-amber-200 pt-4">
                    @csrf
                    <input type="hidden" name="role" value="{{ $currentStep->role }}">
                    <div class="mb-3">
                        <label class="text-[10px] font-black uppercase tracking-wider text-amber-700 block mb-1">Motif du rejet (Obligatoire)</label>
                        <textarea name="commentaire" required rows="2" class="w-full p-3 bg-white border border-amber-200 rounded-lg focus:ring-amber-500 focus:border-amber-500 text-sm" placeholder="Expliquez la raison du rejet..."></textarea>
                    </div>
                    <button type="submit" class="w-full py-2 bg-white text-rose-600 border border-rose-200 rounded-lg text-sm font-bold hover:bg-rose-50 transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">cancel</span>
                        Rejeter la demande
                    </button>
                </form>
            </div>
        </section>
        @endif
        <!-- Attachments Card -->
        <section
          class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
          <div
            class="px-8 py-6 border-b border-slate-50 flex items-center justify-between">
            <h3
              class="text-[11px] font-black uppercase tracking-widest text-slate-400">
              Pièces Jointes
            </h3>
            <button
              class="text-blue-600 p-1 hover:bg-blue-50 rounded transition-colors">
              <span class="material-symbols-outlined text-[18px]">add</span>
            </button>
          </div>
          <div class="p-6 space-y-3">
            @if($demande->piece_justificative)
              @if(Str::contains($demande->piece_justificative, '/'))
              <div class="flex items-center justify-between p-3 rounded-xl border border-slate-50 hover:border-blue-100 hover:bg-slate-50 transition-all group">
                <div class="flex items-center gap-3">
                  <div class="h-10 w-10 rounded bg-blue-50 text-blue-500 flex items-center justify-center">
                    <span class="material-symbols-outlined">description</span>
                  </div>
                  <div>
                    <p class="text-[12px] font-bold text-slate-900 truncate max-w-[150px]">
                      {{ basename($demande->piece_justificative) }}
                    </p>
                    <p class="text-[10px] text-slate-400 font-medium">Document joint</p>
                  </div>
                </div>
                <a href="{{ asset('storage/' . $demande->piece_justificative) }}" target="_blank" class="text-slate-400 hover:text-blue-600 transition-colors">
                  <span class="material-symbols-outlined text-[20px]">download</span>
                </a>
              </div>
              @else
              <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Référence justificative</p>
                <p class="text-sm font-bold text-slate-900">{{ $demande->piece_justificative }}</p>
              </div>
              @endif
            @else
            <p class="text-sm text-slate-500 italic text-center py-4">Aucune pièce jointe</p>
            @endif
          </div>
        </section>
        <!-- Requester Contact Card -->
        <section
          class="bg-blue-600 p-8 rounded-2xl shadow-xl shadow-blue-200 text-white relative overflow-hidden group">
          <div
            class="absolute -right-4 -bottom-4 opacity-10 transform group-hover:scale-110 transition-transform duration-500">
            <span class="material-symbols-outlined text-[120px]">person_check</span>
          </div>
          <h3
            class="text-[11px] font-black uppercase tracking-widest text-blue-200 mb-6">
            Demandeur
          </h3>
          <div class="flex items-center gap-4">
            <div
              class="h-14 w-14 rounded-xl bg-blue-500/50 border border-blue-400/50 overflow-hidden">
              <img
                alt="Requester avatar"
                class="w-full h-full object-cover"
                data-alt="Portrait of a young professional male in a light shirt smiling at the camera in a modern airy studio"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC26H-M68QzwZq2Y0i1aP4LbFihNcjZafot9vJKKPvjEPWvwiSCRbslmBCq7FVwEnlVPya_C-32VyASHD9wdBoF_K1YehZb3YeJtQUpu4MxSROiO0nlL2NmPf8TNB7nNIwcDQDKkJlq6OUM2WfkqGRsg7KBHSRyfbtjqilfn0u4JoGnh7qJVFOpRWuSCYgKgrf5WADUHbO_54_qKOYF6X706Livo64utxxCNsqv8EgYlULGNe1j3cAHwVDJW1v6H_ylOY7396av_5Q" />
            </div>
            <div>
              <p class="text-lg font-black tracking-tight leading-tight">
                {{ $demande->demandeur }}
              </p>
              <p class="text-blue-200 text-xs font-medium">
                {{ $demande->service }}
              </p>

            </div>
          </div>
          <div
            class="mt-8 pt-6 border-t border-blue-500/50 flex justify-between">
            <button
              class="flex items-center gap-2 hover:text-blue-200 transition-colors">
              <span class="material-symbols-outlined text-sm">mail</span>
              <span class="text-[10px] font-black uppercase tracking-wider">Message</span>
            </button>
            <button
              class="flex items-center gap-2 hover:text-blue-200 transition-colors">
              <span class="material-symbols-outlined text-sm">call</span>
              <span class="text-[10px] font-black uppercase tracking-wider">Appeler</span>
            </button>
          </div>
        </section>
      </div>
    </div>
    <!-- Bottom Action Footer -->
    <div
      class="bg-white border border-slate-100 p-6 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-6">
      <div class="flex items-center gap-4 text-slate-500">
        <span class="material-symbols-outlined text-blue-600">info</span>
        <p class="text-sm">
          @if($demande->statut === 'approuve')
            Cette demande est approuvée et verrouillée.
          @elseif($demande->statut === 'rejete')
            Cette demande a été rejetée et est verrouillée.
          @else
            Cette demande est actuellement au statut : <span class="font-bold text-slate-700">{{ ucfirst(str_replace('_', ' ', $demande->statut)) }}</span>
          @endif
        </p>
      </div>
      <div class="flex items-center gap-3 w-full md:w-auto">
        <button
          class="flex-1 md:flex-none px-6 py-3 bg-white border border-slate-200 text-slate-600 rounded-lg text-[11px] font-black uppercase tracking-widest hover:bg-slate-50 transition-colors">
          Générer PDF
        </button>
        <button
          class="flex-1 md:flex-none px-6 py-3 bg-blue-50 text-blue-700 rounded-lg text-[11px] font-black uppercase tracking-widest hover:bg-blue-100 transition-colors">
          Partager
        </button>
      </div>
    </div>
  </div>
</main>



@endsection