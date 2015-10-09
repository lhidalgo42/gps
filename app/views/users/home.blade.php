@extends('layouts.master')

@section('content')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('navs.top')

        </nav>


        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row" style="padding-top: 30px;">
                <div class="col-md-9">
                    <h3>Dispositivos</h3>

                    <div class="panel-group" id="accordion">
                        @foreach($devices as $device)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#device{{$device->id}}"
                                           aria-expanded="false" class="collapsed">{{$device->name}}
                                            <div class="badge pull-right">{{strtoupper($device->plate)}}</div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="device{{$device->id}}" class="panel-collapse collapse @if($device->id == $devices[0]->id) in @endif">
                                    <div class="panel-body">
                                        <div class="col-lg-4">
                                            <div class="panel panel-red">
                                                <div class="panel-heading">
                                                    En caso de Robo, presione el Botón
                                                </div>
                                                <div class="panel-body">
                                                    <p>Marque como robado solo en el caso de que su veiculo sea robado, ya que se comenzara el rastreo del veiculo y bloqueo de la bolba de bencina.</p>
                        <a href="#" class="btn btn-danger" style="color: white;" imei="{{$device->imei}}" >Mi Veiculo Fue Robado</a>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-4 -->
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    Probar aplicación
                                                </div>
                                                <div class="panel-body">
                                                    <p>Ejecute una prueba rapida de la aplicación. Tenga en consideración no estar usando el veiculo en la via publica, ya que puede generar un accidente.</p>
                                                    <a href="#" class="btn btn-primary" imei="{{$device->imei}}">Ejecutar una prueba</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="panel panel-green">
                                                <div class="panel-heading">
                                                    Visor de Eventos
                                                </div>
                                                <div class="panel-body">
                                                    <p>Muestra un Resumen de los sucesos que han sucedido en el Auto.</p>
                                                    <a href="#" class="btn btn-success" style="color: white;" imei="{{$device->imei}}">Ver visor de Eventos</a>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-4 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->


    </div>
    <script>
        var map;
        $(document).ready(function () {
            map = new GMaps({
                div: '#map',
                lat: -33.501603333333,
                lng: -70.561966666667,
                click: function (e) {
                    console.log(e);
                }
            });

            path = {{json_encode($coordinates)}};

            map.drawPolyline({
                path: path,
                strokeColor: '#131540',
                strokeOpacity: 0.6,
                strokeWeight: 6
            });
        });
    </script>
    <!-- /#wrapper -->

@stop
