<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with(['courses' => function ($query) {
            $query->where('show', 1);
            $query->orderByDesc('to');
        }])->get();

        $setting = Settings::first();
        return view('front.home', compact('categories','setting'));
    }

    public function show_course(Course $course)
    {
        return view('front.course-show',compact('course'));
    }

    public function proof(Request $request, $id = null)
    {
        if (!empty($request->id)) {
            $registration = Registration::with(['student', 'course'])->findOrFail($request->id);
        } else {
            $registration = Registration::with(['student', 'course'])->findOrFail($id);
        }
        return view('front.certificate.proof', compact('registration'));
    }
}
