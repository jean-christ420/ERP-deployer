<!doctype html>
<html class="light" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ERP Achats - Connexion</title>
    <!-- Fonts & Icons -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&amp;display=swap"
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
              error: "#ba1a1a",
              secondary: "#545d7e",
              "outline-variant": "#c4c6d3",
              "on-secondary-fixed": "#101a37",
              "surface-bright": "#f7f9fd",
              "inverse-primary": "#b4c5ff",
              "secondary-fixed": "#dbe1ff",
              "on-primary-container": "#91abff",
              "inverse-on-surface": "#eff1f5",
              "on-tertiary-fixed": "#341100",
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
              "on-background": "#181c1f",
              "on-surface": "#181c1f",
              background: "#f7f9fd",
              "surface-container-low": "#f2f4f8",
              "surface-container-high": "#e6e8ec",
              "on-error-container": "#93000a",
              "secondary-container": "#d0d9ff",
              "surface-dim": "#d8dade",
              "on-primary-fixed-variant": "#244191",
              "primary-container": "#1d3c8b",
              "on-tertiary": "#ffffff",
              "on-secondary": "#ffffff",
              "surface-container-lowest": "#ffffff",
              "on-tertiary-fixed-variant": "#773204",
              "surface-variant": "#e0e3e6",
              "on-primary-fixed": "#00174c",
              outline: "#757682",
              "surface-tint": "#3e5aaa",
              primary: "#00256f",
              "inverse-surface": "#2d3134",
              "primary-fixed-dim": "#b4c5ff",
              "on-secondary-fixed-variant": "#3c4665",
              surface: "#f7f9fd",
              "on-error": "#ffffff",
              tertiary: "#4d1d00",
              "on-tertiary-container": "#f69561",
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
  <body
    class="bg-surface text-on-surface min-h-screen selection:bg-primary-fixed selection:text-on-primary-fixed"
  >
    <main class="flex min-h-screen w-full flex-col md:flex-row overflow-hidden">
      <!-- Left Column: Branding & Identity -->
      <section
        class="relative w-full md:w-[45%] lg:w-[40%] bg-primary-container flex flex-col justify-between p-8 md:p-16 lg:p-24 overflow-hidden"
      >
        <!-- Background Texture / Overlay -->
        <div
          class="absolute inset-0 opacity-10 mix-blend-overlay pointer-events-none"
        >
          <img
            alt=""
            class="w-full h-full object-cover"
            src="https://lh3.googleusercontent.com/aida/ADBb0uh09NqQpC-JJ_v8iEo4y-08eVZX3lIYhPvFeJFq7aqAn4MbAdmkuzxwjm-NsqfnWjHLFCyeWECKC0HU7M7AgMBl7L0n8AUflBNGVT4aTHcI1FW2aKqLvjwE9aHdfCUM8Fjar_Kot3JIAtmO5pXSN86Ofkp4_SXQ1T7bHu_Gbr7KBSRDDmWPMQYEJcsrcIBcnqLL51dYejZwDlXGB-Cnr3-jy7EYh6jJdlPyZiJxbhkqMX9x5Fb9OAiFHpZZNIc5bObFo0r4c1gZyw"
          />
        </div>
        <div
          class="absolute inset-0 bg-gradient-to-br from-primary-container via-primary to-primary opacity-90"
        ></div>
        <!-- Branding Content -->
        <div class="relative z-10 space-y-12">
          <div class="flex items-center gap-3">
            <span
              class="material-symbols-outlined text-on-primary text-4xl"
              data-icon="account_balance"
              >account_balance</span
            >
            <span class="text-on-primary font-black text-2xl tracking-tighter"
              >ERP ACHATS</span
            >
          </div>
          <div class="space-y-6">
            <h1
              class="text-on-primary text-4xl lg:text-5xl font-black leading-[1.1] tracking-tight"
            >
              Système de gestion des achats et des dépenses
            </h1>
            <p
              class="text-on-primary-container text-lg md:text-xl font-medium max-w-md"
            >
              Portail sécurisé pour l'administration publique. Gérez vos
              approvisionnements avec une précision architecturale.
            </p>
          </div>
        </div>
        <!-- Bottom Graphic / Institution Logo -->
        <div class="relative z-10 pt-12">
          <div
            class="p-6 bg-white/5 backdrop-blur-xl rounded-xl border border-white/10 max-w-sm"
          >
            <img
              alt="Partenaire Gouvernemental"
              class="h-8 object-contain opacity-80 filter brightness-200"
              src="https://lh3.googleusercontent.com/aida/ADBb0uiy5mX0p08ZEo6WGjhIjrRkIPLRITYrTXoTih1T6jiUVl887I2d9n972IL1K-AJnJcPllzVT7ujK1QsMV4-LaL1vd_4uFDs-cbSc8UsKbfkFDV66HFs7LqAwJBbD-sJrsHr6X80WT8VT65DBFui5DLzaFRCTYosDeFFSl8Opxb2XZya1k-nnoq3Z_AW5Da3g97N2UOjJG_6MHJ022xtbK87zciJXY3m6ZaUSdW-izpQ3HWZyqFNqxgIsAAtanMNczhKKAKuBmq3ew"
            />
          </div>
          <div
            class="mt-8 text-on-primary/60 text-xs font-bold uppercase tracking-[0.2em]"
          >
            © 2026 ERP Achats • Sécurité d'État
          </div>
        </div>
        <!-- Architectural flourish -->
        <div
          class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-white/5 rounded-full blur-3xl pointer-events-none"
        ></div>
      </section>
      <!-- Right Column: Login Form -->
      <section
        class="flex-1 bg-surface flex items-center justify-center p-6 md:p-12 lg:p-20 relative"
      >
        <!-- Floating Grid Accents -->
        <div
          class="absolute top-0 right-0 w-64 h-64 bg-surface-container-low/50 rounded-bl-[120px] pointer-events-none"
        ></div>
        <div class="w-full max-w-[440px] relative">
          <!-- Login Card -->
          <div
            class="bg-surface-container-lowest p-8 md:p-12 rounded-xl shadow-[0px_12px_32px_rgba(29,60,139,0.06)] border border-outline-variant/10"
          >
            <div class="mb-10 text-center md:text-left">
              <h2
                class="text-3xl font-black tracking-tight text-on-surface mb-2"
              >
                Connexion
              </h2>
              <p class="text-secondary font-medium">
                Veuillez entrer vos identifiants pour accéder à votre espace de
                travail.
              </p>
            </div>
            
            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
              @csrf

              <!-- Email Field -->
              <div class="space-y-2">
                <label
                  class="block text-[11px] font-extrabold uppercase tracking-widest text-secondary ml-1"
                  for="email"
                >
                  Adresse e-mail
                </label>
                <div class="relative">
                  <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl"
                    data-icon="mail"
                    >mail</span
                  >
                  <input
                    class="w-full pl-12 pr-4 py-4 bg-surface-container-low rounded-lg border-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary/20 transition-all text-sm font-medium placeholder:text-outline-variant"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required 
                    autofocus
                    placeholder="nom@institution.gouv"
                    type="email"
                  />
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Password Field -->
              <div class="space-y-2">
                <div class="flex justify-between items-center px-1">
                  <label
                    class="block text-[11px] font-extrabold uppercase tracking-widest text-secondary"
                    for="password"
                  >
                    Mot de passe
                  </label>
                  <a
                    class="text-[11px] font-bold text-primary hover:underline transition-all"
                    href="{{ route('password.request') }}"
                  >
                    Mot de passe oublié ?
                  </a>
                </div>
                <div class="relative">
                  <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl"
                    data-icon="lock"
                    >lock</span
                  >
                  <input
                    class="w-full pl-12 pr-12 py-4 bg-surface-container-low rounded-lg border-none focus:bg-surface-container-lowest focus:ring-1 focus:ring-primary/20 transition-all text-sm font-medium placeholder:text-outline-variant"
                    id="password"
                    name="password"
                    required
                    placeholder="••••••••"
                    type="password"
                  />
                  <button
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors"
                    type="button"
                    onclick="const pwd = document.getElementById('password'); pwd.type = pwd.type === 'password' ? 'text' : 'password';"
                  >
                    <span
                      class="material-symbols-outlined text-xl"
                      data-icon="visibility"
                      >visibility</span
                    >
                  </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Submit Button -->
              <div class="pt-4">
                <button
                  class="w-full py-4 bg-gradient-to-br from-primary-container to-primary text-on-primary font-bold rounded-lg shadow-lg shadow-primary/10 hover:shadow-xl hover:scale-[1.01] transition-all duration-200 active:scale-[0.98] flex items-center justify-center gap-2 group"
                  type="submit"
                >
                  Se connecter
                  <span
                    class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform"
                    data-icon="arrow_forward"
                    >arrow_forward</span
                  >
                </button>
              </div>
            </form>
            <!-- Form Footer -->
            <div
              class="mt-10 pt-8 border-t border-surface-container-high text-center"
            >
              <p class="text-xs text-secondary font-medium mb-4">
                Besoin d'assistance ? Contactez le support technique interne.
              </p>
              <div class="flex justify-center gap-6">
                <a
                  class="text-[10px] font-black uppercase tracking-widest text-secondary hover:text-primary transition-colors"
                  href="#"
                  >Documentation</a
                >
                <a
                  class="text-[10px] font-black uppercase tracking-widest text-secondary hover:text-primary transition-colors"
                  href="#"
                  >Assistance</a
                >
                <a
                  class="text-[10px] font-black uppercase tracking-widest text-secondary hover:text-primary transition-colors"
                  href="#"
                  >Confidentialité</a
                >
              </div>
            </div>
          </div>
          <!-- Subtle Institutional Context -->
          <div
            class="mt-12 flex items-center justify-center md:justify-start gap-4 px-4 opacity-50 grayscale hover:grayscale-0 transition-all duration-500"
          >
           
            <div class="h-4 w-px bg-outline-variant"></div>
            <span
              class="text-[10px] font-bold text-secondary uppercase tracking-[0.15em]"
              >Certifié Sécurité Publique</span
            >
          </div>
        </div>
        <!-- Background Architectural Detail -->
      </section>
    </main>
  </body>
</html>
