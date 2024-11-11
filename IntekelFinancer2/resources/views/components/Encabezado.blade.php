<!-- Div de toda la barra -->
<div class="flex justify-between items-center p-4 h-14" style="background-color: #499119">
    <!-- Div del logo -->
    <div class="flex items-center">
        <img src="{{ asset('imgs/LogoIntekel.png')}}" alt="Logo Intekel" class="w-12 h-12 object-contain">
    </div>
    <!-- Div del título -->
    <div class="flex-1 ml-3">
        <span class="text-2xl font-sans text-white">Intekel Financer</span>
    </div>
    <!-- Div de los iconos -->
    <div class="flex gap-4 items-center">
        <!-- Icono de timbrado -->
        <a href="#" onclick="shakeIcon(this)">
            <i class="fa-regular fa-bell fa-2xl text-white"></i>
        </a>
        <!-- Icono de engranaje -->
        <a href="#" onclick="spinIcon(this)">
            <i class="fa-solid fa-gear fa-2xl text-white"></i>
        </a>
    </div>
</div>

<script>
    function shakeIcon(element) {
        const icon = element.querySelector('i');
        icon.classList.add('fa-shake');
        setTimeout(() => {
            icon.classList.remove('fa-shake');
        }, 1000); // Duración de la animación en milisegundos
    }

    function spinIcon(element) {
        const icon = element.querySelector('i');
        icon.classList.add('fa-spin');
        setTimeout(() => {
            icon.classList.remove('fa-spin');
        }, 1000); // Duración de la animación en milisegundos
    }
</script>