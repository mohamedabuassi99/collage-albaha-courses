<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStudentPassword
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('student')->user()->status) {
            if (auth('student')->user()->password) {
                return $next($request);
            } else {
                return redirect()->route('student.inputPassword');
            }
        } else {
            auth('student')->logout();
            return redirect()->route('login')->with('failed', 'الحساب تحت المراجعة, لم يتم الاعتماد بعد.');
        }
    }
}
