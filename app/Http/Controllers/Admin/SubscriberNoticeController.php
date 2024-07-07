<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriberNotice;
use Illuminate\Http\Request;

class SubscriberNoticeController extends Controller
{
    //

    public function index()
    {
        $subscribers = SubscriberNotice::all();
        return view('admin.subscribers.index',compact('subscribers'));
    }

    public function destroy(SubscriberNotice $subscriberNotice)
    {
        $subscriberNotice->delete();
        return back()->with('failed',' تم حذف المشترك بنجاح');
    }
}
