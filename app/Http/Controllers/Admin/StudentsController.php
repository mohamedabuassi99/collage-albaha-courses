<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($request->search) {
            $students = Student::with('courses')
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('name_en', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $students = Student::with('courses')->paginate(10);
        }
        return view('admin.students.index', compact('students', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::whereEmail($request->email)->first();
        $request->validate([
            'name' => 'nullable|min:2',
            'name_en' => 'nullable|min:2',
            'email' => 'required|unique:students,email,'.@$student->id,
            'id_number' => 'numeric',
            'nationality' => 'nullable',
            'nationality_en' => 'nullable',
            'phone' => 'nullable|numeric|digits_between:8,14',
        ]);
        if ($student) {
            $student->update([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'id_number' => $request->id_number,
                'nationality' => $request->nationality,
                'nationality_en' => $request->nationality_en,
                'phone' => $request->phone,
                'status' => false,
            ]);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'id_number' => $request->id_number,
                'nationality' => $request->nationality,
                'nationality_en' => $request->nationality_en,
                'phone' => $request->phone,
                'status' => false,
            ]);
        }
        $admin = auth()->user()->hasRole('admin');
        if ($admin) {
            $student->update([
                'status' => true
            ]);
        }
        return back()->with('success', 'تم اضافة الطالب بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'nullable|min:2',
            'name_en' => 'nullable|min:2',
            'email' => 'required|unique:students,email,'.@$student->id,
            'id_number' => 'numeric',
            'nationality' => 'nullable',
            'nationality_en' => 'nullable',
            'phone' => 'nullable|numeric|digits_between:8,14',
        ]);
        $student->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'email' => $request->email,
            'id_number' => $request->id_number,
            'nationality' => $request->nationality,
            'nationality_en' => $request->nationality_en,
            'phone' => $request->phone,
            'status' => false,
        ]);
        $admin = auth()->user()->hasRole('admin');
        if ($admin) {
            $student->update([
                'status' => true
            ]);
        }
        return back()->with('success', 'تم تحديث بيانات الطالب بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('failed', 'تم حذف الطالب مؤقتا');
    }

    public function trash(Request $request)
    {
        if ($request->search) {
            $students = Student::onlyTrashed()->with('courses')->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $students = Student::onlyTrashed()->with('courses')->paginate(10);
        }
        return view('admin.students.trash', compact('students'));
    }

    public function restore($id)
    {
        Student::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'تم استرجاع الطالب بنجاح');
    }

    public function force_delete($id)
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('failed', 'تم حذف الطالب نهائيا');
    }
}
