<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function profile()
    {
        $user = User::find(auth()->id());
        return view('admin.profile.profile', compact('user'));
    }

    public function profile_update(Request $request)
    {
        $user = User::find(auth()->id());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if (!empty($request->password) && !empty($request->password_confirmation)) {
            $request->validate([
                'password' => 'required|min:5|confirmed'
            ]);
            $user->update(['password' => bcrypt($request->password)]);
        }
        return back()->with('success', 'تم تعديل البيانات بنجاح');
    }
}
