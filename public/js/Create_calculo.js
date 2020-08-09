$(function() {

    $('input[name="daterange"]').daterangepicker({
        opens: 'rigth'
    }, function(start, end, label) {
        $('#inicio').val(start.format('YYYY-MM-DD'));
        $('#final').val(end.format('YYYY-MM-DD'));

    });
    selectMenu();

    $("#form_create").submit(function(event) {
        event.preventDefault();
        swal({
            title: 'Confirmación',
            text: "¿Está seguro de guardar la información ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger m-l-10',
            buttonsStyling: false
        }).then(function() {
            save();
        }, function(dismiss) {

        })
    });

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        update();
    });


    $("#buscar").click(function() {
        if ($('#jornada_id').val() > 0 && $('#menu_id').val() > 0 && $('#dia').val() > 0) {
            filtro();
        } else {
            warning("Debe seleccionar una opcion en los campos del formulario");
        }

    });

    $("#cerrar").click(function() {
        $('#resultado').hide();
    });





});

const selectMenu = () => {

    $("#jornada_id").change(function(event) {
        $('#jor_id').val(event.target.value);

        if (event.target.value > 0) {
            $("#menu_id").empty();
            $.get("../menus/select/" + event.target.value, function(response, menu_id) {
                for (i = 0; i < response.length; i++) {
                    $("#menu_id").append("<option value='" + response[i].menu_id + "'>" + response[i].codigo + "</option>");
                }
            })
        } else {
            warning("Debe Seleccionar Una Jornada");
        }


    })
}

//guardar en el form
const filtro = () => {
    let form = $('#form_buscar');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#resultado').show();
            $('#resultado').html(data);

        }
    });

}

//registrar
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
        dataType: 'html',
        success: function(data) {

            if (data) {

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