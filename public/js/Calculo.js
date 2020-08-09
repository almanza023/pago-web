$(function() {

    $('input[name="daterange"]').daterangepicker({
        opens: 'rigth'
    }, function(start, end, label) {
        $('#inicio').val(start.format('YYYY-MM-DD'));
        $('#final').val(end.format('YYYY-MM-DD'));

    });






    $("#buscar").click(function() {
        buscar();

    });






});

const buscar = () => {
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