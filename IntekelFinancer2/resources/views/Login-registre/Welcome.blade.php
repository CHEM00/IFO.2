<!doctype html>
<html lang="en">

<head>
    <title>Inicio de sesión</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icono de la aplicación -->
    <link rel="icon" href="{{ asset('imgs/LogoIntekel.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans text-gray-900 dark:text-gray-100 transition-colors duration-500 dark:bg-gray-900 dark:bg-gradient-to-r bg-green-800 dark:from-gray-900 dark:to-gray-800">
    <div class="absolute top-4 right-4">
        <label class="relative inline-flex items-center cursor-pointer">
            <input class="sr-only peer" type="checkbox" id="darkModeToggle" />
            <div
                class="w-24 h-12 rounded-full ring-0 peer duration-500 outline-none bg-gray-200 dark:bg-gray-700 overflow-hidden before:flex before:items-center before:justify-center after:flex after:items-center after:justify-center before:content-['☀️'] before:absolute before:h-10 before:w-10 before:top-1/2 before:bg-white before:rounded-full before:left-1 before:-translate-y-1/2 before:transition-all before:duration-700 peer-checked:before:opacity-0 peer-checked:before:rotate-90 peer-checked:before:-translate-y-full shadow-lg shadow-gray-400 peer-checked:shadow-lg peer-checked:shadow-gray-700 peer-checked:bg-[#383838] after:content-['🌑'] after:absolute after:bg-[#1d1d1d] after:rounded-full after:top-[4px] after:right-1 after:translate-y-full after:w-10 after:h-10 after:opacity-0 after:transition-all after:duration-700 peer-checked:after:opacity-100 peer-checked:after:rotate-180 peer-checked:after:translate-y-0"
            ></div>
        </label>
    </div>
    <main class="flex items-center min-h-screen transition-colors duration-500">
        <div class="flex flex-col md:flex-row w-full">
            <div class="flex items-center justify-center w-full md:w-1/2 p-6">
                <!-- Mostrar mensaje de éxito -->
                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: '{{ session('success') }}',
                            });
                        });
                    </script>
                @endif
                <!-- Mostrar mensaje de error -->
                @if (session('error'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: '{{ session('error') }}',
                            });
                        });
                    </script>
                @endif
                <form action="{{ route('Login') }}" method="POST"
                    class="p-8 w-full max-w-lg transition duration-500 ease-in-out">
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('imgs/LogoIntekel.png') }}" alt="Logo" class="w-48 h-48">
                    </div>
                    @csrf
                    <div class="mb-4">
                        <label for="Input_Email" class="block text-gray-900 dark:text-gray-100 font-semibold text-lg">Correo
                            electrónico</label>
                        <input type="email" name="email"
                            class="form-control w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-800 dark:border-gray-600 dark:focus:ring-gray-500"
                            id="Input_Email" placeholder="Ejemplo@correo.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="Input_Password" class="block text-gray-900 dark:text-gray-100 font-semibold text-lg">Contraseña</label>
                        <input type="password" name="password"
                            class="form-control w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-800 dark:border-gray-600 dark:focus:ring-gray-500"
                            id="Input_Password" placeholder="********" required>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember"
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-600">
                            <label for="remember" class="ml-2 block text-gray-900 dark:text-gray-100">Recuérdame</label>
                        </div>
                        <a href="{{}}" class="text-sm text-green-600 hover:text-green-500 dark:text-gray-400">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-500">
                        Iniciar sesión
                    </button>
                </form>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('darkModeToggle').addEventListener('change', function() {
            document.documentElement.classList.toggle('dark', this.checked);
        });
    </script>
</body>

</html>
