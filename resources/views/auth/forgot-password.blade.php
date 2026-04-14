<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Hunabku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#1e293b] flex items-center justify-center min-h-screen p-4 relative overflow-hidden">

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5 pointer-events-none"
        style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/svg%3E');">
    </div>

    <div
        class="w-full max-w-md bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl shadow-2xl p-8 relative z-10">

        <!-- Header Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center mb-4">
                <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M60 10 C80 10, 95 30, 90 60 C85 85, 65 95, 55 90 C50 85, 60 60, 60 50 C60 25, 50 20, 60 10 Z"
                        fill="#ef4444" />
                    <path d="M10 30 C10 15, 30 10, 45 25 C55 35, 45 50, 40 50 C30 50, 10 45, 10 30 Z" fill="#fbbf24" />
                    <path d="M5 65 C5 50, 25 50, 40 60 C50 70, 40 85, 30 90 C15 95, 5 80, 5 65 Z" fill="#f97316" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-white">Recuperar Contraseña</h2>
            <p class="text-gray-400 text-sm mt-1">Te enviaremos un enlace para restablecer tu contraseña</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-300 px-4 py-3 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#ff5a5f] focus:ring-1 focus:ring-[#ff5a5f] transition-all"
                    placeholder="correo@ejemplo.com">
                @error('email')
                    <p class="mt-2 text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón Enviar -->
            <button type="submit"
                class="w-full py-3.5 bg-[#ff5a5f] hover:bg-[#e04e53] text-white font-bold rounded-xl shadow-lg shadow-red-500/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Enviar Enlace de Recuperación
            </button>

            <!-- Links -->
            <div class="text-center mt-6 space-y-2">
                <p class="text-sm text-gray-400">
                    ¿Recordaste tu contraseña?
                    <a href="http://hk_autenticacion_est.test/login"
                        class="text-[#ff5a5f] hover:text-white transition-colors font-medium">
                        Volver al Login
                    </a>
                </p>
            </div>
        </form>

        <div class="mt-8 text-center border-t border-gray-700/50 pt-4">
            <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Hunabku. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>