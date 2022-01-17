<?php

use App\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('',[ContentController::class,'index'])->middleware(['auth','web'])->name('content.index');
Route::post('',[ContentController::class,'update'])->middleware(['auth','web'])->name('content.update');
Route::post('next',[ContentController::class,'updatespecific'])->middleware(['auth','web'])->name('content.updatespecific');
Route::get('evaluation',[ContentController::class,'showevaluation'])->middleware(['auth','web'])->name('content.showevaluation');
Route::post('evaluation',[ContentController::class,'registerevaluation'])->middleware(['auth','web'])->name('content.registerevaluation');
Route::get('certification',[ContentController::class,'showcertification'])->middleware(['auth','web'])->name('content.showcertification');

