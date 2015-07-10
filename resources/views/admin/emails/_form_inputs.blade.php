    <div class="box-body">

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter the email title')) !!}
        </div>

    </div><!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>