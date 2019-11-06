@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    List Test
                    <div class="text-right">
                        <a class="btn btn-info square" href="{{route('home.create')}}">{{ __('Create') }}</a>
                    </div>
                </div>

                <div class="card-body text-center">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Camp Chars 32</th>
                                <th>Camp Chars 65535</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @if(count($lists) > 0)
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $list->max32 }}</td>
                                        <td>{{$list->max65535}}</td>
                                        <td>
                                            {!! Form::open(['route' => ['home.destroy', $list->id], 'method' => 'DELETE']) !!}
                                                <a href="{{ route('home.edit',$list->id) }}" class="btn btn-warning btn-sm square">Edit</a>
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm square']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp 
                                @endforeach                                
                            @else
                                <tr>
                                    <td colspan="4">Sin Registros</td>
                                </tr>
                            @endif()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
