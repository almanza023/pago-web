$('#numcd1').hide();
$('#numcd2').hide();

function cargar1() {
    var des1 = $('#descontar').val();
    if (des1 == 1) {
        $('#numcd1').show();
    } else {
        $('#numcd1').hide();
    }
}

function cargar2() {
    var des2 = $('#descontar2').val();
    if (des2 == 1) {
        $('#numcd2').show();
    } else {
        $('#numcd2').hide();
    }
}

$('#calcular1').click(function() {
    var ct = $('#numero_ct1').val();
    var fp = $('#forma_pago1').val();
    var mon = $('#monto1').val();
    var int = $('#interes1').val();
    var des = $('#descontar').val();
    var dnc1 = $('#numcd1').val();

    if ($.trim(mon).length > 0 && $.trim(int) > 0 && $.trim(fp) > 0 && $.trim(des) > 0 && $.trim(ct) > 0) {
        var i = null,
            p = null,
            a = null,
            b1 = null,
            b2 = null,
            tot = null,
            cd = null,
            vint = null,
            mp = null,
            desc = null,
            vent = null;
        var d = "";
        var nc = "";
        if (fp == 1) {
            d = ct;
            nc = d;
            i = parseFloat($('#interes1').val());
            p = parseFloat($('#monto1').val());
            a = i * (1 + i);
            b1 = Math.pow(a, 1);
            b2 = (Math.pow((1 + i), 1)) - 1;
            tot = parseInt(p * (b1 / b2));
            cd = parseInt(tot / d);
            vint = parseInt(tot - p);
            mp = parseInt(d * cd);
            if (des == 2) {
                desc = 0;
            } else if (des == 1) {
                desc = (dnc1 * cd)
            }
            vent = p - desc;

        } else if (fp == 2) {
            d = ct;
            i = parseFloat($('#interes1').val());
            p = parseFloat($('#monto1').val());
            a = i * (1 + i);
            b1 = Math.pow(a, 1);
            b2 = (Math.pow((1 + i), 1)) - 1;
            tot = parseInt(p * (b1 / b2));
            cd = parseInt((tot / d) * 5);
            vint = parseInt(tot - p);
            if (ct == 30) {
                mp = parseInt(6 * cd);
                nc = 6;
            } else {
                mp = parseInt(8 * cd);
                nc = 8;
            }
            if (des == 2) {
                desc = 0;
                vent = p;
            } else {
                desc = 2 * cd;
                vent = p - desc;
            }


        }


        $('#valor_c1').val(cd)
        $('#v_interes1').val(vint)
        $('#monto_pago1').val(mp)
        $('#v_descuento1').val(desc)
        $('#v_entrega1').val(vent)
        $('#numero_cuotas').val(nc)

    } else {
        toastr.error('Campo Monto, Interes y N° Cuotas es Obligatorio', 'Alerta', {
            "positionClass": "toast-top-right",
            timeOut: 3000,
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false

        });
    }
});

$('#calcular2').click(function() {
    var fp = $('#numero_ct2').val();
    var mon = $('#monto2').val();
    var int = $('#interes2').val();
    var vct = $('#valor_c2').val();
    var des = $('#descontar2').val();
    var dnc2 = $('#numcd2').val();

    if ($.trim(mon).length > 0 && $.trim(int) > 0 && $.trim(vct) > 0 && $.trim(des) > 0) {

        var i = parseFloat($('#interes2').val());
        var m = parseFloat($('#monto2').val());
        var valc = parseFloat($('#valor_c2').val());
        var vali = parseFloat(mon * i);
        var mp = m + vali;
        var nct = parseFloat(mp / valc);
        var desc = 0;
        if (des == 1) {
            desc = (dnc2 * valc);
        } else if (des == 2) {
            desc = 0;
        }

        var vent = m - desc;



        $('#v_interes2').val(vali)
        $('#numero_ct2').val(nct)
        $('#v_descuento2').val(desc)
        $('#v_entrega2').val(vent)
        $('#monto_pago2').val(mp)
    } else {
        toastr.error('Campo Monto, Interes y N° Cuotas es Obligatorio', 'Alerta', {
            "positionClass": "toast-top-right",
            timeOut: 3000,
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false

        });
    }
});