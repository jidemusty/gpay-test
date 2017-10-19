@extends('main')

@section('title', '| View Student')

@section('content')

    <div class="row">
        <div class="col-md-8">

            Fullname: <h1>{{ $student->fullname }}</h1>

            <hr/>

            <strong>Sex</strong>
            <p>{{ $student->sex }}</p>

            <strong>Department</strong>
            <p>{{ $student->department->name }}</p>

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($student->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($student->updated_at)) }}</p>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('students.edit', 'Edit', array($student->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('students.index', '<< See All Students >>', [], ['class' => 'btn btn-default btn-block', 'style' => 'margin-top: 15px;']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

