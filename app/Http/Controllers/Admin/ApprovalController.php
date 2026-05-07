<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Services\ApprovalService;
use Exception;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    protected ApprovalService $approvalService;

    public function __construct(ApprovalService $approvalService)
    {
        $this->approvalService = $approvalService;
    }

    /**
     * Valide une étape de la demande.
     */
    public function validateStep(Request $request, Demande $demande)
    {
        $request->validate([
            'role' => ['required', 'string']
        ]);

        try {
            $this->approvalService->validateStep($demande, $request->role, auth()->user());
            
            return redirect()->route('admin.demandes.show', $demande->id)
                             ->with('success', 'La demande a été validée avec succès pour cette étape.');
        } catch (Exception $e) {
            return redirect()->route('admin.demandes.show', $demande->id)
                             ->with('error', $e->getMessage());
        }
    }

    /**
     * Rejette une étape de la demande.
     */
    public function rejectStep(Request $request, Demande $demande)
    {
        $request->validate([
            'role' => ['required', 'string'],
            'commentaire' => ['required', 'string', 'min:3', 'max:1000']
        ]);

        try {
            $this->approvalService->rejectStep($demande, $request->role, auth()->user(), $request->commentaire);
            
            return redirect()->route('admin.demandes.show', $demande->id)
                             ->with('success', 'La demande a été rejetée.');
        } catch (Exception $e) {
            return redirect()->route('admin.demandes.show', $demande->id)
                             ->with('error', $e->getMessage());
        }
    }
}
