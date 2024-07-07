<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewCourseJob;
use App\Jobs\SendMails;
use App\Models\Attempt;
use App\Models\Category;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use App\Models\SubscriberNotice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mail;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            if ($request->search) {
                $courses = Course::with(['user', 'students', 'category'])->where('name', 'like', '%' . $request->search . '%')->paginate(10);
            } else {
                $courses = Course::with(['user', 'students', 'category'])->orderByDesc('id')->paginate(10);
            }
        } else {
            if ($request->search) {
                $courses = Course::with(['user', 'students', 'category'])->whereUserId(auth()->id())->where('name', 'like', '%' . $request->search . '%')->paginate(10);
            } else {
                $courses = Course::with(['user', 'students', 'category'])->whereUserId(auth()->id())->orderByDesc('id')->paginate(10);
            }
        }
        return view('admin.courses.index', compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|min:3',
            'name_en' => 'nullable|string|min:3',
            'instructor' => 'nullable|string|min:3',
            'instructor_en' => 'nullable|string|min:3',
            'days' => 'nullable|integer',
            'hours' => 'nullable|integer',
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
            'cover' => 'nullable|image',
            'price' => 'nullable|numeric|min:99',
            'publishdate' => 'nullable|date',
        ]);
        $course = Course::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'instructor' => $request->instructor,
            'instructor_en' => $request->instructor_en,
            'days' => $request->days,
            'hours' => $request->hours,
            'from' => $request->from,
            'to' => $request->to,
            'user_id' => auth()->id(),
            'status' => false,
            'show' => $request->show ?? false,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'publishdate' => $request->publishdate,

        ]);

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(500, 330, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->crop(500, 330);
            $course->update(['cover' => 'courses/cover/' . $fileName]);
            $img->stream();
            Storage::disk('public')->put('courses/cover/' . $fileName, $img, 'public');
        }

        if (auth()->user()->hasRole('admin')) {
            $course->update(['status' => 1]);
        }
        return back()->with('success', 'تم اضافة الدورة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course = Course::with(['user', 'students', 'students.exams' => function ($query) {
            if (Carbon::parse(now())->greaterThanOrEqualTo(@request()->course->exam->to) ?? false) {
                $query->where('course_id', request()->course->id)->each(function ($item) {
                    if ($item->pivot->grade == null || $item->pivot->finish == null) {
                        $attempt = Attempt::where(['exam_id' => request()->course->exam->id,
                            'student_id' => $item->pivot->student_id])->orderByDesc('id')->first();
                        if (!$item->pivot->grade) {
                            $attempt->update([
                                'grade' => $attempt->grade(),
                            ]);
                        }
                        if (!$item->pivot->finish) {
                            $attempt->update([
                                'finish' => $attempt->exam->to,
                            ]);
                        }
                    }
                });
            } else {
                $query->where('course_id', request()->course->id);
            }
        }, 'category', 'design'])->whereId($course->id)->first();


        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'nullable|string|min:3',
            'name_en' => 'nullable|string|min:3',
            'instructor' => 'nullable|string|min:3',
            'instructor_en' => 'nullable|string|min:3',
            'days' => 'nullable|integer',
            'hours' => 'nullable|integer',
            'publishdate' => 'nullable|date',
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
            'cover' => 'nullable|image',
            'price' => 'nullable|numeric|min:99',
        ]);
        $course->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'instructor' => $request->instructor,
            'instructor_en' => $request->instructor_en,
            'days' => $request->days,
            'hours' => $request->hours,
            'from' => $request->from,
            'to' => $request->to,
            'user_id' => auth()->id(),
            'status' => false,
            'show' => $request->show ?? false,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'publishdate' => $request->publishdate,

        ]);


        if ($request->hasFile('cover')) {

            $coverName = str_replace('/storage', '', $course->image);
            if (Storage::disk('public')->exists($coverName)) {
                Storage::disk('public')->delete($coverName);
            }
            Storage::delete('/public' . $coverName);


            $image = $request->file('cover');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(500, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->crop(500, 300);
            $course->update(['cover' => 'courses/cover/' . $fileName]);
            $img->stream();
            Storage::disk('public')->put('courses/cover/' . $fileName, $img, 'public');
        }

        if (auth()->user()->hasRole('admin')) {
            $course->update(['status' => 1]);
        }
        return back()->with('success', 'تم تحديث الدورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('failed', 'تم حذف الدورة مؤقتا');
    }

    public function restore($id)
    {
        Course::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'تم استرجاع الدورة بنجاح');

    }

    public function force_delete($id)
    {
        Course::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('failed', 'تم حذف الدورة نهائيا');
    }

    public function trash(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            if ($request->search) {
                $courses = Course::onlyTrashed()->where('name', 'like', '%' . $request->search . '%')->paginate(10);
            } else {
                $courses = Course::onlyTrashed()->orderByDesc('id')->paginate(10);
            }
        } else {
            if ($request->search) {
                $courses = Course::onlyTrashed()->whereUserId(auth()->id())->where('name', 'like', '%' . $request->search . '%')->paginate(10);
            } else {
                $courses = Course::onlyTrashed()->whereUserId(auth()->id())->orderByDesc('id')->paginate(10);
            }
        }
        return view('admin.courses.trash', compact('courses'));
    }

    public function send_mails(Course $course)
    {
        try {

            $registrations = Registration::with(['course', 'student'])->whereCourseId($course->id)->get();
            foreach ($registrations->chunk(5) as $registration) {
                dispatch(new SendMails($registrations));
            }


        } catch (\Exception $e) {
            return back()->with('failed', 'حدث خطأ ما');
        }
        return back()->with('success', 'تم الارسال لجميع الطلاب بنجاح');
    }

    public function mails_new_course(Course $course)
    {
        try {
            $subscribers = SubscriberNotice::all();
            foreach ($subscribers->chunk(5) as $subscriber) {
                dispatch(new NewCourseJob($subscriber, $course));
            }
        } catch (\Exception $e) {
            return back()->with('failed', 'حدث خطأ ما');
        }
        return back()->with('success', 'تم الارسال لجميع المشتركين بنجاح');

    }
}
