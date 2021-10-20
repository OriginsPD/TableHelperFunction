<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubject;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all()->toArray();

        return view('subject.index', compact(['subjects']));
    }

    public function store(CreateSubject $request): \Illuminate\Http\RedirectResponse
    {
        Subject::create([
            'subject_nm' => $request->subject_nm,
            'cost_amt' => $request->cost_amt,
        ]);

        $saved = true;

        return redirect()->route('Subject.index')->with('saved', $saved);
    }

    public function edit($id)
    {
        $subject = Subject::where('id', $id)->first();

        return view('subject.edit', compact(['subject']));
    }

    public function update(CreateSubject $request, $id): \Illuminate\Http\RedirectResponse
    {
        Subject::where('id',$id)->update([
            'subject_nm' => $request->subject_nm,
            'cost_amt' => $request->cost_amt,
        ]);

        $saved = true;

        return redirect()->route('Subject.index')->with('saved', $saved);
    }
}
