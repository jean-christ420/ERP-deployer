<!doctype html>

<html class="light" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ERP Achats</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "surface-container-lowest": "#ffffff",
              "on-tertiary-fixed-variant": "#773204",
              "tertiary-container": "#702d00",
              "on-tertiary": "#ffffff",
              "on-secondary-container": "#555e7f",
              "outline-variant": "#c4c6d3",
              "on-tertiary-container": "#f69561",
              "surface-container": "#eceef2",
              "on-primary-fixed": "#00174c",
              "inverse-primary": "#b4c5ff",
              outline: "#757682",
              "on-primary-fixed-variant": "#244191",
              "error-container": "#ffdad6",
              "surface-dim": "#d8dade",
              "on-tertiary-fixed": "#341100",
              "on-primary": "#ffffff",
              "tertiary-fixed-dim": "#ffb691",
              secondary: "#545d7e",
              "surface-bright": "#f7f9fd",
              "inverse-on-surface": "#eff1f5",
              "on-secondary-fixed-variant": "#3c4665",
              "surface-container-low": "#f2f4f8",
              "on-surface": "#181c1f",
              "surface-variant": "#e0e3e6",
              "on-error-container": "#93000a",
              "secondary-container": "#d0d9ff",
              "tertiary-fixed": "#ffdbcb",
              "secondary-fixed": "#dbe1ff",
              error: "#ba1a1a",
              "inverse-surface": "#2d3134",
              surface: "#f7f9fd",
              "primary-fixed": "#dbe1ff",
              "secondary-fixed-dim": "#bcc5eb",
              "on-error": "#ffffff",
              "on-background": "#181c1f",
              "surface-container-highest": "#e0e3e6",
              "surface-container-high": "#e6e8ec",
              "on-surface-variant": "#444651",
              "on-primary-container": "#91abff",
              tertiary: "#4d1d00",
              "on-secondary-fixed": "#101a37",
              "primary-container": "#1d3c8b",
              primary: "#00256f",
              "surface-tint": "#3e5aaa",
              "primary-fixed-dim": "#b4c5ff",
              background: "#f7f9fd",
              "on-secondary": "#ffffff",
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
        background-color: #f7f9fd;
      }
      .material-symbols-outlined {
        font-variation-settings:
          "FILL" 0,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
      .institutional-gradient {
        background: linear-gradient(135deg, #1d3c8b 0%, #00256f 100%);
      }
    </style>
  </head>
  <body class="text-on-surface">
    @auth
    <script>
        window.location = "{{ route('dashboard') }}"
    </script>
    @endauth

    <div
      class="relative flex min-h-screen w-full flex-col bg-surface overflow-x-hidden"
    >
      <!-- Header Section -->
      <header
        class="flex items-center justify-between px-8 py-6 border-b border-outline-variant/20 bg-surface-container-lowest"
      >
        <div class="flex items-center gap-3 text-primary">
          <div class="size-8">
            <svg
              fill="none"
              viewbox="0 0 48 48"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4 4H17.3334V17.3334H30.6666V30.6666H44V44H4V4Z"
                fill="currentColor"
              ></path>
            </svg>
          </div>
          <h1 class="text-xl font-bold tracking-tight text-primary uppercase">
            ERP Achats
          </h1>
        </div>
        <button
          onclick="window.location='{{ route('login') }}'"
          class="flex min-w-[120px] cursor-pointer items-center justify-center rounded-lg h-10 px-6 institutional-gradient text-on-primary text-sm font-bold tracking-wide shadow-lg hover:brightness-110 transition-all"
        >
          <span>Connexion</span>
        </button>
      </header>
      <main class="flex flex-1 flex-col items-center justify-center px-4 py-20">
        <!-- Hero Content -->
        <div
          class="max-w-[800px] w-full text-center flex flex-col items-center gap-10"
        >
          <div class="flex flex-col gap-4">
            <h2
              class="text-display-lg text-4xl md:text-5xl font-black text-primary tracking-tight"
            >
              Système de gestion des achats
            </h2>
            <p
              class="text-lg text-on-surface-variant font-medium max-w-2xl mx-auto"
            >
              Plateforme interne dédiée à la gestion et à la validation des
              dépenses pour les services administratifs et financiers.
            </p>
          </div>
          <!-- Architectural Split / Info Boxes -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
            <div
              class="flex flex-col items-center gap-3 p-6 bg-surface-container-low rounded-xl"
            >
              <span
                class="material-symbols-outlined text-primary"
                style="font-variation-settings: &quot;FILL&quot; 1"
                >shield_with_heart</span
              >
              <p
                class="text-sm font-bold text-primary-fixed-variant uppercase tracking-wider"
              >
                Accès réservé
              </p>
            </div>
            <div
              class="flex flex-col items-center gap-3 p-6 bg-surface-container-low rounded-xl"
            >
              <span
                class="material-symbols-outlined text-primary"
                style="font-variation-settings: &quot;FILL&quot; 1"
                >lock</span
              >
              <p
                class="text-sm font-bold text-primary-fixed-variant uppercase tracking-wider"
              >
                Authentification
              </p>
            </div>
            <div
              class="flex flex-col items-center gap-3 p-6 bg-surface-container-low rounded-xl"
            >
              <span
                class="material-symbols-outlined text-primary"
                style="font-variation-settings: &quot;FILL&quot; 1"
                >fingerprint</span
              >
              <p
                class="text-sm font-bold text-primary-fixed-variant uppercase tracking-wider"
              >
                Traçabilité
              </p>
            </div>
          </div>
          <div class="flex flex-col gap-6 w-full items-center">
            <button
              onclick="window.location='{{ route('login') }}'"
              class="flex min-w-[240px] cursor-pointer items-center justify-center rounded-xl h-14 px-8 institutional-gradient text-on-primary text-base font-bold tracking-wide shadow-xl transition-all hover:brightness-110"
            >
              <span>Accéder au système</span>
            </button>
          </div>
        </div>
        <!-- Process List Section -->
        <div class="mt-32 w-full max-w-4xl">
          <div class="flex items-center justify-center gap-2 mb-12">
            <div class="h-[1px] w-12 bg-outline-variant/30"></div>
            <span
              class="text-xs font-black uppercase tracking-[0.2em] text-outline"
              >Workflow Opérationnel</span
            >
            <div class="h-[1px] w-12 bg-outline-variant/30"></div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
            <!-- Step 1 -->
            <div class="flex flex-col items-center text-center gap-4 group">
              <div
                class="size-12 rounded-full bg-surface-container-highest flex items-center justify-center text-primary font-bold group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors"
              >
                1
              </div>
              <div class="flex flex-col gap-1">
                <h3 class="text-base font-bold text-on-surface">
                  Création de la demande
                </h3>
                <p class="text-xs text-on-surface-variant">
                  Saisie des besoins par le demandeur
                </p>
              </div>
            </div>
            <!-- Step 2 -->
            <div class="flex flex-col items-center text-center gap-4 group">
              <div
                class="size-12 rounded-full bg-surface-container-highest flex items-center justify-center text-primary font-bold group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors"
              >
                2
              </div>
              <div class="flex flex-col gap-1">
                <h3 class="text-base font-bold text-on-surface">
                  Validation hiérarchique
                </h3>
                <p class="text-xs text-on-surface-variant">
                  Approbation des budgets par les responsables
                </p>
              </div>
            </div>
            <!-- Step 3 -->
            <div class="flex flex-col items-center text-center gap-4 group">
              <div
                class="size-12 rounded-full bg-surface-container-highest flex items-center justify-center text-primary font-bold group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors"
              >
                3
              </div>
              <div class="flex flex-col gap-1">
                <h3 class="text-base font-bold text-on-surface">Exécution</h3>
                <p class="text-xs text-on-surface-variant">
                  Passage de commande et suivi comptable
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Background Image Subtle Placement -->
        
      </main>
      <!-- Footer Section -->
      <footer
        class="bg-surface-container-low px-8 py-10 mt-auto border-t border-outline-variant/10"
      >
        <div
          class="max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between items-center gap-6"
        >
          <div class="flex flex-col gap-2">
            <p
              class="text-sm font-bold text-primary uppercase tracking-widest flex items-center gap-2"
            >
              <span class="material-symbols-outlined text-[18px]"
                >verified_user</span
              >
              Système interne sécurisé
            </p>
            <p class="text-xs text-on-surface-variant">
              &copy; {{ date('Y') }} ERP Achats. Propriété exclusive de la Direction des Achats. Toute intrusion sera tracée.
            </p>
          </div>
          <div class="flex items-center gap-8">
            <div class="flex items-center gap-2">
              <div class="size-2 rounded-full bg-[#10b981] animate-pulse"></div>
              <span
                class="text-xs font-bold text-on-surface-variant uppercase tracking-tighter"
                >● Statut : opérationnel</span
              >
            </div>
            <div class="h-4 w-[1px] bg-outline-variant"></div>
            <p
              class="text-xs font-medium text-outline uppercase tracking-widest"
            >
              Accès réservé
            </p>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
