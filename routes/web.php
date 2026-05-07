<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\ApprovalController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Route::middleware(['auth', 'admin'])
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/dashboard', [DashboardController::class, 'index'])
//             ->name('admin.dashboard');
//     });


Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::view('/beneficiaires', 'admin.beneficiaires.index')->name('beneficiaires.index');

        Route::resource('demandes', DemandeController::class);
        
        // Routes d'approbation
        Route::post('demandes/{demande}/validate', [ApprovalController::class, 'validateStep'])->name('demandes.validate');
        Route::post('demandes/{demande}/reject', [ApprovalController::class, 'rejectStep'])->name('demandes.reject');



        Route::view('/catalogue', 'admin.catalogue.index')->name('catalogue.index');
        Route::view('/stock', 'admin.stock.index')->name('stock.index');
        Route::view('/commandes', 'admin.commandes.index')->name('commandes.index');
        Route::view('/receptions', 'admin.receptions.index')->name('receptions.index');
        Route::view('/patrimoine', 'admin.patrimoine.index')->name('patrimoine.index');
        Route::view('/maintenance', 'admin.maintenance.index')->name('maintenance.index');

        Route::view('/factures', 'admin.factures.index')->name('factures.index');
        Route::view('/paiements', 'admin.paiements.index')->name('paiements.index');
        Route::view('/budget', 'admin.budget.index')->name('budget.index');

        Route::view('/users', 'admin.users.index')->name('users.index');
        Route::view('/roles', 'admin.roles.index')->name('roles.index');
        Route::view('/permissions', 'admin.permissions.index')->name('permissions.index');
        Route::view('/parametres', 'admin.parametres.index')->name('parametres.index');
        Route::view('/logs', 'admin.logs.index')->name('logs.index');
    });





// Route::middleware(['auth'])
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/roles', [RoleController::class, 'index'])
//             ->name('admin.roles.index');
//     });















Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
