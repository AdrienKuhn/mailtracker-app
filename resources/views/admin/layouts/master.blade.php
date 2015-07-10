<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adrien Kühn | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @section('top_style')
        <!-- FontAwesome 4.3.0 -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Ionicons 2.0.0 -->
        <link href="//code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme style -->
        {!! HTML::style('css/admin.css') !!}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        @show

</head>

<body class="skin-black">
    @section('body')
    <div class="wrapper">
        @include('admin.top-navigation')
        @include('admin.navigation')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="#">{{ Config::get('adrienkuhn.site_name') }}</a>.</strong> All rights reserved.
        </footer>
    </div><!-- ./wrapper -->

    @section('bottom_scripts')
        <!-- jQuery 2.1.3 -->
        {!! HTML::script('plugins/admin/jQuery/jQuery-2.1.3.min.js') !!}
        <!-- jQuery UI 1.11.2 -->
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        {!! HTML::script('js/admin/bootstrap.js') !!}
        <!-- AdminLTE App -->
        {!! HTML::script('js/admin/app.js') !!}
        <!-- SlimScroll -->
        {!! HTML::script('plugins/admin/slimScroll/jquery.slimscroll.min.js') !!}
        <!-- FastClick -->
        {!! HTML::script('plugins/admin/fastclick/fastclick.min.js') !!}
    @show

</body>