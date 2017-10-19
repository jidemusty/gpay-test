@extends('main')

@section('title', '| All Departments')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Departments</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <th>{{ $department->id }}</th>
                        <td>
                            <a href="/departments/{{ $department->id }}/students">
                                {{ $department->name }}
                            </a>
                        </td>
                        <td>{{ date('M j, Y', strtotime($department->created_at)) }}</td>
                        <td><a href="{{ route('departments.edit', $department->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'DELETE']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'departments.store', 'data-parsley-validate' => '', 'method' => 'POST']) !!}
                <h2>New Department</h2>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::submit('Create New Department', ['class' => 'btn btn-primary', 'required' => '', 'style' => 'margin-top: 15px;']) }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection