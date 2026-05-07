<!doctype html>

<html class="light" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Mot de passe oublié - Ledger ERP</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap"
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
              "on-background": "#181c1f",
              "surface-container-low": "#f2f4f8",
              "on-surface": "#181c1f",
              background: "#f7f9fd",
              "secondary-container": "#d0d9ff",
              "surface-container-high": "#e6e8ec",
              "on-error-container": "#93000a",
              "surface-dim": "#d8dade",
              "on-primary-fixed-variant": "#244191",
              "primary-container": "#1d3c8b",
              "on-tertiary": "#ffffff",
              "on-secondary": "#ffffff",
              "on-tertiary-fixed-variant": "#773204",
              "surface-container-lowest": "#ffffff",
              "on-primary-fixed": "#00174c",
              "surface-variant": "#e0e3e6",
              outline: "#757682",
              primary: "#00256f",
              "inverse-surface": "#2d3134",
              "surface-tint": "#3e5aaa",
              "on-secondary-fixed-variant": "#3c4665",
              "primary-fixed-dim": "#b4c5ff",
              surface: "#f7f9fd",
              "on-error": "#ffffff",
              tertiary: "#4d1d00",
              "on-tertiary-container": "#f69561",
              error: "#ba1a1a",
              secondary: "#545d7e",
              "outline-variant": "#c4c6d3",
              "on-secondary-fixed": "#101a37",
              "surface-bright": "#f7f9fd",
              "inverse-primary": "#b4c5ff",
              "on-primary-container": "#91abff",
              "secondary-fixed": "#dbe1ff",
              "on-tertiary-fixed": "#341100",
              "inverse-on-surface": "#eff1f5",
              "tertiary-container": "#702d00",
              "surface-container-highest": "#e0e3e6",
              "on-secondary-container": "#555e7f",
              "secondary-fixed-dim": "#bcc5eb",
              "primary-fixed": "#dbe1ff",
              "error-container": "#ffdad6",
              "on-surface-variant": "#444651",
              "tertiary-fixed": "#ffdbcb",
              "tertiary-fixed-dim": "#ffb691",
              "on-primary": "#ffffff",
              "surface-container": "#eceef2",
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
        font-family: "Inter", sans-serif;
      }
    </style>
  </head>
  <body class="bg-surface text-on-surface min-h-screen flex flex-col">
    <!-- Shell Suppression: No TopAppBar or SideNav for Transactional Screen -->
    <main
      class="flex-grow flex items-center justify-center p-6 relative overflow-hidden"
    >
      <!-- Subtle Architectural Background Accents -->
      <div
        class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-40"
      >
        <div
          class="absolute -top-24 -left-24 w-96 h-96 bg-primary-fixed blur-[120px] rounded-full"
        ></div>
        <div
          class="absolute bottom-0 right-0 w-full h-1/2 bg-gradient-to-t from-surface-container-low to-transparent"
        ></div>
      </div>
      <div class="w-full max-w-[480px] z-10">
        <!-- Brand Identity Header -->
        <div class="mb-10 text-center">
          <div class="inline-flex items-center justify-center mb-6">
            <div
              class="bg-primary-container p-3 rounded-xl shadow-[0px_12px_32px_rgba(29,60,139,0.12)]"
            >
              <span
                class="material-symbols-outlined text-surface text-3xl"
                data-weight="fill"
                style="font-variation-settings: &quot;FILL&quot; 1"
                >account_balance</span
              >
            </div>
          </div>
          <h1
            class="text-3xl font-extrabold tracking-tighter text-primary mb-2 font-display"
          >
            Accès perdu ?
          </h1>
          <div class="h-1 w-12 bg-primary mx-auto rounded-full"></div>
        </div>
        <!-- Content Canvas -->
        <div
          class="bg-surface-container-lowest rounded-xl shadow-[0px_12px_32px_rgba(29,60,139,0.06)] p-8 md:p-10 transition-all duration-300"
        >
          <div class="mb-8">
            <h2 class="text-xl font-bold text-on-surface mb-2 font-headline">
              Mot de passe oublié
            </h2>
            <p
              class="text-on-surface-variant text-sm leading-relaxed font-body"
            >
              Entrez votre adresse email pour recevoir un lien de
              réinitialisation sécurisé pour votre compte Institutional
              Architect.
            </p>
          </div>

          @if (session('status'))
              <div class="mb-4 text-sm text-green-600">
                  {{ session('status') }}
              </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <!-- Email Input Field -->
            <div class="space-y-2">
              <label
                class="block text-xs font-bold uppercase tracking-widest text-outline font-label"
                for="email"
              >
                Adresse Email
              </label>
              <div class="relative group">
                <div
                  class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"
                >
                  <span
                    class="material-symbols-outlined text-outline text-xl group-focus-within:text-primary transition-colors"
                    >mail</span
                  >
                </div>
                <input
                  class="block w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-0 rounded-lg text-on-surface text-sm focus:ring-0 focus:bg-surface-container-lowest focus:shadow-[0_0_0_1px_rgba(0,37,111,0.2)] transition-all duration-200 placeholder:text-outline-variant"
                  id="email"
                  name="email" 
                  value="{{ old('email') }}" 
                  required 
                  autofocus
                  placeholder="nom@institution.fr"
                  type="email"
                />
              </div>
              @error('email')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <!-- Primary Action -->
            <button
              class="w-full py-4 px-6 bg-gradient-to-br from-primary-container to-primary text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:translate-y-[-1px] active:translate-y-[1px] transition-all duration-200 flex items-center justify-center gap-2"
              type="submit"
            >
              <span>Envoyer le lien</span>
              <span class="material-symbols-outlined text-lg"
                >arrow_forward</span
              >
            </button>
          </form>
          <!-- Architectural Split / Separation Logic -->
          <div
            class="mt-10 pt-8 border-t border-surface-container-high text-center"
          >
            <a
              class="inline-flex items-center gap-2 text-sm font-medium text-primary hover:text-primary-container transition-colors group"
              href="{{ route('login') }}"
            >
              <span
                class="material-symbols-outlined text-lg transition-transform group-hover:-translate-x-1"
                >arrow_back</span
              >
              <span>Retour à la connexion</span>
            </a>
          </div>
        </div>
        <!-- Supporting Brand Imagery / Subtle Banner -->
    
        <p
          class="mt-8 text-center text-xs text-outline font-label uppercase tracking-widest"
        >
          © 2026 Institutional Architect ERP Systems • Sécurisé 
        </p>
      </div>
    </main>
    <!-- Contextual Context Image (Hidden on small mobile, editorial style on larger screens) -->
    <div
      class="hidden lg:block fixed bottom-12 right-12 w-64 h-64 z-0 opacity-10"
    >
      <img
        class="w-full h-full object-cover rounded-full mix-blend-multiply"
        data-alt="A sophisticated macro architectural photography piece showing the intersection of fine paper and modern structural metal. The scene is illuminated by soft, cool-toned daylight filtering through a glass facade, creating an atmosphere of professional surgical precision. The aesthetic is rooted in an institutional navy and architectural white palette, emphasizing high-end design quality and authoritative heritage."
        src="https://lh3.googleusercontent.com/aida/ADBb0ujlsaa79Ij_7SeHLiptgmiFmDtEtJf751NxeLFADf3RjjeWFCNpTAF-Kx3vJF7P0CgER6T6ljqAacDgQsr3TcdxgvN2ERGVB_poCP4nhZADpf8LreClTIzewJCxY6uPHZwpdPpZKf9Qhag0Q3_2hw2P8R-cEOcVxh1uVeCTfVQgQG0x6vYN21asHAqC-anB1JukT9JgIzlJTfXS3VjHSYkfb9grn6JqhRglI9tlYyo7aTWn4B4lxUosjsQLuDhDJYihBadGl9Cd"
      />
    </div>
  </body>
</html>
