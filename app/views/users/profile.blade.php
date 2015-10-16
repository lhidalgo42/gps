@extends('layouts.master')

@section('content')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('navs.top')
        </nav>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h4 class="page-header">Datos del Usuario</h4>

                    <form>
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" placeholder="Tu nombre"
                                   value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="rut">Rut:</label>
                            <input type="text" class="form-control" id="rut" placeholder="Ejemplo xx.xxx.xxx-x"
                                   value="{{$user->rut}}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" placeholder="Email"
                                   value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Rut:</label>
                            <input type="text" class="form-control" id="phone" placeholder="Ejemplo x-xxxxxxx"
                                   value="{{$user->phone}}">
                        </div>

                        <button type="submit" class="btn btn-default">Actualizar</button>
                    </form>

                </div>


                <div class="col-md-6 col-sm-12">
                    <h4 class="page-header">Subscripción</h4>
                    <p style="font-weight: bold; margin-bottom:5px;">Valida hasta:</p>
                    @foreach($devices as $device)
                        <div class="input-group input-group-md"style="padding-bottom: 40px">
                            <span class="input-group-addon" id="sizing-addon1">{{strtoupper($device->plate)}}</span>
                            <input type="text" class="form-control" value="">
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- /#page-wrapper -->


        </div>
        <!-- /#wrapper -->

@stop
