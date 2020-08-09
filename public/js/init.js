$(function() {
    ajaxHeader();



})





const ajaxHeader = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

}

function disableEnterKey(e) {
    let key;
    if (window.event) {
        key = window.event.keyCode; //IE
    } else {
        key = e.which; //firefox
    }
    if (key == 13) {
        return false;
    } else {
        return true;
    }
}


/*mensaje de guardado*/
const success = (mensaje) => {

    swal({
        title: '',
        text: `${mensaje}`,
        type: 'success',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary'

    })


}

/*mensaje de error*/
const warning = (mensaje) => {
    swal({
        title: '',
        text: `${mensaje}`,
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger m-l-10'

    })
}

const error = (mensaje) => {
    swal({
        title: '',
        text: `${mensaje}`,
        type: 'error',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger m-l-10'

    })
}


const addErrorMessage = (errors) => {
    let messages = "";
    $.each(errors, function(key, value) {

        if ($.isPlainObject(value)) {
            $.each(value, function(key, value) {
                messages = messages + "<li><span class='font-bold text-danger'>" + value + "</span></li><br/>";
            });
        }
    });
    showErrorMessage(messages);
}


const showErrorMessage = (messages) => {
    swal({
        title: '<strong>Error: Datos Incorrectos</strong>!',
        type: 'warning',
        html: messages,
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger m-l-10',
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
        cancelButtonText: '<i class="fa fa-thumbs-down"></i>'
    })

}

/*recarga-actualizar tbla*/
const updateTable = () => {
    let form = $('#form_hidden');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        success: function(data) {
            if (data.warning) {
                warning(data.warning);
            } else {
                $('#datatable').html("");
                $('#datatable').html(data);
                //dataTableInit();

            }
        }
    });
}