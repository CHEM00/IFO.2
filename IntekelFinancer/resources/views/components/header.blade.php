<!-- Div de toda la barra -->
<div class="flex justify-between items-center p-4 h-14 bg-custom-bg-verde dark:bg-green-900">
    <!-- Div del logo -->
    <div class="flex items-center">
        <img src="{{ asset('Logo/LogoIntekel.png') }}" alt="Logo Intekel" class="w-12 h-12 object-contain">
    </div>
    <!-- Div del título -->
    <div class="flex-1 ml-3">
        <span class="text-2xl font-sans text-white">Intekel Financer</span>
    </div>
    <!-- Div de los iconos -->
    <div class="flex gap-4 items-center relative">
        <!-- Icono de timbrado -->
        <a href="#" onclick="shakeIcon(this)">
            <i class="fa-regular fa-bell fa-2xl text-white"></i>
        </a>
        <!-- Icono de engranaje con dropdown -->
        <div class="relative">
            <!-- Botón del engranaje -->
            <button id="gearButton" class="focus:outline-none">
                <i id="gearIcon" class="fa-solid fa-gear fa-2xl text-white"></i>
            </button>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-50">
                <a href="{{route('profile.completeprofile')}}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Configuración</a>
                <div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200 flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span>Modo Noche</span>
                    <label class="switch">
                        <input type="checkbox" id="toggleTheme" class="toggle-theme">
                        <span class="slider round"></span>
                    </label>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    @method('Delete')
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Estilos del Switch -->
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(14px);
    }
</style>

<!-- Script para manejar el toggle del dropdown y el tema -->
<script>
    // Función para alternar la visibilidad del dropdown
    document.getElementById('gearButton').addEventListener('click', function() {
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
        
        // Añadir animación al icono de engranaje
        const gearIcon = document.getElementById('gearIcon');
        gearIcon.classList.toggle('fa-spin');
    });

    // Función para manejar el cambio de tema con el checkbox
    const toggleThemeCheckbox = document.getElementById('toggleTheme');
    toggleThemeCheckbox.addEventListener('change', function() {
        if (toggleThemeCheckbox.checked) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    });

    // Aplicar el tema guardado en localStorage al cargar la página
    window.onload = function() {
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
            toggleThemeCheckbox.checked = true;
        } else {
            document.documentElement.classList.remove('dark');
            toggleThemeCheckbox.checked = false;
        }
    };

    // Cerrar el dropdown si el usuario hace clic fuera de él
    window.onclick = function(event) {
        if (!event.target.matches('#gearButton') && !event.target.matches('#dropdownMenu') && !event.target.matches('.switch')) {
            var dropdown = document.getElementById('dropdownMenu');
            if (!dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
                document.getElementById('gearIcon').classList.remove('fa-spin');
            }
        }
    };
</script>
