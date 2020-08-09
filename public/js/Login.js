$(function() {
    $("#formlogin").submit(function(event) {

        event.preventDefault();
        login();
    });
});

const login = () => {
    let form = $('#formlogin');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {
            if (data.success) {

                swal({
                    title: 'BIENVENIDO AL SISTEMA',
                    text: data.success,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger m-l-10'

                })
                setTimeout(function() {
                    window.location.href = "home";
                }, 3000)

            } else {
                swal({
                    title: '',
                    text: data.warning,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger m-l-10'

                })
            }
        },
        error: function(data) {
            if (data.status === 422) {


            }
        }
    });

}