<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\SubscriberNoticeController;

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


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');


Route::get('/proof-registration/{registration:id?}', [HomeController::class, 'proof'])->name('student.course.proof');

Route::post('/Subscriber-store', [SubscriberNoticeController::class, 'store'])->name('subscriber.store');
Route::get('/un-subscribe/{email}', [SubscriberNoticeController::class, 'destroy'])->name('subscriber.destroy');