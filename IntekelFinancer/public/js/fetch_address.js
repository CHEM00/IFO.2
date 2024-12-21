document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('postal_code').addEventListener('blur', function () {
        const postalCode = this.value;

        if (!postalCode) {
            Swal.fire({
                text: 'Por favor ingrese un código postal.'
            });
            return;
        }

        // Realiza la solicitud AJAX
        fetch(`/profile/fetchaddress?postal_code=${postalCode}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Asigna el estado y el código del estado
                    document.getElementById('state').value = data.state ? data.state.state_name : '';
                    document.getElementById('state_code').value = data.state ? data.state.state_code : ''; // Aquí asignamos el código
                    document.getElementById('country').value = data.country ? data.country.country_name : '';
                    document.getElementById('country_code').value = data.country ? data.country.country_code : ''; // Aquí asignamos el código
                    document.getElementById('township').value = data.township ? data.township.township_name : '';
                    document.getElementById('township_code').value = data.township ? data.township.township_code : ''; // Aquí asignamos el código
                    document.getElementById('locality').value = data.locality ? data.locality.locality_name : '';
                    document.getElementById('locality_code').value = data.locality ? data.locality.locality_code : ''; // Aquí asignamos el código

                    // Actualiza el dropdown de colonias
                    const suburbSelect = document.getElementById('suburb');
                    suburbSelect.innerHTML = data.colony.map(suburb => {
                        return `<option value="${suburb.colony_code}">${suburb.colony_name}</option>`;
                    }).join('');
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Función para actualizar el nombre de la colonia seleccionada
    function updateColonyName() {
        const selectedColony = document.getElementById('suburb').selectedOptions[0];
        const colonyName = selectedColony ? selectedColony.text : '';
        document.getElementById('colony_name').value = colonyName;
        console.log('Colony selected: ', colonyName); // Verificación

        // Al cargar la página, si no hay selección manual, selecciona automáticamente el primer valor del dropdown
        const suburbSelect = document.getElementById('suburb');
        if (suburbSelect && suburbSelect.options.length > 0 && !suburbSelect.value) {
            // Establecer el valor de la primera opción si no hay opción seleccionada
            suburbSelect.selectedIndex = 0;
            // Llamar a la función para actualizar el nombre de la colonia
            updateColonyName();
        }
    }

    // Llamamos a la función para actualizar el nombre de la colonia
    updateColonyName();
});
