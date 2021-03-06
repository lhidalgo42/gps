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

                    <div class="col-xd-12 sombra" style="margin-bottom: 10px; @if($status->name == 'Activo' || $status->name == 'Check' || $status->name == 'Alerta') display:block; @else display:none; @endif">
                        <div style="padding: 10px">
                            <button class="btn-danger btn pull-right" id="stole">Mi Vehiculo fue robado</button>
                            <h4>En caso de robo, presione este botón</h4>
                            <p>Marque esta opción si su vehiculo fué robado. Se interrumpirá el suministro de
                                combustible lo cual detendrá el vehículo instantaneamente, impidiendo que continue
                                avanzando.</p>
                            <span style="display: none;float: right;margin-top: -25px;" id="spin-stole" class="animated"><i class="fa fa-spinner fa-pulse fa-2x"></i></span>
                        </div>
                    </div>

                    <div class="col-xd-12 sombra" style="margin-bottom: 10px;@if($status->name == 'Robado') display:none; @else display:block; @endif">
                        <div style="padding: 10px">
                            <button class="btn-success btn pull-right" id="getitback">Lo He Recuperado</button>
                            <h4>En caso de recuperar su vehiculo, presione este botón</h4>
                            <p>Marque esta opción para reestablecer el suministro de compustible.</p>
                            <span style="display: none;float: right;margin-top: -25px;" id="spin-getitback" class="animated"><i class="fa fa-spinner fa-pulse fa-2x"></i></span>
                        </div>
                    </div>

                    <div class="col-xd-12 sombra" style="margin-bottom: 10px;">
                        <div style="padding: 10px">
                            <button class="btn-primary btn pull-right" id="test">Ejecutar una prueba</button>
                            <h4>Ejecutar una prueba</h4>
                            <p>Se realizará una conexion de prueba con el vehiculo, lo cual producirá la activación y
                                desactivación de la alarma, no se recomienda estar conduciendo.</p>
                            <span style="display: none;float: right;margin-top: -25px;" id="spin-test" class="animated"><i class="fa fa-spinner fa-pulse fa-2x"></i></span>
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


                
                $("#getitback").click(function () {
                            $(this).addClass('disabled');
                            $.ajax({
                                url: "/gps/data/send/getitback",
                                data: {
                                    device:{{$device->id}}

                                },
                                type: "POST",
                                beforeSend: function () {
                                    $("#spin-getitback").addClass('zoomIn').removeClass('zoomOut');
                                    setTimeout(function () {
                                        $("#spin-getitback").css('display', 'block');
                                    }, 1000);
                                },
                                error: function (error) {
                                    console.log(error);
                                    $("#spin-getitback").addClass('zoomOut').removeClass('zoomIn');
                                    setTimeout(function () {
                                        $("#spin-getitback").css('display', 'none');
                                    }, 1000);
                                    $("#getitback").removeClass('disabled');
                                    swal('Error', 'Ooops. Ha ocurrido un error inesperado.', 'error');
                                },
                                success: function (data) {
                                    $("#spin-getitback").addClass('zoomOut').removeClass('zoomIn');
                                    setTimeout(function () {
                                        $("#spin-getitback").css('display', 'none');
                                    }, 1000);
                                    data = JSON.parse(data);
                                    swal(data.text, data.msg, data.status);
                                    $("#getitback").removeClass('disabled');
                                    if (data.status == 'success') {
                                        $("#getitback").parent().parent().addClass('zoomOut').removeClass('zoomIn');
                                        setTimeout(function () {
                                            $("#getitback").parent().parent().addClass('zoomIn').removeClass('zoomOut');
                                            $("#getitback").parent().parent().css('display', 'none');
                                            setTimeout(function () {
                                                $("#getitback").parent().parent().css('display', 'block');
                                            }, 1000);
                                        }, 1000);
                                    }
                                }
                            });
                        });
                $("#stole").click(function () {
                    $(this).addClass('disabled');
                    $.ajax({
                        url: "/gps/data/send/stole",
                        data: {
                            device:{{$device->id}}

                                },
                        type: "POST",
                        beforeSend: function () {
                            $("#spin-stole").addClass('zoomIn').removeClass('zoomOut');
                            setTimeout(function () {
                                $("#spin-stole").css('display', 'block');
                            }, 1000);
                        },
                        error: function (error) {
                            console.log(error);
                            $("#spin-stole").addClass('zoomOut').removeClass('zoomIn');
                            setTimeout(function () {
                                $("#spin-stole").css('display', 'none');
                            }, 1000);
                            $("#stole").removeClass('disabled');
                            swal('Error', 'Ooops. Ha ocurrido un error inesperado.', 'error');
                        },
                        success: function (data) {
                            $("#spin-stole").addClass('zoomOut').removeClass('zoomIn');
                            setTimeout(function () {
                                $("#spin-stole").css('display', 'none');
                            }, 1000);
                            data = JSON.parse(data);
                            swal(data.text, data.msg, data.status);
                            $("#stole").removeClass('disabled');
                            if (data.status == 'success') {
                                $("#stole").parent().parent().addClass('zoomOut').removeClass('zoomIn');
                                setTimeout(function () {
                                    $("#getitback").parent().parent().addClass('zoomIn').removeClass('zoomOut');
                                    $("#stole").parent().parent().css('display', 'none');
                                    setTimeout(function () {
                                        $("#getitback").parent().parent().css('display', 'block');
                                    }, 1000);
                                }, 1000);
                            }
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
                        beforeSend: function () {
                            $("#spin-test").addClass('zoomIn').removeClass('zoomOut');
                            setTimeout(function () {
                                $("#spin-test").css('display', 'block');
                            }, 1000);
                        },
                        error: function (error) {
                            console.log(error);
                            $("#spin-test").addClass('zoomOut').removeClass('zoomIn');
                            setTimeout(function () {
                                $("#spin-test").css('display', 'none');
                            }, 1000);
                            $("#test").removeClass('disabled');
                            swal('Error', 'Ooops. Ha ocurrido un error inesperado.', 'error');
                        },
                        success: function (data) {
                            $("#spin-test").addClass('zoomOut').removeClass('zoomIn');
                            setTimeout(function () {
                                $("#spin-test").css('display', 'none');
                            }, 1000);
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
