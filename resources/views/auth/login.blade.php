<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adrien Kühn | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    {!! HTML::style('css/admin.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- iCheck -->
    {!! HTML::style('plugins/admin/iCheck/square/blue.css') !!}
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Admin</b> Panel
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            @if ($errors->any())
                <div class="callout callout-danger">
                    <p>{{ $errors->first() }}</p>
                </div>
                @endif

                <!-- form start -->
                {!! Form::open(array('url' => '/auth/login', 'method' => 'POST')) !!}
                    {!! Form::hidden('_token', csrf_token()) !!}
                    <div class="form-group has-feedback">
                        {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    {!! Form::checkbox('remember', '1', null, array('id' => 'remember')) !!} Remember Me
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                {!! Form::close() !!}
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    {!! HTML::script('plugins/admin/jQuery/jQuery-2.1.3.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! HTML::script('js/admin/bootstrap.js') !!}
    <!-- iCheck -->
    {!! HTML::script('plugins/admin/iCheck/icheck.min.js') !!}
    <script>
        $(function () {
            $('#remember').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
</html>