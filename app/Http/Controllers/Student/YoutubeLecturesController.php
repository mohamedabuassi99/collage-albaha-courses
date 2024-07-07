<?php

namespace App\Http\Controllers\Student;

use Alaouy\Youtube\Facades\Youtube;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\YoutubeLecture;
use App\Models\YoutubeLectureView;
use Illuminate\Http\Request;

class YoutubeLecturesController extends Controller
{

    public function index(Course $course, YoutubeLecture $youtubeLecture = null)
    {
        $course = Course::with('videos')->findOrFail($course->id);

        if ($youtubeLecture) {
            $videoInfo = Youtube::getVideoInfo($youtubeLecture->video_id);
//            dd($videoInfo);
        } else {
            $videos = YoutubeLecture::whereCourseId($course->id)->orderBy('numbering')->pluck('id');
            $current = YoutubeLectureView::with('video')->whereIn('youtube_lecture_id', $videos)
                ->whereStudentId(auth('student')->id())->orderByDesc('youtube_lecture_id')->first();
            $youtubeLecture = YoutubeLecture::find(@$current->video->id);
            if (!$youtubeLecture) {
                $youtubeLecture = YoutubeLecture::whereCourseId($course->id)->first();
            }
            $videoInfo = Youtube::getVideoInfo($youtubeLecture->video_id);
        }
        return view('front.student.courses.youtube-lectures.index', compact('course', 'youtubeLecture', 'videoInfo'));
    }

}
