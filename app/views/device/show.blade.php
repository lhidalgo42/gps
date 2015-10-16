@extends('layouts.master')

@section('content')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            @include('navs.top')
        </nav>


        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dispositivos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="col-xd-12 sombra" style="margin-bottom: 30px;">
                        <div style="padding: 10px;">
                            <h4>En caso de robo, presione este botón</h4>
                            <button class="btn-danger btn pull-right" id="stole">Mi Vehiculo fue robado</button>
                            <p>Marque esta opción si sospecha que su vehiculo fue robado. La unidad de GPS Rastrearea su
                                auto y lo detendra, impidiendo que el auto continue avanzando.</p>

                        </div>
                    </div>
                    <div class="col-xd-12 sombra">
                        <div style="padding: 10px;">
                            <h4>Ejecutar una Prueba</h4>

                            <p>Ejecutar una prueba rapida para ver como funciona. Tenga en cuenta que se detendra el
                                suministro de bencina, no se recomienda estar conduciendo.</p>
                            <button class="btn-primary btn" id="test">Ejecutar una prueba</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="map" id="map"></div>
                </div>
            </div>
            <script>
                var map;
                @if($data)
                $(document).ready(function () {
                            map = new GMaps({
                                div: '#map',
                                lat: {{$data->latitude}},
                                lng: {{$data->longitude}}


                            });
                            map.addMarker({
                                lat: {{$data->latitude}},
                                lng: {{$data->longitude}},
                                title: '{{$device->plate}}'
                            });
                        });
                @endif
                $("#stole").click(function () {
                    $.ajax({
                        url: "/gps/data/send/stole",
                        data: {
                            device:{{$device->id}}
                        },
                        type: "POST",
                        success: function (data) {
                            swal(data.text, data.msg, data.type)
                        }
                    });
                });
                $("#test").click(function () {
                    $.ajax({
                        url: "/gps/data/send/test",
                        data: {
                            device:{{$device->id}}
                        },
                        type: "POST",
                        success: function (data) {
                            swal(data.text, data.msg, data.type)
                        }
                    });
                });
            </script>

        </div>
        <!-- /#page-wrapper -->

        {{$user}}


    </div>


@stop
