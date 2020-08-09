$(function() {
    $('#group-sedes').hide();
    $('form').parsley();
    $("#form_create").submit(function(event) {
        event.preventDefault();
        save();
    });

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        update();
    });
    showEdit();

    $("#sedes").change(function(event) {
        if (event.target.value == 0) {
            $('#group-sedes').hide();
        } else {
            $('#group-sedes').show();
        }
    })
});

//guardar en el form
const save = () => {
    let form = $('#form_create');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {

                success(data.success);
                $('#form_create')[0].reset();
                updateTable();
            } else {
                warning(data.warning);

            }

        },
        error: function(data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}

//actualizar-editform
const update = () => {
    let form = $('#form_edit');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                $('#modalEdit').modal('hide');
                updateTable();
            } else {
                warning(data.warning);
            }

        },
        error: function(data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}


const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let nombre = button.data('nombre');
        let nit = button.data('nit');
        let contacto = button.data('contacto');
        let correo = button.data('correo');
        let direccion = button.data('direccion');
        let telefono = button.data('telefono');
        let municipio_id = button.data('municipio_id');
        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nombre_e').val(nombre);
        modal.find('.modal-body #nit_e').val(nit);
        modal.find('.modal-body #contacto_e').val(contacto);
        modal.find('.modal-body #correo_e').val(correo);
        modal.find('.modal-body #telefono_e').val(telefono);
        modal.find('.modal-body #direccion_e').val(direccion);

        $("#municipio_id_e option[value='" + municipio_id + "']").attr("selected", true);

    });
}

//FUNCION DE ESTADOS
const changeEstado = (url) => {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                updateTable();
            } else {
                warning(data.warning);
            }

        },
    });
}