<?php

namespace App\Http\Controllers;

use App\Models\Students;

class helperController extends Controller
{
    public function __invoke()
    {
       $students = Students::all();


       return view('help',compact(['students']));
    }
}
