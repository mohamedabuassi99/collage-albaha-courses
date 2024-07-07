<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\YoutubeLecture;
use App\Models\YoutubeLectureView;
use Illuminate\Http\Request;

class YoutubeLectureViewsController extends Controller
{
    //
    public function store(Request $request, YoutubeLecture $youtubeLecture)
    {
        if($request->video_id == "true"){
        $views = YoutubeLectureView::firstOrCreate([
            'youtube_lecture_id'=>$youtubeLecture->id,
            'student_id'=>auth('student')->id(),
        ]);
        }elseif($request->video_id == "false"){
          $view = YoutubeLectureView::whereYoutubeLectureId($youtubeLecture->id)->whereStudentId(auth('student')->id())->first();
            $view->delete();

        }

    }
}
