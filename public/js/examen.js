$(function(){
    $("#select_estados").change(function(){
        $.ajax({
            type: 'GET',
            data: {estado:$(this).val()},
            url: '/getmunicipio',
            success: function(respuesta) {
                $('#divSelectMunicipio').empty();
                var select = $('<select name="estado" id="select_municipios"> <option> -Seleccione- </option>').appendTo('#divSelectMunicipio');
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
        if(munic){
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
                initMap(dataTable);
            },
            error: function() {
                console.log("error");
                errorRow();
            }
        });
    });

    function makeTable(data) {
        $('#tableBody').empty();
        $.each(data, function( k, v ) {
            $('#tableBody').append("<tr> <td>"+v.estado+"</td> <td>"+v.municipio+"</td> <td>"+v.regular+"</td> <td>"+v.premium+"</td> <td>"+v.dieasel+"</td> </tr>");
        });
    }


    function errorRow() {
        $('#tableBody').empty();
        $('#tableBody').append("<tr> <td colspan='5'> No se ha podido obtener la información </td> </tr>");
    }

    function initMap(data) {
        var myLatLng = {lat: 20.71413, lng: -103.3042};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: myLatLng
        });

        bounds  = new google.maps.LatLngBounds();

        $.each(data, function(k, v){
            myLatLng = {lat: parseFloat(v.latitude), lng: parseFloat(v.longitude)};
            var marker = new google.maps.Marker({
                position: {lat: parseFloat(v.latitude), lng: parseFloat(v.longitude)},
                map: map,
                info: v.razonsocial
            });
            loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
            bounds.extend(loc);
        });
        map.fitBounds(bounds);
        map.panToBounds(bounds);
    }


});



