<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    // public function create()
    // {
    //     // formulaire création
    // }

    // public function store(Request $request)
    // {
    //     // enregistrer un rôle
    // }

    // public function edit(Role $role)
    // {
    //     // formulaire édition
    // }

    // public function update(Request $request, Role $role)
    // {
    //     // mise à jour
    // }

    // public function destroy(Role $role)
    // {
    //     // désactiver / supprimer
    // }
}
