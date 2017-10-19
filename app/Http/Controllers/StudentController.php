<?php

namespace App\Http\Controllers;

use Session;
use App\Department;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('department')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('students.create')->with('departments', $departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'department_id' => 'required | integer',
            'sex' => 'required',
            'dob' => 'required'
        ]);

        $student = new Student();

        $student->fullname = $request->fullname;
        $student->department_id = $request->department_id;
        $student->sex = $request->sex;
        $student->dob = $request->dob;

        $student->save();

        Session::flash('success', 'Student was successfully saved');

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $departments = Department::all();
        $depts = [];
        foreach ($departments as $department) {
            $depts[$department->id] = $department->name;
        }

        return view('students.edit')
            ->with('student', $student)
            ->with('departments', $departments)
            ->with('depts', $depts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'department_id' => 'required | integer',
            'sex' => 'required',
            'dob' => 'required'
        ]);

        $student->fullname = $request->fullname;
        $student->department_id = $request->department_id;
        $student->sex = $request->sex;
        $student->dob = $request->dob;

        $student->update();

        Session::flash('success', 'Student was successfully created');

        return redirect()->route('students.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        Session::flash('success', 'Student was successfully deleted');

        return redirect()->route('students.index');
    }
}
