$(function() {

    $("#btn-salir").click(function(event) {
        event.preventDefault();
        swal({
            title: 'Cerrar Sesión',
            text: "¿Está seguro de salir del Sistema ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
            confirmButtonClass: 'btn btn-primary m-l-10',
            cancelButtonClass: 'btn btn-danger m-l-10',
            buttonsStyling: false
        }).then(function() {
            $('#logout-form').submit();
        }, function(dismiss) {

        })



    });




});