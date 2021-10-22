<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChoice;
use App\Models\Students;
use App\Models\Subject;
use App\Models\SubjectChoice;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubjectChoiceController extends Controller
{
    public function index(): View
    {
        $choices = SubjectChoice::with('students', 'subjects')->paginate(4);
        $students = Students::all()->toArray();
        $subjects = Subject::all()->toArray();

//        dd($choices);

        return view('choices.index', compact(['choices', 'students', 'subjects']));
    }

    public function store(CreateChoice $request): \Illuminate\Http\RedirectResponse
    {

        $exist = SubjectChoice::where([
            'student_id' => $request->students_id,
            'subject_id' => $request->subjects_id,
            'year_of_exam' => $request->year_of_exam,
        ])->exists();

        if (!$exist) {
            SubjectChoice::create([
                'student_id' => $request->students_id,
                'subject_id' => $request->subjects_id,
                'status' => 0,
                'year_of_exam' => $request->year_of_exam,
            ]);

            $saved = 'success';

            return redirect()->route('Choice.index')->with('saved', $saved);
        }

        $saved = 'fail';

        return redirect()->route('Choice.index')->with('saved', $saved);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        SubjectChoice::where('id',$id)->update(['status' => $request->status]);

        $saved = 'success';

        return back();
    }

}
