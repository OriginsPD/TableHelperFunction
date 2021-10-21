<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudent;
use App\Models\Students;
use App\Models\SubjectChoice;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::paginate(4);


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

        $saved = 'success';

        return redirect()->route('Student.index')->with('saved', $saved);
    }

    public function edit($id)
    {
        $student = Students::where('id', $id)->first();

        return view('student.edit', compact(['student']));
    }

    public function update(CreateStudent $request, $id): \Illuminate\Http\RedirectResponse
    {
        Students::where('id', $id)->update([
            'first_nm' => $request->first_nm,
            'last_nm' => $request->last_nm,
            'dob' => $request->dob,
            'class' => $request->class,
            'email_addr' => $request->email_addr,
            'phone_nbr' => $request->phone_nbr,
            'gender' => $request->gender,
        ]);

        $saved = 'success';

        return redirect()->route('Student.index')->with('saved', $saved);
    }

    public function show($id)
    {
//       $students = SubjectChoice::with(['subjects' ,'students' => function($query) use ($id){
//           $query->where('id',$id);
//       }])->where('student_id',$id)->paginate(3);

        $students =   Students::with(['subjectChoice' => function($query) use ($id) {

               $query->where('student_id',$id);

        }])->whereHas('subjectChoice',function ($query) use ($id){

               $query->where('student_id',$id);

           })->paginate(3);

//       dd($students);

        return view('student.show',compact(['students']));
    }
}
