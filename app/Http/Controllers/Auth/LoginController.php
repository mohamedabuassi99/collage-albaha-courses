<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.index');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::guard()->attempt($credentials, $request->remember)) {
            return redirect()->route('admin.index');
        }

        $student = Student::whereEmail($request->email)->first();
        if ($student) {
            if ($student->password != null) {
                if (Auth::guard('student')->attempt($credentials, $request->remember)) {
                    return redirect()->route('student.courses.index');
                } else {
                    return back()->withErrors(['email' => 'البريد الاكتروني أو كلمة المرور غير صحيحة.']);
                }
            } else {
                Auth::guard('student')->loginUsingId($student->id, $request->remember);
                return redirect()->route('student.courses.index');
            }
        } else {
            if (Auth::guard('student')->attempt($credentials, $request->remember)) {
                return redirect()->route('student.courses.index');
            } else {
                return back()->withErrors(['email' => 'البريد الاكتروني أو كلمة المرور غير صحيحة.']);
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
