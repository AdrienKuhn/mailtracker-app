<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {!! HTML::image('img/admin/avatar.png', 'User Image', array('class' => 'img-circle')) !!}
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li @if(Request::is('admin')) class="active" @endif>
                <a href="{{action('Admin\AdminDashboardController@showDashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li @if(Request::is('admin/email*')) class="active treeview" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-desktop"></i>
                    <span>Emails</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('admin/email')) class="active" @endif><a href="{{action('Admin\AdminEmailController@index')}}"><i class="fa fa-circle-o"></i> List Emails</a></li>
                    <li @if(Request::is('admin/email/create')) class="active" @endif><a href="{{action('Admin\AdminEmailController@create')}}"><i class="fa fa-circle-o"></i> Add Email</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>