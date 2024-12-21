// resources/js/components/header.js
export function shakeIcon(element) {
    const icon = element.querySelector('i');
    icon.classList.add('fa-shake');
    setTimeout(() => {
        icon.classList.remove('fa-shake');
    }, 1000); // Duración de la animación en milisegundos
}

export function spinIcon(element) {
    const icon = element.querySelector('i');
    icon.classList.add('fa-spin');
    setTimeout(() => {
        icon.classList.remove('fa-spin');
    }, 1000); // Duración de la animación en milisegundos
}