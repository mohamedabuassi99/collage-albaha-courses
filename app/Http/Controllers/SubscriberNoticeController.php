<?php

namespace App\Http\Controllers;

use App\Models\SubscriberNotice;
use Illuminate\Http\Request;

class SubscriberNoticeController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|unique:subscriber_notices|email'
        ]);
        $subscriber = SubscriberNotice::firstOrCreate([
            'email'=>$request->email,
        ]);
        return back()->with('success','تم الاشتراك بنجاح');
    }

    public function destroy($email = null)
    {
        if($email){
            SubscriberNotice::whereEmail($email)->delete();
            return redirect()->route('home')->with('failed','تم الغاء الاشتراك بنجاح');
        }
        abort(404);
    }
}
