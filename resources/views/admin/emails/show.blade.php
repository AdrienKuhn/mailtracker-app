@extends('admin.layouts.master')

@section('title', 'Emails')

@section('top_style')
    @parent
    <!-- DATA TABLES -->
    {!! HTML::style('plugins/admin/datatables/dataTables.bootstrap.css') !!}
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Emails
            <small>{{ $email->title }} details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{action('Admin\AdminEmailController@index')}}">Emails</a></li>
            <li class="active">{{ $email->title }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $email->title }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="trackings" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Read at</th>
                                    <th>IP</th>
                                    <th>Host</th>
                                    <th>User Agent</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($email->email_trackings as $tracking)
                                <tr>
                                    <td>{{ $tracking->id }}</td>
                                    <td>{{ $tracking->created_at }}</td>
                                    <td>{{ $tracking->ip }}</td>
                                    <td>{{ $tracking->host }}</td>
                                    <td>{{ $tracking->user_agent }}</td>
                                    <td>{{ $tracking->country }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Read at</th>
                                    <th>IP</th>
                                    <th>Host</th>
                                    <th>User Agent</th>
                                    <th>Country</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop

@section('bottom_scripts')
    @parent

    <!-- DATA TABES SCRIPT -->
    {!! HTML::script('plugins/admin/datatables/jquery.dataTables.js') !!}
    {!! HTML::script('plugins/admin/datatables/dataTables.bootstrap.js') !!}
    <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $('#trackings').dataTable();
        });
    </script>
@stop