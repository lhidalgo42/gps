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
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills">
                                            <li class="active"><a href="#status-pills{{$device->id}}" data-toggle="tab">Estado</a>
                                            </li>
                                            <li><a href="#activity-pills{{$device->id}}" data-toggle="tab">Actividad</a>
                                            </li>
                                            <li><a href="#messages-pills{{$device->id}}" data-toggle="tab">Mensajes</a>
                                            </li>
                                            <li><a href="#settings-pills{{$device->id}}" data-toggle="tab">Configuracion</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="status-pills{{$device->id}}">
                                                <h4>Home Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                            <div class="tab-pane fade" id="activity-pills{{$device->id}}">
                                                <h4>Profile Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                            <div class="tab-pane fade" id="messages-pills{{$device->id}}">
                                                <h4>Messages Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                            <div class="tab-pane fade" id="settings-pills{{$device->id}}">
                                                <h4>Settings Tab</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
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
