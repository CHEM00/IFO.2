<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('imgs/LogoIntekel.png') }}">
    <script src="https://kit.fontawesome.com/8519bc483d.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Registro</title>
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="flex items-center justify-center min-h-screen" style="background-color: #EAF6F7">
    <div class="w-full max-w-md mx-auto p-4">
        <div class="bg-green-700 w-full h-14 rounded-t-lg flex items-center justify-between px-4">
            <strong class="text-white text-lg font-semibold">
                Registro
            </strong>
            <a href="{{route ('Login')}}">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Mostrar mensajes de error -->
            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                        });
                    });
                </script>
            @endif
            <form action="{{route ('register')}}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-2xl font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" class="mt-1 font-sans block w-full rounded-md border border-gray-400 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-xl bg-gray-100" id="email" name="email" required>
                </div>
                <div>
                    <label for="password" class="block text-2xl font-medium text-gray-700">Contraseña</label>
                    <input type="password" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-xl bg-gray-100" id="password" name="password" required>
                </div>
                <div>
                    <label for="password_confirmation" class="block text-2xl font-medium text-gray-700">Confirmar Contraseña</label>
                    <input type="password" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-xl bg-gray-100" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="terms" id="check" class="h-4 w-4 text-blue-600 border-gray-400 rounded">
                    <label for="check" class="ml-2 block text-xl text-gray-900">Acepto los términos y condiciones</label>
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-700 text-white py-2 px-4 rounded-md hover:bg-blue-700">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>