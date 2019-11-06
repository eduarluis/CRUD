<div class="row">
    <div class="col">
        {!! Form::label('max32', 'Max Chars 32') !!}
        {{ Form::text('max32',null, 
            [
                'class' => 'form-control square',
                'placeholder' => 'Enter your chars, max 32',
                // 'maxlength' => 32,
                'minlength' => 1,
            ])
        }}
    
        @error('max32')
            <span class='text-danger' role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mt-2">                            
    <div class="col">
        {!! Form::label('max65535', 'Max Chars 65535') !!}
        {!! Form::textarea('max65535', null, 
            [
                'class' => 'form-control square', 
                'placeholder' => 'Enter your chars, max 65535',
                // 'maxlength' => 65535,
                'minlength' => 1,
            ]) 
        !!}
        @error('max65535')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mt-2 text-center">
    <div class="col"></div>
    <div class="col">
        <a href="{{ route('crud.index') }}" class="btn btn-warning square">Back</a>
        {!! Form::submit('Save', 
            [
                'class' => 'btn btn-info square'
            ]) 
        !!}
    </div>
    <div class="col"></div>
</div>