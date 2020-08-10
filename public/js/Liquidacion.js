$(function() {

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
    modalShow();
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
                $("#modalCreate").modal('hide'); //ocultamos el modal

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
                $("#modalEdit").modal('hide'); //ocultamos el modal
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
        let base = button.data('base');
        let user = button.data('user');

        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #base_e').val(base);
        $("#user_id_e option[value='" + user + "']").attr("selected", true);

    });
}

//Modal dinamica
const modalShow = () => {
    $('#modalDetalles').on('show.bs.modal', function(event) {

        let button = $(event.relatedTarget)
        let url = button.data('href')

        let modal = $(this)

        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                modal.find('.modal-body').html(data);

            }
        });
    });

    $('#modalShow').on('hide.bs.modal', function(e) {
        $(this).find('.modal-body').html("");
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