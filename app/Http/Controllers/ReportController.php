<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\Transaction;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
//        $infos = Payment::with('students', 'subjects')
//            ->select('student_id','amount_paid')
//            ->groupBy('student_id')
//            ->sum('amount_paid');

        $infos = Payment::with('students', 'subjects')->groupBy('student_id')
            ->selectRaw('sum(amount_paid) as sum, student_id, sum(balance_amt) as balance_amt, student_id',)
            ->get();

        $infoavg = Payment::with('students', 'subjects')->groupBy('student_id')
            ->selectRaw('avg(amount_paid) as Avg, student_id, avg(balance_amt) as balance_amt, student_id',)
            ->get();

//        dd($infos);

        $transactions = Transaction::with('students')
            ->get();

        $histories = PaymentHistory::with('students')
            ->paginate(5);

//        dd($paymenthistorys);

        return view('report.index', compact(['infos', 'infoavg', 'transactions','histories']));
    }
}
