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
                    <h1 class="page-header"><i class="fa fa-home"></i> Inicio</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-3">{{UserDevice::all()}}</div>
                <div class="col-md-9">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->


    </div>
    <script>
        var map;
        $(document).ready(function(){
            map = new GMaps({
                div: '#map',
                lat: -33.501603333333,
                lng: -70.561966666667,
                click: function(e){
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