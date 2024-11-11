<!doctype html>
<html lang="en">
    <head>
        <title>Inicio de sesión</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <!-- Icono de la aplicación -->
        <link rel="icon" href="{{ asset('imgs/LogoIntekel.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans">
        <main class="flex items-center min-h-screen" style="background: linear-gradient(to right, #4E9E19 50%, #ffffff 50%);">
            <div class="flex flex-col md:flex-row w-full">
                <div class="flex items-center justify-center w-full md:w-1/2 p-6">
                    <form action="{{route ('Login')}}" method="POST" class="p-8 w-full max-w-lg transition duration-500 ease-in-out">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('imgs/LogoIntekel.png') }}" alt="Logo" class="w-48 h-48">
                        </div>
                        @csrf
                        <div class="mb-4">
                            <label for="Input_Email" class="block text-gray-900 font-semibold text-lg">Correo electrónico</label>
                            <input type="email" class="form-control w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" id="Input_Email" placeholder="Ejemplo@correo.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="Input_Password" class="block text-gray-900 font-semibold text-lg">Contraseña</label>
                            <input type="password" class="form-control w-full mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" id="Input_Password" placeholder="********" required>
                        </div>
                        <div class="mb-4 flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-check-input" id="CheckBox">
                                <label class="ml-2 text-gray-900 text-lg" for="CheckBox">Recuérdame</label>
                            </div>
                            <a href="#" class="text-black hover:underline text-lg">¿Olvidaste tu contraseña?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-full py-3 bg-white text-black rounded-md hover:bg-gray-300 transition duration-300 text-lg">Iniciar sesión</button>
                        <div class="mt-4 text-center">
                            <p class="text-gray-900 text-lg">¿No tienes cuenta? <a href="{{route('register')}}" class="text-blue-700 hover:underline">Regístrate</a></p>
                        </div>
                    </form>
                </div>
                <div class="hidden md:block md:w-1/2 min-h-screen"></div>
            </div>
        </main>
    </body>
</html>
