<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Registration;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    //
    public function store(Request $request, Registration $registration)
    {
        if ($registration->student_id == auth('student')->id()) {
            $request->registration_id = $registration->id;
            $request->validate([
//                'registration_id' => 'required|unique:ratings',
                'value' => 'required|numeric',
                'description' => 'nullable',
            ]);
            $rating = Rating::firstOrCreate(
                [
                    'registration_id' => $registration->id
                ],
                [
                    'value' => $request->value,
                    'description' => $request->description,
                ]
            );
            return back()->with('success', 'تم التقييم بنجاح');

        }
        abort(404);
    }
}
