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
            {!! Form::label('password', 'New password') !!}
            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter your password')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm new password') !!}
            {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm your password')) !!}
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>