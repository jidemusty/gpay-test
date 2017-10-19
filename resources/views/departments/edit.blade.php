@extends('main')

@section('title', '| Edit Department')

@section('content')

    <div class="row">
        <h2>Edit Department - <strong>{{ $department->name }}</strong></h2>

        {!! Form::model($department, ['route' => ['departments.update', $department->id], 'method' => 'PUT']) !!}

        <div class="col-md-6">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($department->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($department->updated_at)) }}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <button href="{{ route('departments.index') }}" class="btn btn-danger btn-block">Cancel</button>
                    </div>
                    <div class="col-md-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection