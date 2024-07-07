<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use Illuminate\Support\Facades\Auth;

class LoginController extends DefaultLoginController
{
    protected $redirectTo = '/';

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }

    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm()
    {
        return view('front.student.auth.login');
    }

    public function showRegisterForm()
    {
        return view('front.student.auth.register');
    }

    public function guard()
    {
        return Auth::guard('student');
    }


    public function logout()
    {
        auth('student')->logout();
        return redirect()->route('login');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'id_number' => 'nullable|min:5|integer',
            'nationality' => 'nullable|min:2|string',
            'nationality_en' => 'nullable|min:2|string',
            'phone' => 'nullable|numeric|digits_between:8,14',
        ]);
        $student = Student::whereEmail($request->email)->first();
        if ($student) {
            $student->update([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'id_number' => $request->id_number,
                'nationality' => $request->nationality,
                'nationality_en' => $request->nationality_en,
                'status' => 1,
            ]);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'id_number' => $request->id_number,
                'phone' => $request->phone,
                'nationality' => $request->nationality,
                'nationality_en' => $request->nationality_en,
                'status' => 1,
            ]);
        }
        auth('student')->login($student, true);
        return redirect()->route('home');
    }



}
