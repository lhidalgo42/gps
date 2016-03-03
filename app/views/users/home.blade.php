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
                    <div class="pull-right" style="padding-bottom: 10px;">
                        @foreach($statuses as $status)
                        <button class="btn" type="button" data-toggle="tooltip" data-placement="top" title="{{$status->description}}" style="border-color: {{$status->cssBorder}};background-color: {{$status->cssColor}};"></button><span style="padding:10px; font-weight:bold;">{{$status->name}}</span>
                        @endforeach
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            <div class="row">
                @foreach($devices as $device)
                <div class="col-lg-6 col-xs-12" style="padding-bottom: 30px;">
                    <div class="panel {{$statuses[$device->status_id-1]->className}}">
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
                        <a href="/device/{{$device->id}}">
                            <div class="panel-footer">
                                <span class="pull-left">Más opciones</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    <div id="map{{$device->id}}" class="map"></div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- /#page-wrapper -->
        <script>
            @foreach($devices as $device)
            var map{{$device->id}};
            @endforeach
            $(document).ready(function(){
        @foreach($devices as $device)
        @if(isset($coordinates[$device->id]))
                    var map{{$device->id}} = new GMaps({
                        div: '#map{{$device->id}}',
                        lat: {{$coordinates[$device->id][0][0]}},
                        lng: {{$coordinates[$device->id][0][1]}}
                    });
                path = {{json_encode($coordinates[$device->id])}};
                map{{$device->id}}.drawPolyline({
                    path: path,
                    strokeColor: '#131540',
                    strokeOpacity: 0.6,
                    strokeWeight: 6
                });
        @endif
        @endforeach
            });
        </script>
    </div>
    <!-- /#wrapper -->

@stop
