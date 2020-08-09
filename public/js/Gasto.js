$(function() {

    $('form').parsley();
    formCreate();

    $("#form_edit").submit(function(event) {
        event.preventDefault();
        update();
    });
    showEdit();
    modalShow();
    valideFomat();

});

const formCreate = () => {
    $('#form_create').on('submit', function(e) {
        e.preventDefault();

        let form = $('#form_create');
        let formData = new FormData(this);
        formData.append('_token', $('input[name=_token]').val());
        save(form, formData);

    });
}

//guardar en el form
const save = (form, formData) => {
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
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


const showEdit = () => {
    $('#modalEdit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id');
        let con = button.data('concepto');
        let val = button.data('valor');
        let fecha = button.data('fecha');

        let modal = $(this);

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #concepto_e').val(con);
        modal.find('.modal-body #valor_e').val(val);
        modal.find('.modal-body #fecha_e').val(fecha);


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

//validar formatos
const valideFomat = () => {
    $("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            swal({
                title: 'SIPRÉS',
                text: "Seleccione una Imagén con formato válido (JPG PNG)",
                type: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#38d5f7',
                cancelButtonColor: '#2ad184',
                confirmButtonText: '<i class="zmdi zmdi-run"></i> Aceptar',
                cancelButtonText: '<i class="zmdi zmdi-run"></i> Aceptar'
            }).then(function() {

            });
            $("#file").val('');
            return false;
        }
    });
}