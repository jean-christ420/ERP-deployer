<!doctype html>

<html class="light" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Créer un compte administrateur | Slate Meridian</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
      rel="stylesheet"
    />
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "on-error-container": "#93000a",
              "secondary-fixed": "#dbe1ff",
              "on-primary-fixed": "#00174c",
              "surface-container-high": "#e6e8ec",
              "error-container": "#ffdad6",
              "primary-container": "#1d3c8b",
              "on-primary-fixed-variant": "#244191",
              "inverse-on-surface": "#eff1f5",
              "on-surface-variant": "#444651",
              "secondary-fixed-dim": "#bcc5eb",
              outline: "#757682",
              "on-background": "#181c1f",
              "primary-fixed": "#dbe1ff",
              primary: "#00256f",
              "tertiary-fixed-dim": "#ffb691",
              "on-surface": "#181c1f",
              "surface-tint": "#3e5aaa",
              "surface-dim": "#d8dade",
              tertiary: "#4d1d00",
              "on-error": "#ffffff",
              "inverse-primary": "#b4c5ff",
              "surface-variant": "#e0e3e6",
              "inverse-surface": "#2d3134",
              "secondary-container": "#d0d9ff",
              "on-tertiary-fixed": "#341100",
              surface: "#f7f9fd",
              secondary: "#545d7e",
              "on-tertiary": "#ffffff",
              "surface-container": "#eceef2",
              "surface-bright": "#f7f9fd",
              "on-primary-container": "#91abff",
              "surface-container-low": "#f2f4f8",
              "surface-container-lowest": "#ffffff",
              "primary-fixed-dim": "#b4c5ff",
              error: "#ba1a1a",
              "on-secondary-fixed-variant": "#3c4665",
              "on-primary": "#ffffff",
              "on-tertiary-fixed-variant": "#773204",
              "on-secondary-fixed": "#101a37",
              "tertiary-fixed": "#ffdbcb",
              "surface-container-highest": "#e0e3e6",
              "on-secondary": "#ffffff",
              "outline-variant": "#c4c6d3",
              "on-tertiary-container": "#f69561",
              "on-secondary-container": "#555e7f",
              background: "#f7f9fd",
              "tertiary-container": "#702d00",
            },
            borderRadius: {
              DEFAULT: "0.25rem",
              lg: "0.5rem",
              xl: "0.75rem",
              full: "9999px",
            },
            fontFamily: {
              headline: ["Inter"],
              display: ["Inter"],
              body: ["Inter"],
              label: ["Inter"],
            },
          },
        },
      };
    </script>
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
      .architectural-split {
        grid-template-columns: 35% 65%;
      }
      .material-symbols-outlined {
        font-variation-settings:
          "FILL" 0,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
      .primary-gradient {
        background: linear-gradient(135deg, #1d3c8b 0%, #00256f 100%);
      }
    </style>
  </head>
  <body class="bg-surface text-on-surface antialiased min-h-screen">
    
    @if(\App\Models\User::whereHas('roles', fn($q) => $q->where('name','admin'))->exists())
        <script>window.location = "{{ route('login') }}"</script>
    @endif

    @if(!\App\Models\User::whereHas('roles', fn($q) => $q->where('name','admin'))->exists())
    <main class="grid min-h-screen grid-cols-1 md:grid-cols-12">
      <!-- Left Column: The Institutional Anchor -->
      <section
        class="hidden md:flex md:col-span-4 primary-gradient flex-col justify-between p-12 text-white relative overflow-hidden"
      >
        <!-- Decorative Architectural Element -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
          <img
            alt="Architectural blueprint overlay"
            class="w-full h-full object-cover"
            src="https://lh3.googleusercontent.com/aida/ADBb0uh09NqQpC-JJ_v8iEo4y-08eVZX3lIYhPvFeJFq7aqAn4MbAdmkuzxwjm-NsqfnWjHLFCyeWECKC0HU7M7AgMBl7L0n8AUflBNGVT4aTHcI1FW2aKqLvjwE9aHdfCUM8Fjar_Kot3JIAtmO5pXSN86Ofkp4_SXQ1T7bHu_Gbr7KBSRDDmWPMQYEJcsrcIBcnqLL51dYejZwDlXGB-Cnr3-jy7EYh6jJdlPyZiJxbhkqMX9x5Fb9OAiFHpZZNIc5bObFo0r4c1gZyw"
          />
        </div>
        <div class="relative z-10">
          <div class="flex items-center gap-3 mb-16">
            <div
              class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-lg flex items-center justify-center"
            >
              <span class="material-symbols-outlined text-white"
                >account_balance</span
              >
            </div>
            <span class="text-xl font-black tracking-tight uppercase"
              >ERP Achats</span
            >
          </div>
          <h1
            class="text-4xl lg:text-5xl font-extrabold tracking-tighter leading-tight mb-6"
          >
            Système de gestion des achats et des dépenses
          </h1>
          <p
            class="text-on-primary-container text-lg max-w-md font-light leading-relaxed"
          >
            Une architecture robuste conçue pour la rigueur institutionnelle et
            la précision financière au sein de votre organisation.
          </p>
        </div>
        <div class="relative z-10 mt-auto">
          <div class="space-y-4">
            <div
              class="flex items-center gap-4 py-3 px-4 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm"
            >
              <span class="material-symbols-outlined text-primary-fixed"
                >verified_user</span
              >
              <p class="text-sm font-medium">
                Contrôle d'accès sécurisé de niveau entreprise
              </p>
            </div>
            <div
              class="flex items-center gap-4 py-3 px-4 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm"
            >
              <span class="material-symbols-outlined text-primary-fixed"
                >analytics</span
              >
              <p class="text-sm font-medium">
                Audits et traçabilité financière intégrale
              </p>
            </div>
          </div>
          <div class="mt-12 flex items-center gap-2">
            <span
              class="text-[10px] font-bold uppercase tracking-widest text-primary-fixed opacity-60"
              >ERP Achats - © 2026</span
            >
          </div>
        </div>
      </section>
      <!-- Right Column: Registration Interface -->
      <section
        class="col-span-1 md:col-span-8 flex items-center justify-center p-6 sm:p-12 bg-surface-container-low"
      >
        <div class="w-full max-w-lg">
          <!-- Mobile Logo (Hidden on Desktop) -->
          <div class="md:hidden flex items-center gap-2 mb-8 justify-center">
            <span class="material-symbols-outlined text-primary text-3xl"
              >account_balance</span
            >
            <span class="text-xl font-black text-primary tracking-tight"
              >ERP Achats</span
            >
          </div>
          <div
            class="bg-surface-container-lowest p-8 md:p-12 rounded-xl shadow-[0px_12px_32px_rgba(29,60,139,0.06)] relative overflow-hidden"
          >
            <div class="mb-10">
              <h2
                class="text-2xl font-black text-on-surface tracking-tight mb-2"
              >
                Créer un compte administrateur
              </h2>
              <p class="text-on-surface-variant text-sm font-medium">
                Initialisation des privilèges système de haut niveau.
              </p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
              @csrf

              <!-- Name Field -->
              <div class="space-y-2">
                <label
                  class="block text-[0.75rem] font-bold uppercase tracking-widest text-on-surface-variant px-1"
                  >Nom Complet</label
                >
                <div class="relative">
                  <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl"
                    >person</span
                  >
                  <input
                    class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 text-sm font-medium"
                    name="name" 
                    value="{{ old('name') }}" 
                    required
                    placeholder="ex: Jean Dupont"
                    type="text"
                  />
                </div>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
              <!-- Email Field -->
              <div class="space-y-2">
                <label
                  class="block text-[0.75rem] font-bold uppercase tracking-widest text-on-surface-variant px-1"
                  >Email Institutionnel</label
                >
                <div class="relative">
                  <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl"
                    >mail</span
                  >
                  <input
                    class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 text-sm font-medium"
                    name="email" 
                    value="{{ old('email') }}" 
                    required
                    placeholder="nom@institution.fr"
                    type="email"
                  />
                </div>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>
              <!-- Password Fields Group -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-2">
                  <label
                    class="block text-[0.75rem] font-bold uppercase tracking-widest text-on-surface-variant px-1"
                    >Mot de passe</label
                  >
                  <div class="relative">
                    <span
                      class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl"
                      >lock</span
                    >
                    <input
                      class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 text-sm font-medium"
                      name="password" 
                      required
                      placeholder="••••••••"
                      type="password"
                    />
                  </div>
                  @error('password')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="space-y-2">
                  <label
                    class="block text-[0.75rem] font-bold uppercase tracking-widest text-on-surface-variant px-1"
                    >Confirmation</label
                  >
                  <div class="relative">
                    <span
                      class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl"
                      >enhanced_encryption</span
                    >
                    <input
                      class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/20 focus:bg-surface-container-lowest transition-all placeholder:text-outline/50 text-sm font-medium"
                      name="password_confirmation" 
                      required
                      placeholder="••••••••"
                      type="password"
                    />
                  </div>
                </div>
              </div>
              <div class="pt-4">
                <button
                  class="w-full primary-gradient text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-primary/20 transition-all active:scale-[0.98] flex items-center justify-center gap-2"
                  type="submit"
                >
                  <span>Créer le compte</span>
                  <span class="material-symbols-outlined text-xl"
                    >arrow_forward</span
                  >
                </button>
              </div>
            </form>
            <!-- Important Notice -->
            <div class="mt-8 pt-8 border-t border-outline-variant/20">
              <div
                class="flex items-start gap-3 p-4 bg-primary-fixed/30 rounded-lg"
              >
                <span
                  class="material-symbols-outlined text-primary text-xl mt-0.5"
                  >info</span
                >
                <p
                  class="text-xs font-semibold text-primary/80 leading-relaxed"
                >
                  Cette étape est disponible uniquement lors de la première
                  configuration. Assurez-vous que les informations saisies sont
                  définitives.
                </p>
              </div>
            </div>
          </div>
          <!-- Footer Metadata -->
          <div
            class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 px-2"
          >
            <div class="flex items-center gap-6">
              <a
                class="text-xs font-bold text-outline uppercase tracking-wider hover:text-primary transition-colors"
                href="#"
                >Support Technique</a
              >
              <a
                class="text-xs font-bold text-outline uppercase tracking-wider hover:text-primary transition-colors"
                href="#"
                >Documentation</a
              >
            </div>
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
              <span
                class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant"
                >Serveur Connecté</span
              >
            </div>
          </div>
        </div>
      </section>
    </main>
    @endif
  </body>
</html>
