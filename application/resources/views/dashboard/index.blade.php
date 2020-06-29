@extends('adminlte::page') @section('title', 'Dashboard')
@section('content_header')
@stop @section('content')
    <div class="container">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card ">
                    <div class="p-2 load-ajax">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $(".load-ajax").load('dashboard');
        });

    </script>
@stop
