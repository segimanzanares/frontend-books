
/* global axios */

$(function () {
    var now = new Date();
    // Inicializar selectores de fechas
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        endDate: now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate()
    });
    
});
function save(form, callback) {
    var data = {};
    // Armar objecto con los datos del formulario
    form.serializeArray().forEach(function (item) {
        data[item.name] = item.value;
    });
    // Enviar petición al servidor para crear un nuevo registro
    axios.post(form.attr('action'), data)
    // Si la respuesta fue exitosa, ejecutar la función callback
    .then(function (response) {
        if (callback !== void 0) {
            callback();
        }
    })
    // Si ocurrió un error, mostrar errores en el formulario
    .catch(function (error) {
        // Limpiar errores en el formulario
        clearErrors(form);
        // Si es un error de validación de datos
        if (error.response.status === 400) {
            if (error.response.data.error !== void 0) {
                // Mostrar errores en el formulario
                for (var key in error.response.data.error.fields) {
                    if (error.response.data.error.fields.hasOwnProperty(key)) {
                        form.find('input[name=' + key + ']')
                                .addClass('is-invalid')
                                .parent().find('.invalid-feedback')
                                .append('<strong>' + error.response.data.error.fields[key][0] + '</strong>');
                    }
                }
                form.find('.alert-danger')
                        .html('<strong>Algunos datos son incorrectos.</strong>')
                        .show();
            }
        } else {
            // Si es otro tipo de error, mostrar mensaje en el form
            form.find('.alert-danger')
                    .html('<strong>' + error.response.data.error.description + '</strong>')
                    .show();
        }
    });
}
function clearErrors(form) {
    // Limpiar errores de los componentes del formulario
    form.find('.alert-danger').hide()
            .parent().find('input,textarea')
            .removeClass('is-invalid')
            .parent().find('.invalid-feedback')
            .html('');
}