@extends('admin.layouts.master')

@section('title', 'Edit profile')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small>edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">My profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit profile</h3>
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
                        @if (Session::has('pushbullet_error'))
                            <div class="callout callout-warning">
                                <h4>Pushbullet</h4>
                                <p>{{ Session::get('pushbullet_error') }}</p>
                            </div>
                        @endif
                        @if (Session::has('pushbullet_info'))
                            <div class="callout callout-info">
                                <h4>Pushbullet</h4>
                                <p>{{ Session::get('pushbullet_info') }}</p>
                            </div>
                        @endif

                        <!-- form start -->
                        {!! Form::model($user, array('action' => array('Admin\AdminUserController@update'), 'method' => 'PUT')) !!}
                            @include('admin.users._form_inputs')
                        {!! Form::close() !!}
                        <!-- form close -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@stop