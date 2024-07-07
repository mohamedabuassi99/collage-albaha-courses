<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    //

    public function index(Course $course)
    {
        return view('admin.courses.ratings.index',compact('course'));
    }
}
