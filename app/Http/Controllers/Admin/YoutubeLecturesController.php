<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\YoutubeLecture;
use App\Models\YoutubeLectureView;
use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class YoutubeLecturesController extends Controller
{

    public function index(Course $course)
    {
        $course = Course::with('videos.views')->findOrFail($course->id);
        return view('admin.courses.youtube-lectures.index', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        if ($request->video_url != null) {
//            dd($request->video_url);
            $idVideo = Youtube::parseVidFromURL($request->video_url);
            $youtubeData = Youtube::getVideoInfo($idVideo);
            $youtubeLecture = YoutubeLecture::create([
                'course_id' => $course->id,
                'video_id' => $youtubeData->id,
                'title' => $youtubeData->snippet->title,
                'thumbnails' => $youtubeData->snippet->thumbnails->default->url,
                'channel_title' => $youtubeData->snippet->channelTitle,
                'numbering' => $course->videos->max('numbering') + 1 ?? 1,
            ]);

            return back()->with('success', 'تم اضافة الفيديو بنجاح');
        } elseif ($request->video_id != null) {
            $youtubeData = Youtube::getVideoInfo($request->video_id);
            $youtubeLecture = YoutubeLecture::create([
                'course_id' => $course->id,
                'video_id' => $youtubeData->id,
                'title' => $youtubeData->snippet->title,
                'thumbnails' => $youtubeData->snippet->thumbnails->default->url,
                'channel_title' => $youtubeData->snippet->channelTitle,
                'numbering' => $course->videos->max('numbering') + 1 ?? 1,
            ]);
            return back()->with('success', 'تم اضافة الفيديو بنجاح');
        } elseif ($request->playlist_id != null) {
            $playlistItems = Youtube::getPlaylistItemsByPlaylistId($request->playlist_id);
            $x = $course->videos->max('numbering') + 1;
            foreach ($playlistItems['results'] as $video) {
                $youtubeLecture = YoutubeLecture::create([
                    'course_id' => $course->id,
                    'video_id' => $video->snippet->resourceId->videoId,
                    'title' => $video->snippet->title,
                    'thumbnails' => $video->snippet->thumbnails->default->url,
                    'channel_title' => $video->snippet->channelTitle,
                    'numbering' => $x,
                ]);
                $x++;
            }
            return back()->with('success', 'تم اضافة الفيديو بنجاح');
        }
        return back()->with('failed', 'الرجاء تعبئة اي خيار قبل الاضافة');
    }

    public function destroy(YoutubeLecture $youtubeLecture)
    {
        $youtubeLecture->delete();
        return back()->with('failed', 'تم حذف الفيديو بنجاح');
    }

    public function renumbering(Course $course)
    {
        $youtubeVideos = YoutubeLecture::whereCourseId($course->id)->orderBy('numbering')->get();
        $number = 1;
        foreach ($youtubeVideos as $video) {
            $video->update(['numbering' => $number]);
            $number++;
        }
        return back()->with('success', 'تم اعادة الترقيم بنجاح');
    }

    public function views(YoutubeLecture $youtubeLecture)
    {
        $video = YoutubeLecture::with('views')->findOrFail($youtubeLecture->id);

        return view('admin.courses.youtube-lectures.views', compact('video'));
    }
}
