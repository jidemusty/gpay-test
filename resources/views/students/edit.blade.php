@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('https://unpkg.com/flatpickr/dist/flatpickr.min.css') !!}

@endsection

@section('content')

    <div class="row">

        <h2>Edit Student</h2>

        {!! Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'PUT', 'files' => true]) !!}

        <div class="col-md-8">

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

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($student->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($student->updated_at)) }}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('students.show', 'Cancel', array($student->id), array('class' => 'btn btn-danger btn-block')) !!}
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

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('https://unpkg.com/flatpickr') !!}
    <script>
        flatpickr(".flatpickr");
    </script>

@endsection