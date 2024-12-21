<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Intekel Financer</title>

    <!----------------------------------------------- Icono ---------------------------------------->
    <link rel="icon" href="{{ asset('Logo/LogoIntekel.png') }}">
    <!----------------------------------------------- Fonts ----------------------------------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="dark:bg-custom-gradient-dark bg-custom-gradient-light ">
    <div class="absolute top-4 right-4">
        <label class="relative inline-flex items-center cursor-pointer">
            <input class="sr-only peer" type="checkbox" id="toggleTheme" onchange="toggleTheme()" />
            <div class="w-24 h-12 rounded-full ring-0 peer duration-500 outline-none bg-gray-200 dark:bg-gray-700 overflow-hidden before:flex before:items-center before:justify-center after:flex after:items-center after:justify-center before:content-['☀️'] before:absolute before:h-10 before:w-10 before:top-1/2 before:bg-white before:rounded-full before:left-1 before:-translate-y-1/2 before:transition-all before:duration-700 peer-checked:before:opacity-0 peer-checked:before:rotate-90 peer-checked:before:-translate-y-full shadow-lg shadow-gray-400 peer-checked:shadow-lg peer-checked:shadow-gray-700 peer-checked:bg-[#383838] after:content-['🌑'] after:absolute after:bg-[#1d1d1d] after:rounded-full after:top-[4px] after:right-1 after:translate-y-full after:w-10 after:h-10 after:opacity-0 after:transition-all after:duration-700 peer-checked:after:opacity-100 peer-checked:after:rotate-180 peer-checked:after:translate-y-0"
                onclick="toggleTheme()"></div>
        </label>
    </div>
    <main class="flex items-center min-h-screen transition-colors duration-500">
        <div class="flex flex-col md:flex-row w-full">
            <div class="flex items-center justify-center w-full md:w-1/2 p-6">
                <form action="{{ route('login') }}" method="POST"
                    class="p-8 w-full max-w-lg transition duration-500 ease-in-out">
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('Logo/LogoIntekel.png') }}" alt="Logo" class="w-48 h-48">
                    </div>
                    @csrf
                    <!-- Correo electrónico -->
                    <div class="mb-4">
                        <label for="Input_Email" class="block text-gray-900 dark:text-gray-100 font-semibold text-lg">
                            Correo electrónico
                        </label>
                        <input type="email" name="email" id="Input_Email" placeholder="Ejemplo@correo.com" required
                            class="form-control w-full mt-1 p-3 border rounded-md bg-white text-black border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-green-400 dark:focus:ring-offset-gray-900">
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for="Input_Password"
                            class="block text-gray-900 dark:text-gray-100 font-semibold text-lg">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="Input_Password" placeholder="********" required
                            class="form-control w-full mt-1 p-3 border rounded-md bg-white text-black border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-green-400 dark:focus:ring-offset-gray-900">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember"
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded dark:bg-gray-800 dark:border-gray-600">
                            <label for="remember" class="ml-2 block text-gray-900 dark:text-gray-100">Recuérdame</label>
                        </div>
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-black hover:text-white dark:text-gray-400">¿Olvidaste tu
                            contraseña?</a>
                    </div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-white text-black font-semibold rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-500 dark:text-white">
                        Iniciar sesión
                    </button>
                    <div class="mt-6 text-center">
                        <span class="text-gray-900 dark:text-gray-100">¿No tienes una cuenta?</span>
                        <a href="{{ route('register') }}"
                            class="text-black hover:text-white dark:text-green-400 dark:hover:text-green-300">Regístrate</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
