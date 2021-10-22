<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubject;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(5);

        return view('subject.index', compact(['subjects']));
    }

    public function store(CreateSubject $request): \Illuminate\Http\RedirectResponse
    {
        $exist = Subject::where([
            'subject_nm' => $request->subject_nm,
        ])->exists();

        if (!$exist) {

            Subject::create([
                'subject_nm' => $request->subject_nm,
                'cost_amt' => $request->cost_amt,
            ]);

            $saved = 'success';

            return redirect()->route('Subject.index')->with('saved', $saved);
        }

        $saved = 'fail';

        return redirect()->route('Subject.index')->with('saved', $saved);
    }

    public function edit($id)
    {
        $subject = Subject::where('id', $id)->first();

        return view('subject.edit', compact(['subject']));
    }

    public function update(CreateSubject $request, $id): \Illuminate\Http\RedirectResponse
    {
        Subject::where('id', $id)->update([
            'subject_nm' => $request->subject_nm,
            'cost_amt' => $request->cost_amt,
        ]);

        $saved = 'success';

        return redirect()->route('Subject.index')->with('saved', $saved);
    }
}
