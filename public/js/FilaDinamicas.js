$(document).ready(function() {
    $('#bt_add').click(function() {
        if ($('#jornada_id').val() > 0 && $('#menu_id').val() > 0 && $('#dia').val() > 0) {
            agregar();
        }
    });
    $('#bt_del').click(function() {
        eliminar(id_fila_selected);
    });
    $('#bt_delall').click(function() {
        eliminarTodasFilas();
    });


});
var cont = 0;
var id_fila_selected = [];
var array_dias = [];

function agregar() {

    cont++;
    var dia_id = $('#dia').val();
    var dia = $('#dia option:selected').text();
    var menu = $('#menu_id option:selected').text();

    var menu_id = $('#menu_id').val();
    var fila = '<tr class="selected" id="fila' + cont + '" onclick="seleccionar(this.id);"><td>' + cont + '</td><td>' + dia + '<input type="hidden" name="dia[]" value="' + dia_id + '" /></td></td><td> M-' + menu + '<input type="hidden" name="menu_id[]" value="' + menu_id + '" /></td></tr>';
    $('#tabla').append(fila);
    array_dias[cont] = dia_id;
    reordenar();
}

function seleccionar(id_fila) {
    if ($('#' + id_fila).hasClass('seleccionada')) {
        $('#' + id_fila).removeClass('seleccionada');
    } else {
        $('#' + id_fila).addClass('seleccionada');
    }
    //2702id_fila_selected=id_fila;
    id_fila_selected.push(id_fila);
}

function eliminar(id_fila) {
    /*$('#'+id_fila).remove();
    reordenar();*/
    for (var i = 0; i < id_fila.length; i++) {
        $('#' + id_fila[i]).remove();
    }
    reordenar();
}

function reordenar() {
    var num = 1;
    $('#tabla tbody tr').each(function() {
        $(this).find('td').eq(0).text(num);
        num++;
    });
}

function eliminarTodasFilas() {
    $('#tabla tbody tr').each(function() {
        $(this).remove();
    });

}