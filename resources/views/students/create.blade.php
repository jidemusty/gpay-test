@extends('main')

@section('title', '| Create New Student')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('https://unpkg.com/flatpickr/dist/flatpickr.min.css') !!}

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Student</h1>
            <hr>

            {!! Form::open(['route' => 'students.store', 'data-parsley-validate' => '', 'files' => 'true']) !!}

                {{ Form::label('fullname', 'Full Name') }}
                {{ Form::text('fullname', null, array('class' => 'form-control', 'required' => '', 'style' => 'margin-bottom: 15px;')) }}

                {{ Form::label('sex', 'Sex') }}
                <select class="form-control" name="sex" style="margin-bottom: 15px;" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>

                {{ Form::label('department_id', 'Department') }}
                <select class="form-control" name="department_id" style="margin-bottom: 15px;" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('dob', 'Date of Birth') }}
                {{ Form::text('dob', null, array('class' => 'flatpickr form-control', 'required' => '')) }}

                {{ Form::submit('Create Student', array('class' => 'btn btn-success', 'style' => 'margin-top: 15px;')) }}

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('https://unpkg.com/flatpickr') !!}
    <script>
        flatpickr(".flatpickr");
    </script>

@endsection