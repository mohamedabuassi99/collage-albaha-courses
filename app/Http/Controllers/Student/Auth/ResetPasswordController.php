<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\ResetPasswordController as DefaultResetPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class ResetPasswordController extends DefaultResetPasswordController
{
    //
    public function showResetForm($email = null, $token = null)
    {
        return view('front.student.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $email]
        );
    }

    public function broker()
    {
        return Password::broker('student');
    }

    public function guard()
    {
        return Auth::guard('student');
    }

}
