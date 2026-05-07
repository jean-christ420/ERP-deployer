<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Services\DemandeService;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;

class DemandeController extends Controller
{
    protected $demandeService;

    public function __construct(DemandeService $demandeService)
    {
        $this->demandeService = $demandeService;
    }

    public function index(Request $request)
    {
        $query = Demande::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('reference', 'like', '%' . $request->search . '%')
                    ->orWhere('beneficiaire', 'like', '%' . $request->search . '%')
                    ->orWhere('objet', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->statut) {
            $query->where('statut', $request->statut);
        }

        if ($request->beneficiaire) {
            $query->where('beneficiaire', 'like', '%' . $request->beneficiaire . '%');
        }

        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $demandes = $query->latest()->paginate(10);

        return view('admin.demandes.index', compact('demandes'));
    }

    public function create()
    {
        return view('admin.demandes.create');
    }

    public function store(StoreDemandeRequest $request)
    {
        try {
            $validated = $request->validated();
            
            if ($request->hasFile('piece_justificative_file')) {
                $path = $request->file('piece_justificative_file')->store('pieces', 'public');
                $validated['piece_justificative'] = $path;
            } elseif ($request->filled('piece_justificative_text')) {
                $validated['piece_justificative'] = $request->input('piece_justificative_text');
            }

            $userName = auth()->user() ? auth()->user()->name : 'System';
            $this->demandeService->createDemande($validated, $userName);

            return redirect()->route('admin.demandes.index')
                ->with('success', 'Demande créée avec succès.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }

    public function show(Demande $demande)
    {
        $demande->load('articles', 'commandes');
        return view('admin.demandes.show', compact('demande'));
    }

    public function edit(Demande $demande)
    {
        $demande->load('articles');
        return view('admin.demandes.edit', compact('demande'));
    }

    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        try {
            $validated = $request->validated();
            
            if ($request->hasFile('piece_justificative_file')) {
                $path = $request->file('piece_justificative_file')->store('pieces', 'public');
                $validated['piece_justificative'] = $path;
            } elseif ($request->filled('piece_justificative_text')) {
                $validated['piece_justificative'] = $request->input('piece_justificative_text');
            }

            $this->demandeService->updateDemande($demande, $validated);

            return redirect()->route('admin.demandes.index')
                ->with('success', 'Demande mise à jour avec succès.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }

    public function destroy(Demande $demande)
    {
        $demande->delete();

        return redirect()->route('admin.demandes.index')->with('success', 'Demande supprimée avec succès.');
    }
}
