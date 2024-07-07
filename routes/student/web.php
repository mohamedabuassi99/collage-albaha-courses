<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Auth\LoginController;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\CoursesController;
use App\Http\Controllers\Student\RegisterController;
use App\Http\Controllers\Student\PdfController;
use App\Http\Controllers\Student\AttemptsController;
use App\Http\Controllers\Student\LecturesController;
use App\Http\Controllers\Student\YoutubeLecturesController;
use App\Http\Controllers\Student\YoutubeLectureViewsController;
use App\Http\Controllers\Student\RatingsController;
use App\Http\Controllers\Student\CalendarController;
use App\Http\Controllers\Student\Auth\ResetPasswordController;
use App\Http\Controllers\Student\Auth\ForgotPasswordController;


Route::get('register', [LoginController::class, 'showRegisterForm'])->name('student.register');
Route::post('register', [LoginController::class, 'register'])->name('student.register');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/course/{course}', [HomeController::class, 'show_course'])->name('home.course.show');

Route::middleware(['auth:student', 'CheckStudentPassword'])->prefix('student')->group(function () {

    //profile
    Route::prefix('/my-profile')->group(function () {
        Route::get('', [ProfileController::class, 'profile'])->name('student.profile');
        Route::post('update', [ProfileController::class, 'update'])->name('student.profile.update');
    });

    //courses
    Route::prefix('/courses')->group(function () {
        Route::get('/', [CoursesController::class, 'index'])->name('student.courses.index');
        Route::get('/{course}', [CoursesController::class, 'show'])->name('student.courses.show');

        Route::prefix('/exams')->group(function () {
            Route::get('/{exam}', [AttemptsController::class, 'attempt'])->name('student.courses.exam.attempt');
            Route::get('/{exam}/review', [AttemptsController::class, 'review'])->name('student.courses.exam.review');

            Route::prefix('/answers')->group(function () {
                Route::post('/{student}/{question}', [AttemptsController::class, 'answer'])->name('student.courses.exam.answer');
            });

            Route::get('/{exam}/finish', [AttemptsController::class, 'finish'])->name('student.courses.exam.finish');
        });

        //lectures (Zoom)
        Route::prefix('/lectures-zoom')->group(function () {
            Route::get('/{course}/',[LecturesController::class,'index'])->name('student.courses.lectures.index');
        });
        //youtube lectures
        Route::prefix('/YouTube-lectures')->group(function () {
            Route::get('/{course}/{youtubeLecture?}',[YoutubeLecturesController::class,'index'])->name('student.courses.youtube_lectures.index');
        });
        //youtube lectures views
        Route::prefix('/YouTube-lectures-views')->group(function () {
            Route::post('/{youtubeLecture}/',[YoutubeLectureViewsController::class,'store'])->name('student.courses.youtube_lectures_views.store');
        });
        //certificate
        Route::prefix('/certificate')->group(function () {
            Route::get('/print/{course}', [PdfController::class, 'print'])->name('student.course.print');
        });
    });

    Route::get('/calender', [CalendarController::class, 'index'])->name('student.calender.index');


    Route::get('/register/{course}', [RegisterController::class, 'register'])->name('student.course.register');

    Route::post('/register/rating/store/{registration}', [RatingsController::class, 'store'])->name('student.course.register.rating.store');


});

Route::get('student/logout', [LoginController::class, 'logout'])->name('student.logout');
Route::get('student/input-password', [ProfileController::class, 'inputPassword'])->name('student.inputPassword');
Route::post('student/input-password', [ProfileController::class, 'inputPasswordSubmit'])->name('student.inputPasswordSubmit');


Route::prefix('student')->group(function () {
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('student.password.email');
    Route::post('/password/reset-post', [ResetPasswordController::class, 'reset'])->name('student.password.reset_post');
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('student.password.request');
    Route::get('/password/reset/{email}/{token}', [ResetPasswordController::class, 'showResetForm'])->name('student.password.reset');
});