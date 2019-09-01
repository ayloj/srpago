@extends('layouts.app')
@section('content')


    <form action="" method="post" role="form" class="contactForm">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="row">
            <div class="span3 form-group">
                <select name="estado" id="select_estados">
                    @foreach($estados as $estado)
                        <option value="{{ $estado['estado'] }}">{{ $estado['estado'] }}</option>
                    @endforeach
                </select>
                <div class="validation"></div>
            </div>

            <div class="span3 form-group" id="selectMunicipio">
                <select name="estado" id="tmp_select_municipios">
                        <option value="">-Seleccione estado-</option>
                </select>
                <div class="validation"></div>
            </div>
            <div class="span3 form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Ordenamiento" data-rule="minlen:4"
                       data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
            </div>
            <div class="span3 form-group">
                <div class="validation"></div>
                <div class="text-center">
                    <button class="btn btn-color btn-rounded" type="submit">Send message</button>
                </div>
            </div>
        </div>
    </form>


@endsection
