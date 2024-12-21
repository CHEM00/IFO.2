// Listener para el evento de cambio del régimen fiscal
document.getElementById('tax_regime').addEventListener('change', function() {
    var rfc = document.getElementById('rfc').value.trim().toUpperCase();
    var resultado = document.getElementById('resultado');
    var taxRegime = this;  // El select del régimen fiscal
    var tipoPersona = taxRegime.options[taxRegime.selectedIndex].dataset.tipoPersona; // 'física' o 'moral'
    
    // Verificamos si el régimen fiscal seleccionado permite el tipo de persona
    var esValido = rfcValido(rfc, tipoPersona, taxRegime);
    
    // Mostramos el resultado de la validación
    if (esValido) {
        resultado.classList.add("ok");
        resultado.innerText = "RFC válido";
    } else {
        resultado.classList.remove("ok");
        resultado.innerText = "RFC no válido para este régimen fiscal";
    }
});

// Listener para el evento de entrada de texto en el campo RFC
document.getElementById('rfc').addEventListener('input', function() {
    var rfc = this.value.trim().toUpperCase();
    var resultado = document.getElementById('resultado');
    var taxRegime = document.getElementById('tax_regime'); // Obtener el régimen fiscal seleccionado
    var tipoPersona = taxRegime.options[taxRegime.selectedIndex].dataset.tipoPersona; // 'física' o 'moral'

    // Llamamos a la función de validación con el RFC y el tipo de persona
    var rfcCorrecto = rfcValido(rfc, tipoPersona, taxRegime);

    // Mostramos el resultado de la validación
    if (rfcCorrecto) {
        resultado.classList.add("ok");
        resultado.innerText = "RFC válido";
    } else {
        resultado.classList.remove("ok");
        resultado.innerText = "RFC no válido para este régimen fiscal";
    }
});

// Función de validación del RFC según el régimen fiscal
function rfcValido(rfc, tipoPersona, taxRegimeElement) {
    const re =
        /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    
    var validado = rfc.match(re);
    if (!validado) return false;

    const digitoVerificador = validado.pop(),
        rfcSinDigito = validado.slice(1).join(''),
        len = rfcSinDigito.length;

    const diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
        indice = len + 1;
    var suma, digitoEsperado;

    if (len == 12) suma = 0;
    else suma = 481;

    for (var i = 0; i < len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);

    digitoEsperado = 11 - suma % 11;
    if (digitoEsperado == 11) digitoEsperado = 0;
    else if (digitoEsperado == 10) digitoEsperado = "A";

    // Verificamos si el RFC tiene el dígito verificador correcto
    if (digitoVerificador != digitoEsperado) return false;

    // Verificación del tipo de persona con el régimen fiscal
    const regimeData = taxRegimeElement.options[taxRegimeElement.selectedIndex].dataset;
    const allowsPhysical = regimeData.physical_person === 'Sí';
    const allowsMoral = regimeData.moral_person === 'Sí';

    if (tipoPersona === 'física' && !allowsPhysical) return false;
    if (tipoPersona === 'moral' && !allowsMoral) return false;

    // Verificamos que el RFC corresponda al tipo de persona permitido
    if (tipoPersona === 'física' && len !== 12) return false;
    if (tipoPersona === 'moral' && len !== 13) return false;

    return true;
}
