    <div class="box-body">
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter your name')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter your email')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('pushbullet', 'Pushbullet notifications') !!}
            {!! Form::checkbox('pushbullet', 'true') !!}
        </div>
        <div class="form-group">
            {!! Form::label('pushbullet_api_key', 'Pushbullet Api Key') !!}
            {!! Form::text('pushbullet_api_key', null, array('class' => 'form-control', 'placeholder' => 'Enter your Pushbullet Api Key')) !!}
        </div>
        @if(isset($devices))
        <div class="form-group">
            {!! Form::label('pushbullet_device', 'Pushbullet Device') !!}
            {!! Form::select('pushbullet_device', $devices, null, array('class' => 'form-control')) !!}
        </div>
        @endif
        <div class="form-group">
            {!! Form::label('password', 'New password') !!}
            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter your password')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm new password') !!}
            {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm your password')) !!}
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{action('Admin\AdminUserController@sendTestNotification')}}" class="btn btn-info">Send test notification</a>
    </div>