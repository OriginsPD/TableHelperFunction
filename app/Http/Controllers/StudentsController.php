<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudent;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all()->toArray();


        return view('student.index', compact(['students']));
    }

    public function store(CreateStudent $request): \Illuminate\Http\RedirectResponse
    {
        Students::create([
            'first_nm' => $request->first_nm,
            'last_nm' => $request->last_nm,
            'dob' => $request->dob,
            'class' => $request->class,
            'email_addr' => $request->email_addr,
            'phone_nbr' => $request->phone_nbr,
            'gender' => $request->gender,

        ]);

        $saved = true;

        return redirect()->route('Student.index')->with('saved', $saved);
    }

    public function edit($id)
    {
        $student = Students::where('id', $id)->first();

        return view('student.show', compact(['student']));
    }

    public function update(CreateStudent $request,$id)
    {
        Students::where('id',$id)->update([
            'first_nm' => $request->first_nm,
            'last_nm' => $request->last_nm,
            'dob' => $request->dob,
            'class' => $request->class,
            'email_addr' => $request->email_addr,
            'phone_nbr' => $request->phone_nbr,
            'gender' => $request->gender,
        ]);

        $saved = true;

        return redirect()->route('Student.index')->with('saved', $saved);
    }
}
