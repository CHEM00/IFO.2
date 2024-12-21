import './bootstrap';
import Alpine from 'alpinejs';
Alpine.start();
//_________________________________________________________________________
// Import the archive of the component to be used on the header
import { shakeIcon, spinIcon } from './components/header';
window.Alpine = Alpine;
window.shakeIcon = shakeIcon;
window.spinIcon = spinIcon;
// Agregar el evento de clic para cerrar el dropdown
window.onclick = function(event) {
    // Si el clic no es dentro del dropdown y tampoco es en el interruptor
    if (!event.target.matches('.fa-gear') && !event.target.matches('#toggleTheme') && !event.target.closest('#dropdownMenu')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (!openDropdown.classList.contains('hidden')) {
                openDropdown.classList.add('hidden');
            }
        }
    }
};

//_________________________________________________________________________
// Detecta la preferencia del usuario y la aplica
document.addEventListener('DOMContentLoaded', () => {
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const savedTheme = localStorage.getItem('theme');

    // Determina el estado inicial del tema
    const isDarkMode = savedTheme === 'dark' || (!savedTheme && systemPrefersDark);

    // Aplica la clase correspondiente y sincroniza el interruptor
    document.documentElement.classList.toggle('dark', isDarkMode);
    const toggle = document.getElementById('toggleTheme');
    if (toggle) {
        toggle.checked = isDarkMode; // Sincroniza el interruptor con el estado del tema
    }
});

// Función para alternar el estado del dropdown
function toggleDropdown() {
    var dropdownMenu = document.getElementById('dropdownMenu');
    var gearIcon = document.querySelector('.fa-gear'); // Obtener el icono de engranaje

    // Si el dropdown está cerrado, abrirlo y hacer que el icono gire
    if (dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.remove('hidden');        // Mostrar el dropdown
        gearIcon.classList.add('fa-spin');               // Agregar la animación de giro al icono
    } else {
        dropdownMenu.classList.add('hidden');           // Ocultar el dropdown
        gearIcon.classList.remove('fa-spin');           // Eliminar la animación de giro del icono
    }
}


// Agrega toggleTheme al objeto global window
window.toggleTheme = toggleTheme;
