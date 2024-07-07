<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ChangeStudentInformation;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        $student = Student::with('wantToChange')->find(auth('student')->id());
        return view('front.student.profile.profile', compact('student'));
    }

    public function update(Request $request)
    {
//        if (!empty($request->name) || !empty($request->name_en) || !empty($request->email) || !empty($request->id_number) || !empty($request->nationality) || !empty($request->nationality_en)) {
        $student = Student::find(auth('student')->id());

        $array = [
            'success' => null,
            'success_password' => null,
            'success_phone' => null,
            'failed' => null,
        ];
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $changeData = false;
        $updatePassword = false;

        if ($request->name != $student->name || $request->name_en != $student->name_en || $request->email != $student->email
            || $request->id_number != $student->id_number || $request->nationality != $student->nationality ||
            $request->nationality_en != $student->nationality_en) {

            $ChangeStudentInformation = ChangeStudentInformation::whereStudentId($student->id)->first();
            if ($ChangeStudentInformation) {
                $ChangeStudentInformation->update([
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'id_number' => $request->id_number,
                    'nationality' => $request->nationality,
                    'nationality_en' => $request->nationality_en,
                ]);

            } else {
                ChangeStudentInformation::create([
                    'student_id' => auth('student')->id(),
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'email' => $request->email,
                    'id_number' => $request->id_number,
                    'nationality' => $request->nationality,
                    'nationality_en' => $request->nationality_en,
                ]);
            }
            $changeData = true;

            if ($changeData) {
                $array['success'] = 'تم رفع البيانات بنجاح';

            }
        }
//        if (!empty($request->password) && !empty($request->password_confirmation)) {
//            $validator = Validator::make($request->except([$request->password, $request->password_confirmation]), [
//                'password' => 'required|min:6|confirmed'
//            ]);
//            if ($validator->fails() == false) {
//                $student = Student::find(auth('student')->id())->update(['password' => bcrypt($request->password)]);
//            } else {
//                return back();
//            }
//        }

        if (!empty($request->password) && !empty($request->password_confirmation)) {
            $validator = Validator::make($request->except([$request->password, $request->password_confirmation]), [
                'password' => 'required|min:6|confirmed'
            ]);
            if ($validator->fails() == false) {
                $student = Student::find(auth('student')->id())->update(['password' => bcrypt($request->password)]);
                if ($student) {
                    $updatePassword = true;
                }
            }
            if ($updatePassword) {
                $array['success_password'] = 'تم تغيير كلمة المرور بنجاح';

            } else {
                $array['failed'] = 'حدث خطأ اثناء تغيير كلمة المرور';

            }
        }
        //update phone
        if (!empty($request->phone) && $request->phone != $student->phone) {

            $request->validate([
                'phone' => 'nullable|numeric|digits_between:8,14',
            ]);
            $student->update(['phone' => $request->phone]);
            $array['success_phone'] = 'تم حفظ رقم الهاتف بنجاح';
        }
        return back()->with($array);
    }

    public function inputPassword()
    {
        return view('front.student.auth.input-password');
    }

    public function inputPasswordSubmit(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        $student = Student::find(auth('student')->id())->update(['password' => bcrypt($request->password)]);
        return redirect()->route('student.courses.index')->with('success', 'تمت العملية بنجاح ');
    }
}
