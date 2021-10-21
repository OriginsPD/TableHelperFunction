<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePayment;
use App\Http\Requests\MakePayment;
use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\Students;
use App\Models\Subject;
use App\Models\SubjectChoice;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public function index()
    {
        $infos = Payment::with('students', 'subjects')->orderBy('student_id')->paginate(5);
        $students = Students::all()->toArray();
        $subjects = Subject::all()->toArray();

        return view('payment.index', compact(['infos', 'students', 'subjects']));
    }

    public function store(CreatePayment $request): RedirectResponse
    {

        $studentChoice = SubjectChoice::where([
            'student_id' => $request->students_id,
            'subject_id' => $request->subjects_id,
        ])->exists();

        if ($studentChoice) {

            $studentinfo = SubjectChoice::with('subjects', 'students')->where([
                'student_id' => $request->students_id,
                'subject_id' => $request->subjects_id,
            ])->get();


            $exists = Payment::where([
                'student_id' => $studentinfo[0]->student_id,
                'subject_id' => $studentinfo[0]->subject_id,
            ])->exists();


            if (!$exists) {
                Payment::create([
                    'student_id' => $studentinfo[0]->student_id,
                    'subject_id' => $studentinfo[0]->subject_id,
                    'amount_paid' => 0,
                    'balance_amt' => $studentinfo[0]->subjects->cost_amt,

                ]);

                Transaction::create([
                    'student_id' => $studentinfo[0]->student_id,
                    'amount_due' => $studentinfo[0]->subjects->cost_amt,
                    'amount_paid' => 0,
                    'balance_amt' => $studentinfo[0]->subjects->cost_amt,
                    'year_of_exam' => $studentinfo[0]->year_of_exam,
                ]);

                $saved = 'success';

                return redirect()->route('Payments.index')->with('saved', $saved);
            }
        }

        $saved = 'fail';

        return redirect()->route('Payments.index')->with('saved', $saved);
    }

    public function show($id)
    {
        $infos = Payment::with('students', 'subjects')
            ->where('id', $id)
            ->get();

        $transactions = Transaction::with('students')
            ->where('id', $id)
            ->get();


        return view('payment.show', compact(['infos', 'transactions']));
    }

    public function update(MakePayment $request, $id)
    {
        $trans = Transaction::where('id', $id)->get();

//        dd($trans);

        $newAmount = $trans[0]->amount_due - $request->amount_paid;
        $balance = $trans[0]->balance_amt +  $request->amount_paid;

//        dd($newAmount);

        if ($newAmount >= 0) {
            Transaction::where('id',$id)
                ->update([
                    'amount_due' => $newAmount,
                    'amount_paid' => $request->amount_paid,
                    'balance_amt' => $balance,
                ]);

            Payment::where('id',$id)
                ->update([
                    'amount_paid' => $request->amount_paid,
                    'balance_amt' => $balance,
                    'date_paid' => date('Y-m-d')
                ]);

            $desc = 'A Payment of $'.$request->amount_paid.' was made on the subject of '.$request->subject;

//            dd($desc);
            PaymentHistory::create([
                'student_id' => $trans[0]->student_id,
                'amount_paid' => $request->amount_paid,
                'date_paid' => date('Y-m-d'),
                'description' => $desc,
            ]);

            $saved = 'success';

            return back()->with('saved', $saved);

        }

        $saved = 'fail';

        return back()->with('saved', $saved);
    }
}
