// Función para abrir el modal de cotización
// function openModal(section) {
//     const checkboxes = document.querySelectorAll(`.checkbox-${section}`);
//     const cantidadInputs = document.querySelectorAll(`.cantidad-${section}`);
//     const modal = document.getElementById('modal');
//     const cotizacionResumen = document.getElementById('cotizacion-resumen');
//     const cotizacionTotal = document.getElementById('cotizacion-total');

//     cotizacionResumen.innerHTML = '';
//     let total = 0;

//     checkboxes.forEach((checkbox, index) => {
//         if (checkbox.checked) {
//             const cantidad = parseInt(cantidadInputs[index].value);
//             const texto = checkbox.parentNode.textContent.trim();
//             const precio = parseFloat(texto.split('$')[1].replace(',', ''));
//             const subtotal = cantidad * precio;

//             cotizacionResumen.innerHTML += `${cantidad} x ${texto} = $${subtotal.toFixed(2)}<br>`;
//             total += subtotal;
//         }
//     });

//     cotizacionTotal.textContent = `Total: $${total.toFixed(2)}`;
//     modal.style.display = 'block';
// }
function openModal() {
    try {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const cantidadInputs = document.querySelectorAll('.cantidad-tarifas, .cantidad-insumos, .cantidad-medicamentos, .cantidad-no-tarifa');
        const modal = document.getElementById('modal');
        const cotizacionResumen = document.getElementById('cotizacion-resumen');
        const cotizacionTotal = document.getElementById('cotizacion-total');

        cotizacionResumen.innerHTML = '';
        let total = 0;

        checkboxes.forEach((checkbox, index) => {
            if (checkbox.checked) {
                const cantidad = parseInt(cantidadInputs[index].value);
                const texto = checkbox.parentNode.textContent.trim();
                const precioArray = texto.split('$');
                if (precioArray.length >= 2) {
                    const precio = parseFloat(precioArray[1].replace(/[^0-9.,]/g, '').replace(',', '.'));
                    const subtotal = cantidad * precio;

                    cotizacionResumen.innerHTML += `${cantidad} x ${texto} = $${subtotal.toFixed(2)}<br>`;
                    total += subtotal;
                }
            }
        });

        cotizacionTotal.textContent = `Total: $${total.toFixed(2)}`;
        modal.style.display = 'block';
    } catch (error) {
        console.error('Error:', error);
        alert('Ocurrió un error. Por favor, revisa la consola para más detalles.');
    }
}









// Función para cerrar el modal de cotización
function closeModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
}

// Función para regresar a la pantalla de inicio
function goBack() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
    });
    closeModal();
}

// Función para generar el documento PDF (requiere implementación adicional)
function generatePDF() {
    // Implementa la generación del PDF aquí
    // Puedes utilizar bibliotecas como jsPDF o pdfmake para crear el PDF
}
