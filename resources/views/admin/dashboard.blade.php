@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $sent_email_nb }}</h3>
                        <p>@if($sent_email_nb >1)Emails @else Email @endif sent</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-paper-airplane"></i>
                    </div>
                    <a href="{{ action('Admin\AdminEmailController@index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                            <h3>{{ $active_email_nb }}</h3>
                        <p>@if($active_email_nb >1)Active emails @else Active email @endif</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email-unread"></i>
                    </div>
                    <a href="{{ action('Admin\AdminEmailController@index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $last_email_read_nb }}</h3>
                        <p>Last email opening</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-eye"></i>
                    </div>
                    <a href="{{action('Admin\AdminEmailController@show', $last_email->id)}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>New</h3>
                        <p>Create new email</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-plus-round"></i>
                    </div>
                    <a href="{{ action('Admin\AdminEmailController@create') }}" class="small-box-footer">Go <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Last email details: {{$last_email->title}}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Read at</th>
                                <th>IP</th>
                                <th>Host</th>
                                <th>User Agent</th>
                                <th>Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($last_email->email_trackings as $tracking)
                                <tr>
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
            </div>
        </div><!-- /.row (main row) -->
    </section><!-- /.content -->
@stop