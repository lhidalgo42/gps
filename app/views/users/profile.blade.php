@extends('layouts.master')

@section('content')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('navs.top')
        </nav>

        {{$user}}
        <div id="page-wrapper">
            <div class="row">
                <h4 class="page-header">Datos del Usuario</h4>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h3>Datos Personales</h3>
                    <form method="post" action="emailForm.php">
                        <label for="name">Nombre: <span class="required">*</span></label>
                        <input type="text" id="name" name="name" value="" placeholder="Tu nombre" required="required" autofocus="autofocus"/>

                        <label for="email">E-mail: <span class="required">*</span></label>
                        <input type="email" id="email" name="email" value="" placeholder="tu@email.com" required="required"/>

                        <label for="rut">Rut: </label>
                        <input type="text" id="rut" name="rut" value="" placeholder="12345678-9" required="required"/>

                        <input type="submit" value="Actualizar" id="submit"/>
                    </form>

                </div>

                <div class="col-md-6 col-sm-12">
                    <h3>Datos Subscripción</h3>

                </div>


            </div>

        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

@stop
