function updateTime() {
    const timeDisplay = document.getElementById('timeDisplay');
    const hourZoneSelect = document.getElementById('hour_zone');

    function updateClock() {
        const hourZone = hourZoneSelect.value;
        const now = new Date();
        const options = { timeZone: hourZone, hour: '2-digit', minute: '2-digit', second: '2-digit' };
        const timeString = now.toLocaleTimeString('es-MX', options);
        timeDisplay.textContent = `Hora actual en ${hourZone}: ${timeString}`;
    }

    // Actualiza la hora cada segundo
    setInterval(updateClock, 1000);

    // Actualiza la hora inmediatamente al cambiar la zona horaria
    hourZoneSelect.addEventListener('change', updateClock);
}

// Inicializa la hora en tiempo real al cargar la página
document.addEventListener('DOMContentLoaded', updateTime);