<!doctype html>

<html class="light" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
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
              "on-primary-fixed-variant": "#244191",
              "inverse-primary": "#b4c5ff",
              error: "#ba1a1a",
              "on-error-container": "#93000a",
              "surface-tint": "#3e5aaa",
              "on-surface": "#181c1f",
              "surface-container-low": "#f2f4f8",
              tertiary: "#4d1d00",
              "primary-container": "#1d3c8b",
              "on-secondary-container": "#555e7f",
              "error-container": "#ffdad6",
              "on-tertiary": "#ffffff",
              "on-primary": "#ffffff",
              outline: "#757682",
              "on-error": "#ffffff",
              "secondary-container": "#d0d9ff",
              "on-tertiary-container": "#f69561",
              primary: "#00256f",
              background: "#f7f9fd",
              "on-primary-fixed": "#00174c",
              "secondary-fixed-dim": "#bcc5eb",
              "outline-variant": "#c4c6d3",
              "on-secondary": "#ffffff",
              "surface-container-high": "#e6e8ec",
              "surface-variant": "#e0e3e6",
              "on-secondary-fixed": "#101a37",
              "surface-dim": "#d8dade",
              "on-background": "#181c1f",
              "inverse-on-surface": "#eff1f5",
              "on-tertiary-fixed-variant": "#773204",
              "surface-container-highest": "#e0e3e6",
              secondary: "#545d7e",
              "primary-fixed-dim": "#b4c5ff",
              "tertiary-container": "#702d00",
              "on-surface-variant": "#444651",
              "on-secondary-fixed-variant": "#3c4665",
              "on-tertiary-fixed": "#341100",
              "tertiary-fixed-dim": "#ffb691",
              "on-primary-container": "#91abff",
              "inverse-surface": "#2d3134",
              "surface-bright": "#f7f9fd",
              "tertiary-fixed": "#ffdbcb",
              surface: "#f7f9fd",
              "surface-container": "#eceef2",
              "secondary-fixed": "#dbe1ff",
              "surface-container-lowest": "#ffffff",
              "primary-fixed": "#dbe1ff",
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
      .material-symbols-outlined {
        font-variation-settings:
          "FILL" 0,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
      body {
        background-color: #f7f9fd;
        font-family: "Inter", sans-serif;
      }
      .architectural-split {
        display: flex;
        min-height: 100vh;
      }
      .institutional-gradient {
        background: linear-gradient(135deg, #1d3c8b 0%, #00256f 100%);
      }
    </style>
  </head>
  <body class="bg-background text-on-background">
    <!-- Focused View: Exclude TopNavBar as per Hierarchy of Focus (Booking/Auth flow) -->
    <div class="architectural-split flex-col md:flex-row">
      <!-- Sidebar Metadata (The Architectural Split) -->
      <aside
        class="hidden md:flex md:w-[35%] bg-surface-container-highest flex-col justify-between p-12 border-r border-transparent"
      >
        <div class="flex flex-col gap-8">
          <div class="flex items-center gap-3 text-primary">
            <div class="size-8">
              <svg
                fill="currentColor"
                viewbox="0 0 48 48"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z"
                ></path>
              </svg>
            </div>
            <span class="text-xl font-bold tracking-tight">ERP System</span>
          </div>
          <div class="mt-12">
            <h2
              class="text-display-sm font-bold text-on-surface leading-tight tracking-[-0.02em] mb-4"
            >
              Sécurité Institutionnelle
            </h2>
            <p
              class="text-body-md text-on-surface-variant leading-relaxed opacity-80"
            >
              La réinitialisation de votre mot de passe est une étape critique
              pour maintenir l'intégrité de vos accès administratifs. Veuillez
              choisir un code robuste respectant les standards de l'institution.
            </p>
          </div>
        </div>
        <div class="flex flex-col gap-6">
          <div class="bg-surface-container-low p-6 rounded-xl">
            <span
              class="block text-label-md font-bold uppercase tracking-widest text-on-surface-variant mb-3"
              >Exigences de Sécurité</span
            >
            <ul
              class="text-label-md text-on-surface-variant space-y-2 opacity-75"
            >
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[14px]"
                  >check_circle</span
                >
                Minimum 12 caractères
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[14px]"
                  >check_circle</span
                >
                Caractères spéciaux requis
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[14px]"
                  >check_circle</span
                >
                Pas de répétitions simples
              </li>
            </ul>
          </div>
          
        </div>
      </aside>
      <!-- Main Content Area -->
      <main
        class="flex-1 flex flex-col justify-center items-center px-6 py-12 bg-surface"
      >
        <!-- Mobile Header Only -->
        <div class="md:hidden flex items-center gap-3 mb-12">
          <div class="size-6 text-primary">
            <svg
              fill="currentColor"
              viewbox="0 0 48 48"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z"
              ></path>
            </svg>
          </div>
          <span class="text-lg font-bold">ERP System</span>
        </div>
        <div class="w-full max-w-[480px]">
          <!-- Back Button -->
          <a
            class="inline-flex items-center gap-2 text-primary text-label-md font-bold mb-8 hover:opacity-70 transition-opacity"
            href="{{ route('login') }}"
          >
            <span class="material-symbols-outlined">arrow_back</span>
            RETOUR À LA CONNEXION
          </a>
          <!-- Header Image -->
          
          <div class="space-y-2 mb-10">
            <h1
              class="text-headline-lg font-bold text-on-surface tracking-tight"
            >
              Réinitialiser le mot de passe
            </h1>
            <p class="text-body-md text-on-surface-variant">
              Sécurisez votre compte en mettant à jour vos identifiants.
            </p>
          </div>
          <!-- Form Card -->
          <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf
            
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Email Field (Readonly) -->
            <div class="flex flex-col gap-2">
              <label
                class="text-label-md font-bold uppercase tracking-wider text-on-surface-variant"
                >Email de référence</label
              >
              <div class="relative">
                <input
                  class="w-full h-14 bg-surface-container-high border-none rounded-xl px-4 text-on-surface-variant font-medium cursor-not-allowed"
                  name="email"
                  type="email"
                  value="{{ old('email', request()->email) }}"
                  readonly
                />
                <div
                  class="absolute right-4 top-1/2 -translate-y-1/2 text-outline"
                >
                  <span class="material-symbols-outlined">lock</span>
                </div>
              </div>
              @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <!-- New Password Field -->
            <div class="flex flex-col gap-2">
              <label
                class="text-label-md font-bold uppercase tracking-wider text-on-surface-variant"
                >Nouveau mot de passe</label
              >
              <div class="relative">
                <input
                  class="w-full h-14 bg-surface-container-low border-none focus:ring-2 focus:ring-primary/20 rounded-xl px-4 text-on-surface transition-all placeholder:text-outline/50"
                  name="password"
                  required
                  placeholder="••••••••••••"
                  type="password"
                />
                <button
                  class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary"
                  type="button"
                  onclick="const pwd = this.previousElementSibling; pwd.type = pwd.type === 'password' ? 'text' : 'password';"
                >
                  <span class="material-symbols-outlined">visibility</span>
                </button>
              </div>
              @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <!-- Confirm Password Field -->
            <div class="flex flex-col gap-2">
              <label
                class="text-label-md font-bold uppercase tracking-wider text-on-surface-variant"
                >Confirmer le mot de passe</label
              >
              <div class="relative">
                <input
                  class="w-full h-14 bg-surface-container-low border-none focus:ring-2 focus:ring-primary/20 rounded-xl px-4 text-on-surface transition-all placeholder:text-outline/50"
                  name="password_confirmation"
                  required
                  placeholder="••••••••••••"
                  type="password"
                />
                <button
                  class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary"
                  type="button"
                  onclick="const pwd = this.previousElementSibling; pwd.type = pwd.type === 'password' ? 'text' : 'password';"
                >
                  <span class="material-symbols-outlined">visibility</span>
                </button>
              </div>
            </div>
            <!-- Action Button -->
            <div class="pt-4">
              <button
                class="w-full h-14 institutional-gradient text-on-primary font-bold rounded-xl shadow-[0px_12px_32px_rgba(29,60,139,0.15)] hover:scale-[1.01] active:scale-100 transition-all flex items-center justify-center gap-2"
                type="submit"
              >
                <span>Réinitialiser</span>
                <span class="material-symbols-outlined">check</span>
              </button>
            </div>
          </form>
          <footer
            class="mt-16 pt-8 border-t border-surface-container-high text-center"
          >
            <p
              class="text-label-sm text-outline uppercase tracking-widest font-medium"
            >
              Système de gestion institutionnel v4.2.0
            </p>
          </footer>
        </div>
      </main>
    </div>
  </body>
</html>
