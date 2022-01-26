<?php

use App\Models\Credit;
use App\Models\Information;
use App\Models\Question;
use App\Models\Reference;
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

Route::get('/credits', function () {
    $information=Information::find(1);
    $credits = Credit::all()->sortBy('order');
    return view('credits',compact('information','credits'));
})->name('credits');

Route::get('/faq', function () {
    $information=Information::find(1);
    $questions = Question::all()->sortBy('order');
    return view('questions',compact('information','questions'));
})->name('questions');

Route::get('/references', function () {
    $information=Information::find(1);
    $references=Reference::all()->sortBy('order');
    return view('references',compact('information','references'));
})->name('references');

Route::get('/', function () {
    $information=Information::find(1);
    return view('welcome',compact('information'));
})->name('home');




