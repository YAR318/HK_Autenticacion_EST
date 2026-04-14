<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Hunabku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#1e293b] min-h-screen">

    <!-- Background Pattern -->
    <div class="fixed inset-0 opacity-5 pointer-events-none"
        style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/svg%3E');">
    </div>

    <!-- Header -->
    <header class="relative z-10 bg-[#0f172a]/80 backdrop-blur-lg border-b border-white/10">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <svg width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M60 10 C80 10, 95 30, 90 60 C85 85, 65 95, 55 90 C50 85, 60 60, 60 50 C60 25, 50 20, 60 10 Z"
                        fill="#ef4444" />
                    <path d="M10 30 C10 15, 30 10, 45 25 C55 35, 45 50, 40 50 C30 50, 10 45, 10 30 Z" fill="#fbbf24" />
                    <path d="M5 65 C5 50, 25 50, 40 60 C50 70, 40 85, 30 90 C15 95, 5 80, 5 65 Z" fill="#f97316" />
                </svg>
                <span class="text-xl font-bold text-white">Hunabku</span>
            </div>
            <div class="flex items-center gap-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-gray-400 hover:text-white text-sm flex items-center gap-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="relative z-10 max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-white mb-8">Mi Perfil</h1>

        @if (session('status') === 'profile-updated')
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-300 px-4 py-3 rounded-lg text-sm">
                Información actualizada correctamente.
            </div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-300 px-4 py-3 rounded-lg text-sm">
                Contraseña actualizada correctamente.
            </div>
        @endif

        <div class="space-y-6">
            <!-- Información del Perfil -->
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Información Personal
                </h2>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Nombre</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all">
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all">
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="px-6 py-2.5 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-xl transition-all">
                        Guardar Cambios
                    </button>
                </form>
            </div>

            <!-- Cambiar Contraseña -->
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Cambiar Contraseña
                </h2>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Contraseña Actual</label>
                        <input type="password" name="current_password" required
                            class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all"
                            placeholder="••••••••">
                        @error('current_password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Nueva Contraseña</label>
                        <input type="password" name="password" required
                            class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all"
                            placeholder="Mínimo 8 caracteres">
                        @error('password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Confirmar Nueva Contraseña</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all"
                            placeholder="••••••••">
                    </div>

                    <button type="submit"
                        class="px-6 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-xl transition-all">
                        Actualizar Contraseña
                    </button>
                </form>
            </div>

            <!-- Eliminar Cuenta -->
            <div x-data="{ showDelete: false }"
                class="bg-white/5 backdrop-blur-lg border border-red-500/30 rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Eliminar Cuenta
                </h2>
                <p class="text-gray-400 text-sm mb-4">Una vez eliminada tu cuenta, todos tus datos serán eliminados
                    permanentemente.</p>

                <button @click="showDelete = !showDelete" type="button"
                    class="px-6 py-2.5 bg-red-600/20 hover:bg-red-600/40 text-red-400 border border-red-500/50 font-semibold rounded-xl transition-all">
                    Eliminar mi cuenta
                </button>

                <div x-show="showDelete" x-transition class="mt-4 pt-4 border-t border-gray-700">
                    <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
                        @csrf
                        @method('DELETE')

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Confirma tu contraseña</label>
                            <input type="password" name="password" required
                                class="w-full px-4 py-3 bg-[#0f172a]/50 border border-gray-600 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all"
                                placeholder="Tu contraseña actual">
                        </div>

                        <button type="submit"
                            class="px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl transition-all">
                            Confirmar eliminación
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Hunabku. Todos los derechos reservados.</p>
        </div>
    </main>
</body>

</html>