<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class LecturesController extends Controller
{

    public function index(Course $course)
    {
        $course = Course::with('lectures')->findOrFail($course->id);
        return view('admin.courses.lectures.index',compact('course'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $user = Zoom::user()->first();
        $meeting = Zoom::meeting()->make([
            'topic' => $request->topic,
            'type' => 8,
            'duration' => $request->duration,
            'timezone' => config('app.timezone'),
            'start_time' => Carbon::parse($request->start_at), // best to use a Carbon instance here.
        ]);
        $meeting->settings()->make([
            'join_before_host' => true,
            'approval_type' => 1,
            'registration_type' => 2,
            'enforce_login' => false,
            'waiting_room' => false,
//            'auto_recording' => true,
            'host_video' => false,
            'participant_video' => false,
        ]);
        $meeting->recurrence()->make([
            'type' => 2,
            'repeat_interval' => 1,
        ]);
        $meetingData = $user->meetings()->save($meeting);
        $lecture = Lecture::create([
            'course_id' => $course->id,
            'meeting_id' => $meetingData->id,
            'topic' => $request->topic,
            'start_at' => Carbon::parse($request->start_at),
            'duration' => $request->duration,
            'start_url' => $meetingData->start_url,
            'join_url' => $meetingData->join_url,
        ]);
        return back()->with('success','تم اضافة المحاضرة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $meeting = Zoom::meeting()->find($lecture->meeting_id);

        if($meeting){
            $meeting->delete();
        }
        $lecture->delete();
        return back()->with('failed', 'تم حذف المحاضرة بنجاح');
    }
}
