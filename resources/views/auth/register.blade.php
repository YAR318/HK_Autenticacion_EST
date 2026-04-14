<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Hunabku</title>
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
        class="w-full max-w-lg bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl shadow-2xl p-8 relative z-10">

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
            <h2 class="text-2xl font-bold text-white">Crear Cuenta Hunabku</h2>
            <p class="text-gray-400 text-sm mt-1">Únete a nuestra plataforma de gestión</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nombre Completo</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#ff5a5f] focus:ring-1 focus:ring-[#ff5a5f] transition-all"
                    placeholder="Tu nombre">
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Correo Electrónico</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                    class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#ff5a5f] focus:ring-1 focus:ring-[#ff5a5f] transition-all"
                    placeholder="correo@ejemplo.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#ff5a5f] focus:ring-1 focus:ring-[#ff5a5f] transition-all"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirmar
                    Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#ff5a5f] focus:ring-1 focus:ring-[#ff5a5f] transition-all"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-sm" />
            </div>

            <!-- Botón Registrar -->
            <button type="submit"
                class="w-full py-3.5 bg-[#ff5a5f] hover:bg-[#e04e53] text-white font-bold rounded-xl shadow-lg shadow-red-500/30 transition-all transform hover:-translate-y-0.5">
                Registrarse
            </button>

            <!-- Links -->
            <div class="text-center mt-6 space-y-2">
                <p class="text-sm text-gray-400">
                    ¿Ya tienes cuenta?
                    <a href="http://hk-filament.local.com/"
                        class="text-[#ff5a5f] hover:text-white transition-colors font-medium">
                        Ir al Login
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