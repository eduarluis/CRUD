@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    List Test
                </div>
                
                <div class="card-body text-center">
                    <div class="text-right pb-2">
                        <a class="btn btn-primary btn-sm square" href="{{route('crud.create')}}">{{ __('Add') }}</a>
                    </div>

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
                                            {!! Form::open(['route' => ['crud.destroy', $list->id], 'method' => 'DELETE']) !!}
                                                <a href="{{ route('crud.edit',$list->id) }}" class="btn btn-warning btn-sm square">Edit</a>
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
                    {{ $lists->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
