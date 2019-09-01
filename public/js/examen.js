$(function(){
    $("#select_estados").change(function(){
        console.log($(this).val());
        $.ajax({
            type: 'GET',
            data: {estado:$(this).val()},
            url: '/getmunicipio',
            success: function(respuesta) {
                console.log(respuesta);
                $('#tmp_select_municipios').remove();
                var select = $('<select name="estado" id="select_municipios">').appendTo('#selectMunicipio');
                $(respuesta.municipios).each(function() {
                    select.append($("<option>").attr('value',this.municipio).text(this.municipio));
                });
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        });
    });
});



