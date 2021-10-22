<?php

use App\Http\Controllers\helperController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectChoiceController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('Student', StudentsController::class);
    Route::resource('Subject', SubjectController::class);
    Route::resource('Choice', SubjectChoiceController::class);
    Route::resource('Payments', PaymentController::class);
    Route::resource('Report', ReportController::class);

    Route::get('Help', helperController::class)->name('help');

});


require __DIR__ . '/auth.php';
