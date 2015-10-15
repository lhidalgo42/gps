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
                @foreach($devices as $device)
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-car fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{strtoupper($device->plate)}}</div>
                                        <div class="h4">{{$device->name}}</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- /.row -->
            <div class="row" style="padding-top: 30px;">
                <div class="col-md-9">
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
