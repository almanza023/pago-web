$(document).ready(function() {
    $('#bt_add').click(function() {

        agregar();
        event.preventDefault();
    });
    $('#bt_del').click(function() {
        event.preventDefault();
        eliminar(id_fila_selected);
    });
    $('#bt_delall').click(function() {
        event.preventDefault();
        eliminarTodasFilas();
    });


});
var cont = 0;
var id_fila_selected = [];

function agregar() {

    cont++;
    let nom = $('#nombre_sede').val();
    var fila = '<tr class="selected" id="fila' + cont + '" onclick="seleccionar(this.id);"><td>' + cont + '</td><td>' + nom + '<input type="hidden" name="nombres_sedes[]" value="' + nom + '" /></td></tr>';
    $('#tabla').append(fila);
    reordenar();
    $('#nombre_sede').val('')
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