<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="/images/favicon.ico" />

    {{HTML::style('css/appTheme.css')}}
    {{HTML::style('css/login/style.css')}}
    <style>
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    {{HTML::script('/js/appTheme.js')}}
    {{HTML::script('/js/login/script.js')}}

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img" src="img/avatar_2x.png" alt="">
                {{ Form::open(['route'=> 'sessions.store','class' => 'form-signin']) }}
                {{ Form::email('email', Input::old('email'), array('placeholder' => 'Correo','class' => 'form-control','id' => 'mail','required','autofocus')) }}
                {{ Form::password('password',array('placeholder' => 'Contraseña','class' => 'form-control', 'id' => 'pass' ,'required')) }}
                <div class="input-group">
                    {{ Form::checkbox('remember', true,array('class' => 'form-control')) }} Recordarme
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="login">Sign in</button>
                @if(Session::has('error'))
                    <span class="text-danger">{{Session::get('error')}}</span>
                @endif
                <a href="#" class="pull-right need-help">Olvide mi Clave ? </a><span class="clearfix"></span>
                {{ Form::close() }}
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
</body>
</html>