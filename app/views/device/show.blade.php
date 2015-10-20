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
                    <div class="col-xd-12 sombra" style="margin-bottom: 30px;display:block;">
                        <div style="padding: 10px;">
                            <h4>En caso de robo, presione este botón</h4>
                            <button class="btn-danger btn pull-right" id="stole">Mi Vehiculo fue robado</button>
                            <p>Marque esta opción si su vehiculo fué robado. Se interrumpirá el suministro de combustible lo cual detendrá el vehículo instantaneamente, impidiendo que continue avanzando.</p>
                            <span class="pull-right" style="display: none;" id="spin-stole"><i class="fa fa-spinner fa-pulse fa-2x"></i></span>
                        </div>
                    </div>
                    <div class="col-xd-12 sombra" style="margin-bottom: 30px;display:none;">
                        <div style="padding: 10px;">
                            <h4>En caso de robo, presione este botón</h4>
                            <button class="btn-success btn pull-right" id="getitback">Lo He Recuperado</button>
                            <p>Marque esta opción si sospecha que su vehiculo fue robado. La unidad de GPS Rastrearea su
                                auto y lo detendra, impidiendo que el auto continue avanzando.</p>
                            <span class="pull-right" style="display: none;" id="spin-getitback"><i class="fa fa-spinner fa-pulse fa-2x"></i></span>
                        </div>
                    </div>
                    <div class="col-xd-12 sombra">
                        <div style="padding: 10px;">
                            <h4>Ejecutar una Prueba</h4>

                            <p>Se realizará una conexion de prueba con el vehiculo, lo cual producirá la activación y desactivación de la alarma, no se recomienda estar conduciendo.</p>
                            <button class="btn-primary btn" id="test">Ejecutar una prueba</button>
                            <span class="pull-right" style="display: none;" id="spin-test"><i class="fa fa-spinner fa-pulse fa-2x"></i></span>
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
                  $(this).addClass('disabled');
                    $.ajax({
                        url: "/gps/data/send/stole",
                        data: {
                            device:{{$device->id}}
                        },
                        type: "POST",
                        beforeSend:function(){
                            $("#spin-stole").addClass('fadein-1');
                            setTimeout(function(){
                                $("#spin-stole").css('display','block');
                            },1000);
                        },
                        error: function (error) {
                            console.log(error);
                            $("#spin-stole").addClass('fadeout-1');
                            setTimeout(function(){
                                $("#spin-stole").css('display','none');
                            },1000);
                            $("#stole").removeClass('disabled');
                            swal('Error', 'Ooops Ha ocurrido un error inesperado.', 'error');
                        },
                        success: function (data) {
                            $("#spin-stole").addClass('fadeout-1');
                            setTimeout(function(){
                                $("#spin-stole").css('display','none');
                            },1000);
                            data = JSON.parse(data);
                            swal(data.text, data.msg, data.status);
                            $("#stole").removeClass('disabled');
                            if(data.status == 'success')
                            {
                                $("#stole").parent().parent().addClass('fadeout-1');
                                setTimeout(function() {
                                    $("#stole").parent().parent().css('display','none');
                                    $("#getitback").parent().parent().addClass('fadein-1');
                                    setTimeout(function(){
                                        $("#getitback").parent().parent().css('display','block');
                                    },1000);
                                },1000);
                            }
                        }
                    });
                });
                $("#getitback").click(function () {
                    $.ajax({
                        url: "/gps/data/send/getitback",
                        data: {
                            device:{{$device->id}}
                        },
                        type: "POST",
                        beforeSend:function(){
                            $("#spin-getitback").addClass('fadein-1');
                            setTimeout(function(){
                                $("#spin-getitback").css('display','block');
                            },1000);
                        },
                        success: function (data) {
                            $("#spin-getitback").addClass('fadeout-1');
                            setTimeout(function(){
                                $("#spin-getitback").css('display','none');
                            },1000);
                            swal(data.text, data.msg, data.status);
                        }
                    });
                });
                $("#test").click(function () {
                    $(this).addClass('disabled');
                    $.ajax({
                        url: "/gps/data/send/test",
                        data: {
                            device:{{$device->id}}
                        },
                        type: "POST",
                        beforeSend:function(){
                            $("#spin-test").addClass('fadein-1');
                            setTimeout(function(){
                                $("#spin-test").css('display','block');
                            },1000);
                        },
                        error: function (error) {
                            console.log(error);
                            $("#spin-test").addClass('fadeout-1');
                            setTimeout(function(){
                                $("#spin-test").css('display','none');
                            },1000);
                            $("#test").removeClass('disabled');
                            swal('Error', 'Ooops Ha ocurrido un error inesperado.', 'error');
                        },
                        success: function (data) {
                            $("#spin-test").addClass('fadeout-1');
                            setTimeout(function(){
                                $("#spin-test").css('display','none');
                            },1000);
                            $("#test").removeClass('disabled');
                            data = JSON.parse(data);
                            swal(data.text, data.msg, data.status);
                        }
                    });
                });
            </script>

        </div>
        <!-- /#page-wrapper -->


    </div>


@stop
