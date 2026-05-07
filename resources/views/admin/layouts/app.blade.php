<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>ERP Achats — Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#1d3c8b",
                        "background-light": "#f5f7fb",
                        "background-dark": "#121620",
                        success: "#10b981",
                        warning: "#f59e0b",
                        danger: "#ef4444",
                        "on-secondary-fixed": "#0f172a",
                        "surface-dim": "#f1f5f9",
                        "secondary-fixed-dim": "#cbd5e1",
                        "tertiary-fixed": "#ccfbf1",
                        "on-tertiary-container": "#115e59",
                        "surface-container-highest": "#cbd5e1",
                        "on-surface-variant": "#475569",
                        "on-surface": "#0f172a",
                        "on-background": "#0f172a",
                        "surface-container-lowest": "#ffffff",
                        "secondary-container": "#f1f5f9",
                        "on-error": "#ffffff",
                        "primary-fixed": "#dbeafe",
                        "surface-container": "#f1f5f9",
                        "surface": "#ffffff",
                        "surface-tint": "#135bec",
                        "secondary-fixed": "#e2e8f0",
                        "background": "#f6f6f8",
                        "on-primary-container": "#1e40af",
                        "surface-bright": "#ffffff",
                        "tertiary-fixed-dim": "#99f6e4",
                        "inverse-on-surface": "#f8fafc",
                        "error-container": "#ffe4e6",
                        "inverse-surface": "#1e293b",
                        "inverse-primary": "#93c5fd",
                        "outline-variant": "#e2e8f0",
                        "tertiary": "#0d9488",
                        "on-secondary-fixed-variant": "#334155",
                        "surface-container-low": "#f8fafc",
                        "on-tertiary-fixed-variant": "#0d9488",
                        "on-tertiary-fixed": "#042f2e",
                        "on-tertiary": "#ffffff",
                        "on-error-container": "#9f1239",
                        "tertiary-container": "#ccfbf1",
                        "outline": "#94a3b8",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "surface-variant": "#f1f5f9",
                        "surface-container-high": "#e2e8f0",
                        "primary-fixed-dim": "#bfdbfe",
                        "on-primary-fixed": "#1e3a8a",
                        "secondary": "#475569",
                        "primary-container": "#dbeafe",
                        "on-primary-fixed-variant": "#1d4ed8",
                        "error": "#e11d48",
                        "on-secondary-container": "#0f172a"


                    },
                    fontFamily: {
                        display: ["Inter", "sans-serif"],
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        lg: "1rem",
                        xl: "1.5rem",
                        full: "9999px",
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: "Inter", sans-serif;

        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .sidebar-active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid white;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(19, 91, 236, 0.1) !important;
            border-color: #135bec !important;
        }
            .custom-scrollbar {
                scrollbar-width: thin;
                scrollbar-color: #d1d5db transparent;
            }
    </style>

</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display">

    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}

        @include('admin.layouts.sidebar')


        {{-- Contenu principal --}}
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            {{-- Header --}}
            <!-- <header class="bg-white shadow p-4 flex justify-between">
                <div class="font-semibold">Administration</div>

                <div>{{ auth()->user()->name }}</div>
            </header> -->
            @include('admin.layouts.header')

            {{-- Page --}}
            <div class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </div>
        </main>

    </div>

</body>

</html>
