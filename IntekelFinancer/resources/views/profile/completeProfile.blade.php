<x-app-layout>
    <!---------------------------------full screen content --------------------------------->
    <div class="flex flex-col md:flex-row pr-4 pl-4 mt-10" style="zoom: 90%">
        <!------------------------------------------ Sidebar ------------------------------------------->
        <nav
            class="w-full md:w-1/4 h-min shadow p-4 mb-6 md:mb-0 md:mr-6 bg-white dark:bg-gray-900 dark:border dark:border-white rounded">
            <ul class="space-y-4">
                <li>
                    <a href="" id="dataGeneralLink"
                        class="block text-lg font-medium rounded text-black hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">Datos
                        Generales</a>
                </li>
                <li>
                    <a href="#" id="quickbooksLink"
                        class="block text-lg font-medium rounded text-black hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">Quickbooks</a>
                </li>
            </ul>
        </nav>
        <!-------------------------------------- Modal to connect to QuickBooks ------------------------------------>
        <div id="modalQuickBooks"
            class="hidden w-full md:w-3/4 max-h-[90vh] overflow-y-scroll scrollbar-none bg-gray-100 dark:bg-gray-900 dark:border rounded-lg p-6">
            <div class="w-full h-full flex flex-col justify-between">
                <!-- Modal Content -->
                <div class="flex flex-col justify-center items-center h-full">
                    <p class="text-2xl font-bold text-black dark:text-gray-300 mb-6">¿Quieres conectarte a QuickBooks?
                    </p>

                    <!-- Botón para conectar a QuickBooks -->
                    <button id="connectQuickBooks"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Conectar a QuickBooks
                    </button>
                </div>
            </div>
        </div>
        <!------------------------------------Modal Content ------------------------------------------------>
        <div id="modalDataUser"
            class="w-full md:w-3/4 max-h-[90vh] overflow-y-scroll scrollbar-none bg-gray-100 dark:bg-gray-900 dark:border rounded-lg p-6">
            <div class="w-full h-full flex flex-col justify-between">
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data"
                    class="flex flex-col h-full">
                    @method('PUT')
                    @csrf

                    <!-- Datos Generales Section -->
                    <fieldset class="mb-6 border border-gray-300 flex-grow">
                        <legend class="text-2xl font-bold text-black dark:text-gray-300">Datos Generales</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4 p-4">
                            <div>
                                <x-input-label for="social_reason" value="Razón social" />
                                <x-text-input name="social_reason" value="{{ $user->social_reason }}" id="social_reason"
                                    required class="w-full border" />
                            </div>
                            <div>
                                <x-input-label for="tax_regime" value="Régimen fiscal" />
                                <x-input-select id="tax_regime" name="tax_regime_id" class="w-full border shadow"
                                    :options="$taxRegimes->mapWithKeys(function ($item) {
                                        return [
                                            $item->id => $item->tax_regime_code . ' - ' . $item->tax_regime_description,
                                        ];
                                    })" :selected="$user->tax_regime_id" />
                            </div>
                            <div>
                                <x-input-label for="rfc" value="RFC" />
                                <x-text-input value="{{ $user->rfc }}" name="rfc" id="rfc" required
                                    class="w-full border" />
                                <p id="resultado" class="text-sm mt-2 dark:text-white"></p>
                            </div>
                            <div>
                                <x-input-label for="hour_zone" value="Zona horaria" />
                                <select name="hour_zone" id="hour_zone"
                                    class="w-full border text-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    onchange="updateTime()">
                                    <option value="America/Tijuana"
                                        {{ $user->hour_zone == 'America/Tijuana' ? 'selected' : '' }}>Hora del Pacífico
                                        (PST)</option>
                                    <option value="America/Chihuahua"
                                        {{ $user->hour_zone == 'America/Chihuahua' ? 'selected' : '' }}>Hora de la
                                        Montaña
                                        (MST)</option>
                                    <option value="America/Mexico_City"
                                        {{ $user->hour_zone == 'America/Mexico_City' ? 'selected' : '' }}>Hora del
                                        Centro
                                        (CST)</option>
                                    <option value="America/Cancun"
                                        {{ $user->hour_zone == 'America/Cancun' ? 'selected' : '' }}>Hora del Este (EST)
                                    </option>
                                </select>
                                <div id="timeDisplay" class="mt-2 text-lg text-black dark:text-gray-300"></div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Datos del Domicilio Section -->
                    <fieldset class="mb-6 border border-gray-300 flex-grow">
                        <legend class="text-2xl font-bold text-black dark:text-gray-300">Datos del domicilio</legend>
                        <div id="addressForm">
                            <div class="max-h-[75vh] overflow-y-auto p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="postal_code" value="Código postal" />
                                        <div class="relative w-full md:w-auto flex-grow">
                                            <x-text-input name="postal_code" id="postal_code" class="w-full border"
                                                value="{{ $user->postal_code }}" />
                                            <button id="fetchAddress"
                                                class="absolute end-1 bottom-0 font-medium rounded-lg text-lg"
                                                type="button">
                                                <i class="fa-solid fa-magnifying-glass text-gray-300"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <x-input-label for="country" value="País" />
                                        <x-text-input name="country" id="country" readonly class="w-full border"
                                            value="{{ $country->country_name ?? '' }}" />
                                        <input type="hidden" name="country_code" id="country_code"
                                            value="{{ $user->country_code ?? '' }}">
                                    </div>
                                    <div>
                                        <x-input-label for="state" value="Estado" />
                                        <x-text-input name="state" id="state" readonly class="w-full border"
                                            value="{{ $state->state_name ?? '' }}" />
                                        <input type="hidden" name="state_code" id="state_code"
                                            value="{{ $user->state_code ?? '' }}">
                                    </div>
                                    <div>
                                        <x-input-label for="locality" value="Localidad" />
                                        <x-text-input name="locality" id="locality" readonly class="w-full border"
                                            value="{{ $locality->locality_name ?? '' }}" />
                                        <input type="hidden" name="locality_code" id="locality_code"
                                            value="{{ $user->locality_code ?? '' }}">
                                    </div>
                                    <div>
                                        <x-input-label for="township" value="Municipio" />
                                        <x-text-input name="township" id="township" readonly class="w-full border"
                                            value="{{ $township->township_name ?? '' }}" />
                                        <input type="hidden" name="township_code" id="township_code"
                                            value="{{ $user->township_code ?? '' }}">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                    <div>
                                        <x-input-label for="address" value="Calle" />
                                        <x-text-input name="address" id="address" class="w-full border"
                                            value="{{ $user->address }}" />
                                    </div>
                                    <div>
                                        <x-input-label for="phone" value="Teléfono" />
                                        <x-text-input name="phone" id="phone" class="w-full border"
                                            value="{{ $user->phone }}" />
                                    </div>
                                    <div>
                                        <x-input-label for="logo" value="Logo" />
                                        <x-text-input name="logo" id="logo" type="file"
                                            class="w-full border" value="{{ $user->logo }}" />
                                    </div>
                                    <div class="flex justify-end">
                                        <x-danger-button class="bg-emerald-700" type="submit">
                                            Guardar
                                        </x-danger-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('js/hour_zone.js') }}"></script>
    <script src="{{ asset('js/validate_rfc.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('postal_code').addEventListener('blur', function() {
                const postalCode = this.value;

                if (!postalCode) {
                    Swal.fire({
                        text: 'Por favor ingrese un código postal.'
                    });
                    return;
                }

                // Realiza la solicitud AJAX
                fetch(`{{ route('profile.fetchaddress') }}?postal_code=${postalCode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            // Asigna el estado y el código del estado
                            document.getElementById('state').value = data.state ? data.state
                                .state_name : '';
                            document.getElementById('state_code').value = data.state ? data.state
                                .state_code : ''; // Aquí asignamos el código
                            document.getElementById('country').value = data.country ? data.country
                                .country_name : '';
                            document.getElementById('country_code').value = data.country ? data.country
                                .country_code : ''; // Aquí asignamos el código
                            document.getElementById('township').value = data.township ? data.township
                                .township_name : '';
                            document.getElementById('township_code').value = data.township ? data
                                .township.township_code : ''; // Aquí asignamos el código
                            document.getElementById('locality').value = data.locality ? data.locality
                                .locality_name : '';
                            document.getElementById('locality_code').value = data.locality ? data
                                .locality.locality_code : ''; // Aquí asignamos el código

                            // Actualiza el dropdown de colonias
                            const suburbSelect = document.getElementById('suburb');
                            suburbSelect.innerHTML = data.colony.map(suburb => {
                                return `<option value="${suburb.colony_code}">${suburb.colony_name}</option>`;
                            }).join('');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        function updateColonyName() {
            const selectedColony = document.getElementById('suburb').selectedOptions[0];
            const colonyName = selectedColony ? selectedColony.text : '';
            document.getElementById('colony_name').value = colonyName;
            console.log('Colony selected: ',
                colonyName); // Esto te permitirá verificar si el nombre de la colonia se está actualizando

            document.addEventListener('DOMContentLoaded', function() {
                // Al cargar la página, si no hay selección manual, selecciona automáticamente el primer valor del dropdown
                const suburbSelect = document.getElementById('suburb');
                if (suburbSelect && suburbSelect.options.length > 0 && !suburbSelect.value) {
                    // Establecer el valor de la primera opción si no hay opción seleccionada
                    suburbSelect.selectedIndex = 0;
                    // Llamar a la función para actualizar el nombre de la colonia
                    updateColonyName();
                }
            });

        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Referencia a los enlaces
            const dataGeneralLink = document.getElementById('dataGeneralLink');
            const quickbooksLink = document.getElementById('quickbooksLink');

            // Referencia a los modales
            const modalDataUser = document.getElementById('modalDataUser');
            const modalQuickBooks = document.getElementById('modalQuickBooks');

            // Verifica si los elementos existen antes de agregar los event listeners
            if (dataGeneralLink && quickbooksLink && modalDataUser && modalQuickBooks) {
                // Cuando el enlace de Datos Generales sea clickeado
                dataGeneralLink.addEventListener('click', function(event) {
                    event.preventDefault(); // Previene que se recargue la página
                    modalDataUser.classList.remove('hidden'); // Muestra el modal de Datos Generales
                    modalQuickBooks.classList.add('hidden'); // Oculta el modal de QuickBooks
                });

                // Cuando el enlace de QuickBooks sea clickeado
                quickbooksLink.addEventListener('click', function(event) {
                    event.preventDefault(); // Previene que se recargue la página
                    modalQuickBooks.classList.remove('hidden'); // Muestra el modal de QuickBooks
                    modalDataUser.classList.add('hidden'); // Oculta el modal de Datos Generales
                });
            } else {
                console.error('Algunos elementos no fueron encontrados.');
            }
        });

        document.getElementById('quickbooksLink').addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('modalQuickBooks').classList.remove('hidden');
        });

        document.getElementById('connectQuickBooks').addEventListener('click', function () {
            window.location.href = "{{ route('connect.quickbooks') }}";
        });
    </script>
</x-app-layout>
