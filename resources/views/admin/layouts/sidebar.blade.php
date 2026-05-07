<aside class="w-72 bg-primary text-white flex flex-col h-screen overflow-y-auto custom-scrollbar">
    <div class="p-6 flex items-center gap-3">
        <div class="size-10 bg-white/20 rounded-lg flex items-center justify-center">
            <span class="material-symbols-outlined text-white text-2xl">account_balance</span>
        </div>
        <div>
            <h1 class="text-lg font-bold leading-tight">GouvProcure</h1>
            <p class="text-xs text-white/60 uppercase tracking-wider font-semibold">
                Admin Nationale
            </p>
        </div>
    </div>
    <nav class="flex-1 mt-1 px-3 space-y-1">
        <x-admin.sidebar-link route="admin.dashboard" icon="dashboard" label="Tableau de bord" />

        <x-admin.sidebar-link route="admin.beneficiaires.index" icon="group" label="Bénéficiaires" />

        <x-admin.sidebar-link route="admin.demandes.index" icon="description" label="Demandes" />

        <x-admin.sidebar-link route="admin.catalogue.index" icon="inventory_2" label="Catalogue" />

        <x-admin.sidebar-link route="admin.stock.index" icon="warehouse" label="Stock" />

        <x-admin.sidebar-link route="admin.commandes.index" icon="shopping_cart" label="Commandes" />

        <x-admin.sidebar-link route="admin.receptions.index" icon="local_shipping" label="Réceptions" />

        <x-admin.sidebar-link route="admin.patrimoine.index" icon="account_balance" label="Patrimoine" />

        <x-admin.sidebar-link route="admin.maintenance.index" icon="build" label="Maintenance" />

        <x-admin.sidebar-link route="admin.factures.index" icon="receipt_long" label="Factures" />

        <x-admin.sidebar-link route="admin.paiements.index" icon="payments" label="Paiements" />

        <x-admin.sidebar-link route="admin.budget.index" icon="account_balance_wallet" label="Budget" />
        <div class="pt-4 pb-2 px-4 text-[10px] font-bold uppercase tracking-widest text-white/40">
            Configuration
        </div>
        <x-admin.sidebar-link route="admin.users.index" icon="people" label="Utilisateurs" />

        <x-admin.sidebar-link route="admin.roles.index" icon="admin_panel_settings" label="Rôles" />

        <x-admin.sidebar-link route="admin.permissions.index" icon="lock" label="Permissions" />

        <x-admin.sidebar-link route="admin.parametres.index" icon="settings" label="Paramètres" />

        <x-admin.sidebar-link route="admin.logs.index" icon="history" label="Logs" />
    </nav>
    <div class="p-4 border-t border-white/10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 py-2.5 rounded-lg transition-all">
                <span class="material-symbols-outlined text-sm">logout</span>
                <span class="text-sm font-semibold">Déconnexion</span>
            </button>
        </form>
    </div>
</aside>
