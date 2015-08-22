@extends('admin.layouts.master')

@section('title', 'Add new email')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Emails
            <small>new</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{action('Admin\AdminDashboardController@showDashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{action('Admin\AdminEmailController@index')}}">Emails</a></li>
            <li class="active">Add new Email</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">New Email</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {{-- Show errors if any --}}
                        @if ($errors->any())
                            <div class="callout callout-warning">
                                <h4>Errors</h4>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- form start -->
                            {!! Form::open(array('route' => 'admin.email.store', 'method' => 'POST')) !!}
                                @include('admin.emails._form_inputs')
                            {!! Form::close() !!}
                            <!-- form close -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop