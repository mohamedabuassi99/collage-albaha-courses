<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\ForgotPasswordController as DefaultForgotPasswordController;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends DefaultForgotPasswordController
{
    public function showLinkRequestForm()
    {
        return view('front.student.auth.passwords.email');
    }

    public function broker()
    {
        return Password::broker('student');
    }

}
