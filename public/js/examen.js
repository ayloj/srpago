$(function(){
    $("#select_estados").change(function(){
        $.ajax({
            type: 'GET',
            data: {estado:$(this).val()},
            url: '/getmunicipio',
            success: function(respuesta) {
                $('#divSelectMunicipio').empty();
                var select = $('<select name="estado" id="select_municipios">').appendTo('#divSelectMunicipio');
                $(respuesta.municipios).each(function() {
                    select.append($("<option>").attr('value',this.municipio).text(this.municipio));
                });
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        });
    });

    $("#form_map").submit(function(e){
        e.preventDefault();
        var estado = $("#select_estados").val();
        var munic = $("#select_municipios").val();
        var orden = $("#ordenamiento").val();
        var complementUrl = '';

        if(estado != null || estado != undefined){
            complementUrl += '/estado/'+estado
        }
        if(munic != null || munic != undefined){
            complementUrl += '/municipio/'+munic
        }
        if(orden){
            //complementUrl += '/precio/'+orden
        }

        $.ajax({
            type: 'GET',
            url: 'http://srpago.tech/api/costogasolina'+complementUrl,
            success: function(respuesta) {
                var dataTable = respuesta.data;
                makeTable(dataTable);
            },
            error: function() {
                console.log("error");
            }
        });
    });

    function makeTable(data) {
        var table = '';
        $.each(data, function( k, v ) {
            $('#tableBody').append("<tr> <td>"+v.estado+"</td> <td>"+v.municipio+"</td> <td>"+v.regular+"</td> <td>"+v.premium+"</td> <td>"+v.dieasel+"</td> </tr>");
        });
    }

});



