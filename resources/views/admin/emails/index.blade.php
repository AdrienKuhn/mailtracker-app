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
            <small>all Emails</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Emails</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Emails list</h3>
                        <a href="{{action('Admin\AdminEmailController@create')}}" class="btn btn-default pull-right">Add new Email</a>
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
                                    <th>Actions</th>
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
                                        @if($email->email_trackings->count() > 1)
                                            {{ $email->email_trackings->last()->created_at }}
                                        @else
                                            Never opened
                                        @endif
                                    </td>
                                    <td>{{ $email->created_at }}</td>
                                    <td>
                                        <a href="{{action('Admin\AdminEmailController@edit', $email->id)}}" title="Edit email"><i class="fa fa-edit"></i></a>
                                        <a href="{{action('Admin\AdminEmailController@show', $email->id)}}" title="Show email details"><i class="fa fa-eye"></i></a>
                                        <a href="{{action('Admin\AdminEmailController@generate_signature', array($email->id, $email->uniqid))}}" title="Download signature"><i class="fa fa-download"></i></a>
                                        {!! Form::open(array('action' => array('Admin\AdminEmailController@destroy', $email->id), 'method' => 'delete', 'id' => 'emails_delete_form', 'onSubmit' => "return confirm('Are you sure you wish to delete?');")) !!}
                                            <button type="submit" class="btn btn-link"><i class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </td>
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
                                    <th>Actions</th>
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