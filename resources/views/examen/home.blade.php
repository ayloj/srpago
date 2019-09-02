@extends('layouts.app')
@section('content')


    <form action="" id="form_map" method="post" role="form" class="contactForm">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="row">
            <div class="span3 form-group">
                <select name="estado" id="select_estados">
                    <option>-Seleccione estado-</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado['estado'] }}">{{ $estado['estado'] }}</option>
                    @endforeach
                </select>
                <div class="validation"></div>
            </div>

            <div class="span3 form-group" id="divSelectMunicipio">
                <select name="municipio" id="tmp_select_municipios">
                        <option value="">-Seleccione municipio-</option>
                </select>
                <div class="validation"></div>
            </div>
            <div class="span3 form-group">
                <select name="ordenamiento" id="ordenamiento">
                    <option value="">-Orden del precio-</option>
                    <option value="0">-Ascendente-</option>
                    <option value="1">-Descendente-</option>
                </select>
                <div class="validation"></div>
            </div>
            <div class="span3 form-group">
                <div class="validation"></div>
                <div class="text-center">
                    <button class="btn btn-color btn-rounded" type="submit">Consultar precio de Gasolina</button>
                </div>
            </div>
        </div>
    </form>


@endsection
