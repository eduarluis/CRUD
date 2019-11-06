@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-info text-white">Create Test</div>

                <div class="card-body">
                    <div class="container">
                        {!! Form::open(['route' => 'crud.store', 'method' => 'POST']) !!}
                            {!! Form::token() !!}
                            @include('crud.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
