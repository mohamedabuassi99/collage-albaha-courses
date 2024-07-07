<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RegistrationsController;
use App\Http\Controllers\Admin\ApprovalsController;
use App\Http\Controllers\Admin\DesignCertificateController;
use App\Http\Controllers\Admin\SubscriberNoticeController;
use App\Http\Controllers\Admin\ExamsController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\LecturesController;
use App\Http\Controllers\Admin\YoutubeLecturesController;
use App\Http\Controllers\Admin\RatingsController;
use App\Http\Controllers\Admin\SettingsController;
use Spatie\Browsershot\Browsershot;

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {

    //logout
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

    //profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('admin.profile');
    Route::post('/profile-update', [ProfileController::class, 'profile_update'])->name('admin.profile_update');

    Route::get('/', [HomeController::class, 'index'])->name('admin.index');

    Route::prefix('admin')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('admin.user.index');

        Route::middleware('role:admin')->group(function () {
            Route::get('/create', [UsersController::class, 'create'])->name('admin.user.create');
            Route::post('/store', [UsersController::class, 'store'])->name('admin.user.store');
            Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('admin.user.edit');
            Route::post('/{user}/update', [UsersController::class, 'update'])->name('admin.user.update');
            Route::get('/{user}/destroy', [UsersController::class, 'destroy'])->name('admin.user.destroy');
//            Route::get('/{user}/restore/', [CoursesController::class, 'restore'])->name('admin.course.restore');
//            Route::get('/{user}/force-delete', [CoursesController::class, 'force_delete'])->name('admin.course.force_delete');
        });
    });

    Route::prefix('courses')->group(function () {
        Route::get('/', [CoursesController::class, 'index'])->name('admin.course.index');
        Route::get('/create', [CoursesController::class, 'create'])->name('admin.course.create');
        Route::post('/store', [CoursesController::class, 'store'])->name('admin.course.store');
        Route::get('/{course}/show', [CoursesController::class, 'show'])->name('admin.course.show');
        Route::get('/{course}/edit', [CoursesController::class, 'edit'])->name('admin.course.edit');
        Route::post('/{course}/update', [CoursesController::class, 'update'])->name('admin.course.update');
        Route::get('/{course}/destroy', [CoursesController::class, 'destroy'])->name('admin.course.destroy');
        Route::get('/trash/', [CoursesController::class, 'trash'])->name('admin.course.trash');
        Route::get('/{course}/restore/', [CoursesController::class, 'restore'])->name('admin.course.restore');
        Route::get('/{course}/force-delete', [CoursesController::class, 'force_delete'])->name('admin.course.force_delete');

        //send mail to student
        Route::get('/send-mails/{course}', [CoursesController::class, 'send_mails'])->name('admin.course.send_mails');
        Route::get('/send-mails-new-course/{course}', [CoursesController::class, 'mails_new_course'])->name('admin.course.mails_new_course');

        //design certificate
        Route::prefix('design')->group(function () {
            Route::get('/create/{course}', [DesignCertificateController::class, 'create'])->name('admin.course.design.create');
            Route::post('/store/{course}', [DesignCertificateController::class, 'store'])->name('admin.course.design.store');
            Route::get('/destroy/{designCertificate}', [DesignCertificateController::class, 'destroy'])->name('admin.course.design.destroy');
            Route::get('/show/{course}/{designCertificate}', [DesignCertificateController::class, 'show'])->name('admin.course.design.show');

        });

        //exams
        Route::prefix('exams')->group(function () {
            Route::get('/create/{course}', [ExamsController::class, 'create'])->name('admin.course.exams.create');
            Route::post('/store/{course}', [ExamsController::class, 'store'])->name('admin.course.exams.store');
            Route::get('/destroy/{exam}', [ExamsController::class, 'destroy'])->name('admin.course.exams.destroy');
            Route::get('/show/{course}', [ExamsController::class, 'show'])->name('admin.course.exams.show');
            //questions
            Route::prefix('questions')->group(function () {
                Route::post('/store/{exam}', [QuestionsController::class, 'store'])->name('admin.course.exams.questions.store');
                Route::post('/update/{question}', [QuestionsController::class, 'update'])->name('admin.course.exams.questions.update');
                Route::get('/destroy/{question}', [QuestionsController::class, 'destroy'])->name('admin.course.exams.questions.destroy');
            });

        });

        //lectures (zoom)
        Route::prefix('lectures')->group(function () {
            Route::get('/{course}/', [LecturesController::class, 'index'])->name('admin.course.lectures.index');
            Route::post('/{course}/store', [LecturesController::class, 'store'])->name('admin.course.lectures.store');
            Route::get('/{lecture}/destroy', [LecturesController::class, 'destroy'])->name('admin.course.lectures.destroy');
        });

        //lectures (YouTube)
        Route::prefix('youtube-lectures')->group(function () {
            Route::get('/{course}', [YoutubeLecturesController::class, 'index'])->name('admin.course.youtube_lectures.index');
            Route::post('/{course}/store', [YoutubeLecturesController::class, 'store'])->name('admin.course.youtube_lectures.store');
            Route::get('/{youtubeLecture}/destroy', [YoutubeLecturesController::class, 'destroy'])->name('admin.course.youtube_lectures.destroy');
            Route::get('/{course}/renumbering', [YoutubeLecturesController::class, 'renumbering'])->name('admin.course.youtube_lectures.renumbering');

            Route::get('/{youtubeLecture}/views', [YoutubeLecturesController::class, 'views'])->name('admin.course.youtube_lectures.views');
        });

        //students
        Route::prefix('students')->group(function () {
            Route::post('/store/{course}', [RegistrationsController::class, 'store'])->name('admin.course.student.store');
            Route::post('/store-excel/{course}', [RegistrationsController::class, 'store_excel'])->name('admin.course.student.store_excel');
            Route::get('/excel-export/{course}', [RegistrationsController::class, 'excel_export'])->name('admin.course.student.export');
            Route::get('/pdf-certification-export/{course}/{student}', [RegistrationsController::class, 'pdf_certification'])->name('admin.course.student.pdf_certification');
            Route::get('/pdf-certification-export-all/{course}', [RegistrationsController::class, 'pdf_certification_export_all'])->name('admin.course.student.pdf_certification_export_all');
            Route::get('/destroy/{student}/{course}', [RegistrationsController::class, 'destroy'])->name('admin.course.student.destroy');


        });

        //ratings
        Route::prefix('ratings')->group(function () {
            Route::get('/{course}/all-ratings', [RatingsController::class, 'index'])->name('admin.course.ratings.index');
        });
    });

    Route::prefix('categories')->group(function () {

        Route::get('/', [CategoriesController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}/show', [CategoriesController::class, 'show'])->name('admin.categories.show');
        Route::get('/{category}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/{category}/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::get('/{category}/destroy', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');

    });

    Route::prefix('students')->group(function () {
        Route::get('/', [StudentsController::class, 'index'])->name('admin.students.index');
        Route::get('/create', [StudentsController::class, 'create'])->name('admin.students.create');
        Route::post('/store', [StudentsController::class, 'store'])->name('admin.students.store');
        Route::get('/{student}/show', [StudentsController::class, 'show'])->name('admin.students.show');
        Route::get('/{student}/edit', [StudentsController::class, 'edit'])->name('admin.students.edit');
        Route::post('/{student}/update', [StudentsController::class, 'update'])->name('admin.students.update');
        Route::get('/{student}/destroy', [StudentsController::class, 'destroy'])->name('admin.students.destroy');
        Route::get('/trash/', [StudentsController::class, 'trash'])->name('admin.students.trash');
        Route::get('/{student}/restore/', [StudentsController::class, 'restore'])->name('admin.students.restore');
        Route::get('/{student}/force-delete', [StudentsController::class, 'force_delete'])->name('admin.students.force_delete');
    });

    Route::prefix('Approval')->middleware('role:admin')->group(function () {
        Route::get('courses-list', [ApprovalsController::class, 'approval_courses_list'])->name('admin.approval.courses');
        Route::get('students-list', [ApprovalsController::class, 'approval_students_list'])->name('admin.approval.students');
        Route::get('registrations-list', [ApprovalsController::class, 'approval_registrations_list'])->name('admin.approval.registrations');
        Route::get('change-students-information-list', [ApprovalsController::class, 'approval_change_students_information'])->name('admin.approval.change_students_information');


        Route::get('students-accept/{student}', [ApprovalsController::class, 'approval_students_accept'])->name('admin.approval.students.accept');
        Route::get('courses-accept/{course}', [ApprovalsController::class, 'approval_courses_accept'])->name('admin.approval.courses.accept');
        Route::get('registrations-accept/{registration}', [ApprovalsController::class, 'approval_registrations_accept'])->name('admin.approval.registrations.accept');

        //accept all registrations
        Route::get('registrations-accept-all', [ApprovalsController::class, 'approval_registrations_accept_all'])->name('admin.approval.registrations.accept_all');

        //accept custom student
        Route::get('change-students-information-accept/{changeStudentInformation}', [ApprovalsController::class, 'approval_change_students_information_accept'])->name('admin.approval.change_students_information.accept');
        Route::get('change-students-information-unaccept/{changeStudentInformation}', [ApprovalsController::class, 'approval_change_students_information_unaccept'])->name('admin.approval.change_students_information.unaccept');

        //accept-all
        Route::get('change-students-information-accept-all', [ApprovalsController::class, 'approval_change_students_information_accept_all'])->name('admin.approval.change_students_information.accept_all');

    });

    Route::prefix('subscribers')->group(function () {
        Route::get('/', [SubscriberNoticeController::class, 'index'])->name('admin.subscriber.index');
        Route::get('/destroy/{subscriberNotice}', [SubscriberNoticeController::class, 'destroy'])->name('admin.subscriber.destroy')->middleware('role:admin');
    });

    Route::prefix('settings')->middleware('role:admin')->group(function () {
        Route::get('',[SettingsController::class,'index'])->name('admin.settings.index');
        Route::post('/store',[SettingsController::class,'store'])->name('admin.settings.store');
    });

});
