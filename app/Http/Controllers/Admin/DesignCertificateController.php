<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\DesignCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class DesignCertificateController extends Controller
{


    public function create(Course $course)
    {
        return view('admin.courses.design.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        if ($course->design != null) {
            return back()->with('failed', 'يوجد تصميم سابق يرجى التعديل او حذف التصميم السابق للتمكن من اضافة واحد جديد');
        }
        if ($request->type == "ar") {
            $ModelsReadyDesignCertificate = DesignCertificate::create([
                'course_id' => $course->id,
                'type' => $request->type,
                'title_ar' => $request->title_ar,
                'before_student_name_ar' => $request->before_student_name_ar,
                'before_course_name_ar' => $request->before_course_name_ar,
                'describe_hour_ar' => $request->describe_hour_ar,
                'describe_name_jaha' => $request->describe_name_jaha_ar,
                'name_jaha' => $request->name_jaha_ar,
                'describe_name_instructor' => $request->describe_name_instructor_ar,
                'start_date_ar' => $request->start_date_ar,
                'end_date_ar' => $request->end_date_ar,
                'descripe_certificate_id_ar' => $request->descripe_certificate_id_ar,
                'describe_qr' => $request->describe_qr_ar,
            ]);
            if ($request->hasFile('image_ar')) {
                $image = $request->file('image_ar');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('100', '800');
                $ModelsReadyDesignCertificate->update(['image' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_top_right')) {
                $image = $request->file('image_corner_top_right');
                $fileName = time() . 'image_corner_top_right' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_top_right' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_top_left')) {
                $image = $request->file('image_corner_top_left');
                $fileName = time() . 'image_corner_top_left' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_top_left' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_bottom_right')) {
                $image = $request->file('image_corner_bottom_right');
                $fileName = time() . 'image_corner_bottom_right' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_bottom_right' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            return redirect(route('admin.course.show', $course))->with('success', 'تم إضافة التصميم بنجاح');
        } elseif ($request->type == "en") {
            $ModelsReadyDesignCertificate = DesignCertificate::create([
                'course_id' => $course->id,
                'type' => $request->type,
                'title_en' => $request->title_en,
                'before_student_name_en' => $request->before_student_name_en,
                'before_course_name_en' => $request->before_course_name_en,
                'describe_hour_en' => $request->describe_hour_en,
                'describe_name_jaha' => $request->describe_name_jaha_en,
                'name_jaha' => $request->name_jaha_en,
                'describe_name_instructor' => $request->describe_name_instructor_en,
                'start_date_en' => $request->start_date_en,
                'end_date_en' => $request->end_date_en,
                'descripe_certificate_id_en' => $request->descripe_certificate_id_en,
                'describe_qr' => $request->describe_qr_en,
            ]);
            if ($request->hasFile('image_en')) {
                $image = $request->file('image_en');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('1000', '800');
                $ModelsReadyDesignCertificate->update(['image' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_top_right_en')) {
                $image = $request->file('image_corner_top_right_en');
                $fileName = time() . 'image_corner_top_right' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_top_right' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_top_left_en')) {
                $image = $request->file('image_corner_top_left_en');
                $fileName = time() . 'image_corner_top_left' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_top_left' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_bottom_right_en')) {
                $image = $request->file('image_corner_bottom_right_en');
                $fileName = time() . 'image_corner_bottom_right' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_bottom_right' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            return redirect(route('admin.course.show', $course))->with('success', 'تم إضافة التصميم بنجاح');

        } elseif ($request->type == "ar_en") {
            $ModelsReadyDesignCertificate = DesignCertificate::create([
                'course_id' => $course->id,
                'type' => $request->type,
                'title_ar' => $request->title_ar_en_ar,
                'title_en' => $request->title_ar_en_en,
                'before_student_name_ar' => $request->before_student_name_ar_en_ar,
                'before_student_name_en' => $request->before_student_name_ar_en_en,
                'before_course_name_ar' => $request->before_course_name_ar_en_ar,
                'before_course_name_en' => $request->before_course_name_ar_en_en,
                'describe_hour_ar' => $request->before_number_of_hour_ar_en_ar,
                'describe_hour_en' => $request->before_number_of_hour_ar_en_en,
                'end_date_ar' => $request->end_date_ar_en_ar,
                'end_date_en' => $request->end_date_ar_en_en,
                'note_ar' => $request->notes_ar_en_ar,
                'note_en' => $request->notes_ar_en_en,
                'describe_qr' => $request->describe_qr_ar_en,
            ]);
            if ($request->hasFile('image_ar_en')) {
                $image = $request->file('image_ar_en');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('1000', '800');
                $ModelsReadyDesignCertificate->update(['image' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }

            if ($request->hasFile('image_corner_top_right_ar_en')) {
                $image = $request->file('image_corner_top_right_ar_en');
                $fileName = time() . 'image_corner_top_right' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_top_right' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_top_left_ar_en')) {
                $image = $request->file('image_corner_top_left_ar_en');
                $fileName = time() . 'image_corner_top_left' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_top_left' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_bottom_right_ar_en')) {
                $image = $request->file('image_corner_bottom_right_ar_en');
                $fileName = time() . 'image_corner_bottom_right' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_bottom_right' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            if ($request->hasFile('image_corner_bottom_left_ar_en')) {
                $image = $request->file('image_corner_bottom_left_ar_en');
                $fileName = time() . 'image_corner_bottom_left' . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize('600', '600');
                $ModelsReadyDesignCertificate->update(['image_corner_bottom_left' => 'courses/certificate/' . $fileName]);
                $img->stream();
                Storage::disk('public')->put('courses/certificate/' . $fileName, $img, 'public');
            }
            return redirect(route('admin.course.show', $course))->with('success', 'تم إضافة التصميم بنجاح');
        }
        abort(404);
    }

    public function destroy(DesignCertificate $designCertificate)
    {
        $certificate_name = str_replace('/storage', '', $designCertificate->image);
        if (Storage::disk('public')->exists($certificate_name)) {
            Storage::disk('public')->delete($certificate_name);
        }
        $certificate_name = str_replace('/storage', '', $designCertificate->image_corner_top_right);
        if (Storage::disk('public')->exists($certificate_name)) {
            Storage::disk('public')->delete($certificate_name);
        }
        $certificate_name = str_replace('/storage', '', $designCertificate->image_corner_top_left);
        if (Storage::disk('public')->exists($certificate_name)) {
            Storage::disk('public')->delete($certificate_name);
        }
        $certificate_name = str_replace('/storage', '', $designCertificate->image_corner_bottom_right);
        if (Storage::disk('public')->exists($certificate_name)) {
            Storage::disk('public')->delete($certificate_name);
        }
        $certificate_name = str_replace('/storage', '', $designCertificate->image_corner_bottom_left);
        if (Storage::disk('public')->exists($certificate_name)) {
            Storage::disk('public')->delete($certificate_name);
        }

        $designCertificate->delete();
        return back()->with('failed', 'تم حذف التصميم بنجاح');
    }


    public function show(Course $course, DesignCertificate $designCertificate)
    {
        return view('admin.courses.design.show', compact('course', 'designCertificate'));
    }

}
