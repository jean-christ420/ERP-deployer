<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// (plus tard on ajoutera les Models)
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // KPI
        $kpis = [
            'pending_requests' => Demande::where('statut', 'en_attente')->count(),
            'active_orders' => 0,
            'critical_stock' => 0,
            'monthly_expenses' => Demande::sum('montant'),
        ];

        // 🔥 DONNÉES TABLE
        $requests = Demande::latest()->take(10)->get();

        return view('admin.dashboard.index', compact('kpis', 'requests'));
    }
}
