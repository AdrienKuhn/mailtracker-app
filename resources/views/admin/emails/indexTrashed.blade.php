@extends('admin.layouts.master')

@section('title', 'Deleted emails')

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
            <small>all deleted emails</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{action('Admin\AdminDashboardController@showDashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Emails</a></li>
            <li class="active">Trash</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Deleted emails</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="emails" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Uniqid</th>
                                    <th>Title</th>
                                    <th>Number of opening</th>
                                    <th>Last opened</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($emails as $email)
                                <tr>
                                    <td>{{ $email->id }}</td>
                                    <td>{{ $email->uniqid }}</td>
                                    <td>{{ $email->title }}</td>
                                    <td>{{ $email->email_trackings->count() }}</td>
                                    <td>
                                        @if($email->email_trackings->count() >= 1)
                                            {{ $email->email_trackings->last()->created_at }}
                                        @else
                                            Never opened
                                        @endif
                                    </td>
                                    <td>{{ $email->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Uniqid</th>
                                    <th>Title</th>
                                    <th>Number of opening</th>
                                    <th>Last opened</th>
                                    <th>Created at</th>
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
            $('#emails').dataTable();
        });
    </script>
@stop