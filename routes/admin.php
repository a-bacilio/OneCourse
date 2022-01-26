<?php

use App\Exports\CsuqExport;
use App\Exports\SusExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ReferenceController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\Admin\UserDataController;
use Maatwebsite\Excel\Facades\Excel;

Route::get('',[HomeController::class,'index'])->name('admin.index');
Route::get('user',[UserController::class,'index'])->name('admin.user.index');
Route::get('user/destroy',[UserController::class,'destroy'])->name('admin.user.destroy');

/**RESOURCES */
Route::get('resource',[ResourceController::class,'index'])->name('admin.resource.index');

Route::get('resource/createvideo',[ResourceController::class,'createvideo'])->name('admin.resource.createvideo');
Route::post('resource/createvideo',[ResourceController::class,'storevideo'])->name('admin.resource.storevideo');

Route::get('resource/createimage',[ResourceController::class,'createimage'])->name('admin.resource.createimage');
Route::post('resource/createimage',[ResourceController::class,'storeimage'])->name('admin.resource.storeimage');

Route::post('resource/destroyresource',[ResourceController::class,'destroy'])->name('admin.resource.destroyresource');

/**Lessons */
Route::get('lesson',[LessonController::class,'index'])->name('admin.lesson.index');

Route::get('lesson/edit/{id}',[LessonController::class,'edit'])->name('admin.lesson.edit');
Route::post('lesson/update',[LessonController::class,'update'])->name('admin.lesson.update');
Route::post('lesson/destroy',[LessonController::class,'destroy'])->name('admin.lesson.destroy');

Route::get('lesson/create',[LessonController::class,'create'])->name('admin.lesson.create');
Route::post('lesson/store',[LessonController::class,'store'])->name('admin.lesson.store');

/**Sections */
Route::get('section',[SectionController::class,'index'])->name('admin.section.index');

Route::get('section/edit/{id}',[SectionController::class,'edit'])->name('admin.section.edit');
Route::post('section/update',[SectionController::class,'update'])->name('admin.section.update');
Route::post('section/destroy',[SectionController::class,'destroy'])->name('admin.section.destroy');

Route::get('section/create',[SectionController::class,'create'])->name('admin.section.create');
Route::post('section/store',[SectionController::class,'store'])->name('admin.section.store');

/**Course */
Route::get('course/edit',[CourseController::class,'edit'])->name('admin.course.edit');
Route::post('course/update',[CourseController::class,'update'])->name('admin.course.update');


/**Course */
Route::get('information/edit',[InformationController::class,'edit'])->name('admin.information.edit');
Route::post('information/update',[InformationController::class,'update'])->name('admin.information.update');

/**Reference */
Route::get('reference',[ReferenceController::class,'index'])->name('admin.reference.index');
Route::get('reference/create',[ReferenceController::class,'create'])->name('admin.reference.create');
Route::post('reference/store',[ReferenceController::class,'store'])->name('admin.reference.store');
Route::get('reference/edit/{id}',[ReferenceController::class,'edit'])->name('admin.reference.edit');
Route::post('reference/update',[ReferenceController::class,'update'])->name('admin.reference.update');


/**Question */
Route::get('question',[QuestionController::class,'index'])->name('admin.question.index');
Route::get('question/create',[QuestionController::class,'create'])->name('admin.question.create');
Route::post('question/store',[QuestionController::class,'store'])->name('admin.question.store');
Route::get('question/edit/{id}',[QuestionController::class,'edit'])->name('admin.question.edit');
Route::post('question/update',[QuestionController::class,'update'])->name('admin.question.update');

/**Credit */
Route::get('credit',[CreditController::class,'index'])->name('admin.credit.index');
Route::get('credit/create',[CreditController::class,'create'])->name('admin.credit.create');
Route::post('credit/store',[CreditController::class,'store'])->name('admin.credit.store');
Route::get('credit/edit/{id}',[CreditController::class,'edit'])->name('admin.credit.edit');
Route::post('credit/update',[CreditController::class,'update'])->name('admin.credit.update');

/**DATA */
Route::get('data',[UserDataController::class,'index'])->name('admin.data.users');
Route::get('data/users/download', function () {
    return Excel::download(new UsersExport, 'users.csv');
})->name('admin.data.users.download');
Route::get('data/sus/download', function () {
    return Excel::download(new SusExport, 'sus.csv');
})->name('admin.data.sus.download');

Route::get('data/csuq/download', function () {
    return Excel::download(new CsuqExport, 'csuq.csv');
})->name('admin.data.csuq.download');
