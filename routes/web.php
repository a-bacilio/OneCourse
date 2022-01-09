<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/', function (Request $request) {

    return $request;

    Validator::make((array) $request, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'age'=>['required','numeri'],
        'gender'=>['required'],
        'education_level'=>['required'],
        'civil_status'=>['required'],
        'ocupppation'=>['required'],
        'birth_place'=>['required'],
        'residence_state'=>['required'],
        'residence_province'=>['required'],
        'residence_district'=>['required'],
        'covid_family'=>['required'],
        'caretaker_you'=>['required'],
        'caretaker_pro'=>['required'],
    ])->validate();

    return $request;

})->name('registerfake');
