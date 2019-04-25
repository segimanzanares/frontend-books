
/* global axios */

$(function () {
    var now = new Date();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        endDate: now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate()
    });
    
});
function save(form, callback) {
    var data = {};
    form.serializeArray().forEach(function (item) {
        data[item.name] = item.value;
    });
    axios.post(form.attr('action'), data)
    .then(function (response) {
        if (callback !== void 0) {
            callback();
        }
    })
    .catch(function (error) {
        clearErrors(form);
        if (error.response.status === 400) {
            if (error.response.data.error !== void 0) {
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
            form.find('.alert-danger')
                    .html('<strong>' + error.response.data.error.description + '</strong>')
                    .show();
        }
    });
}
function clearErrors(form) {
    form.find('.alert-danger').hide()
            .parent().find('input,textarea')
            .removeClass('is-invalid')
            .parent().find('.invalid-feedback')
            .html('');
}