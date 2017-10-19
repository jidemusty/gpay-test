@extends('main')

@section('title', '| All Students')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>
                All Students from - <strong>{{ $dept->name }}</strong>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Department</th>
                <th>Sex</th>
                <th>DOB</th>
                <th>Created At</th>
                <th>Actions</th>
                </thead>

                <tbody>
                @foreach ($dept->students as $student)
                    <tr>
                        <th>{{ $student->id }}</th>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->department->name }}</td>
                        <td>{{ $student->sex }}</td>
                        <td>{{ date('M j, Y', strtotime($student->dob)) }}</td>
                        <td>{{ date('M j, Y', strtotime($student->created_at)) }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection