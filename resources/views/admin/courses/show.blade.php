@extends('layouts.admin.app')
@section('title')
    دورة {{ $course->name ?? $course->name_en }}
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}});background-size: cover;"></div>

        <div class="card-body position-relative">
            <h2 class="mb-0 text-center mb-5" data-anchor="data-anchor">
                {{$course->name}}
            </h2>
            @if(session('success'))
                <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                    <div class="bg-success me-3 icon-item"><span
                                class="fas fa-check-circle text-white fs-3"></span></div>
                    <p class="mb-0 flex-1">{{session('success')}}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('failed'))
                <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                    <div class="bg-danger me-3 icon-item"><span
                                class="fas fa-times-circle text-white fs-3"></span></div>
                    <p class="mb-0 flex-1">{{session('failed')}}
                    </p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-4">
                    <p><span class="fw-bold">الاسم بالعربي:- </span> <span>{{$course->name?? '-'}}</span></p>
                </div>
                <div class="col-4">
                    <p><span class="fw-bold">الاسم بالانجليزي:- </span> <span>{{$course->name_en?? '-'}}</span></p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">بدء الدورة:- </span> <span>{{$course->from ?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">اسم المدرب بالعربي:- </span> <span>{{$course->instructor?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">اسم المدرب بالانجليزي:- </span>
                        <span>{{$course->instructor_en?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">انتهاء الدورة:- </span> <span>{{$course->to ?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">تاريخ اصدار الشهادة:- </span>
                        <span>{{$course->publishdate?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">عدد الساعات:- </span> <span>{{$course->hours?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">عدد الايام:- </span> <span>{{$course->days?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">عدد المتدربين:- </span> <span>{{$course->students->count()}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">التخصص:- </span> <span>{{$course->category->title?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">سعر الدورة:- </span> <span>{{$course->price ?? '-'}}</span>
                    </p>
                </div>
                <div class="col-4">
                    <p>
                        <span class="fw-bold">السعر الاجمالي للدورة:- </span>
                        <span>{{$course->price * $course->students->count() ?? '-'}}</span>
                    </p>
                </div>
                <div class="col-8">
                    <p>
                        <span class="fw-bold">وصف الدورة:- </span> <span>{{$course->description ?? '-'}}</span>
                    </p>
                </div>
            </div>
            <hr>
            <div class="row py-md-5 ">
                <div class="col-12 col-md-6">
                    <header class=" text-center">
                        <h2 class="text-center" data-anchor="data-anchor">
                            قسم المحاضرات (YouTube)
                        </h2>
                        <a href="{{route('admin.course.youtube_lectures.index',$course)}}"
                           class="btn btn-falcon-danger my-3">عرض</a>
                    </header>
                </div>
                <hr class="d-block d-md-none">

                <div class="col-12 col-md-6">
                    <header class=" text-center">
                        <h2 class="text-center" data-anchor="data-anchor">
                            قسم المحاضرات (Zoom)
                        </h2>
                        <a href="{{route('admin.course.lectures.index',$course)}}" class="btn btn-falcon-primary my-3">عرض</a>
                    </header>
                </div>
            </div>
            <hr>
            <div class="row py-md-5">
                <div class="col-12 col-md-6 text-center">
                    <h2 class="mb-0  " data-anchor="data-anchor">
                        تصميم الدورة
                    </h2>
                    <div class="card-body d-flex justify-content-center align-items-center gap-5">
                        @if(!$course->design)
                            <a href="{{route('admin.course.design.create',$course)}}"
                               class="btn btn-falcon-warning ">انشاء التصميم </a>
                        @else
                            <a href="{{route('admin.course.design.show',[$course,$course->design])}}"
                               class="btn btn-falcon-primary">عرض التصميم </a>
                            <p class="m-0">أو</p>
                            <a href="{{route('admin.course.design.destroy',$course->design)}}"
                               class="btn btn-falcon-danger">حذف التصميم </a>
                        @endif
                    </div>
                </div>
                <hr class="d-block d-md-none">
                <div class="col-12 col-md-6 text-center">
                    <h2 class="mb-0  " data-anchor="data-anchor">
                        امتحان الدورة
                    </h2>
                    <div class="card-body d-flex justify-content-center align-items-center gap-5">
                        @if(!$course->exam)
                            <a href="{{route('admin.course.exams.create',$course)}}"
                               class="btn btn-falcon-success ">انشاء الامتحان </a>
                        @else
                            <a href="{{route('admin.course.exams.create',$course)}}"
                               class="btn btn-falcon-primary">عرض الامتحان </a>
                            <p class="m-0">أو</p>
                            <a href="{{route('admin.course.exams.destroy',$course->exam)}}"
                               onclick="confirm('هل تود حذف الامتحان ؟')"
                               class="btn btn-falcon-danger">حذف الامتحان </a>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="row py-md-5 ">
                <div class="col-12 col-md-6 text-center">
                    <h2 class="mb-0  " data-anchor="data-anchor">
                        قسم البريد الاكتروني
                    </h2>
                    <div class="card-body d-flex justify-content-center align-items-center gap-5">
                        <a href="{{route('admin.course.send_mails',$course)}}" class="btn btn-outline-twitter">بريد
                            لاستلام الشهادة عند الانتهاء</a>
                        <a href="{{route('admin.course.mails_new_course',$course)}}" class="btn btn-outline-facebook">
                            اعلان الدورة للمشتركين
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center">
                    <h2 class="mb-0  " data-anchor="data-anchor">
                        قسم تقارير Excel
                    </h2>
                    <div class="card-body d-flex justify-content-center align-items-center gap-5">
                        <a href="{{route('admin.course.student.export',$course)}}" class="btn btn-outline-success">استخراج
                            بيانات الطلاب</a>
                    </div>
                </div>
            </div>

                        <hr>
                        <div class="row py-md-5 ">

                            <div class="col-12 col-md-6 mx-auto text-center">
                                <h2 class="mb-0  " data-anchor="data-anchor">
                                    قسم استخراج شهادات جميع الطلاب PDF
                                </h2>
                                <div class="card-body d-flex justify-content-center align-items-center gap-5">
                                    <a href="{{route('admin.course.student.pdf_certification_export_all',$course)}}" class="btn btn-outline-primary">استخراج الشهادات</a>
                                </div>
                            </div>
                        </div>

            @if($course->ratings()->count()>0)
                <hr>
                <div class="row text-center">
                    <h2 class="mb-0  " data-anchor="data-anchor">
                        تقييمات الدورة
                    </h2>
                    <div class="card-body d-md-flex justify-content-center align-items-center gap-5">
                        <div class="col-12 col-md-5 border border-secondary rounded-3 d-flex justify-content-around align-items-center gap-4 p-3">
                            <div class="w-100">
                                <ul class="list-unstyled m-0 ">
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <span>1</span>
                                            <div class="progress w-100 " style="height:15px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width:{{($course->ratings()->where('value',1)->count()/$course->ratings()->count()) * 100}}%;"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100">{{$course->ratings()->where('value',1)->count()}}</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <span>2</span>
                                            <div class="progress w-100" style="height:15px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width:{{($course->ratings()->where('value',2)->count()/$course->ratings()->count()) * 100}}%;"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100">{{$course->ratings()->where('value',2)->count()}}</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <span>3</span>
                                            <div class="progress w-100" style="height:15px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width:{{($course->ratings()->where('value',3)->count()/$course->ratings()->count()) * 100}}%;"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100">{{$course->ratings()->where('value',3)->count()}}</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        {{--                                            @dd($course->ratings()->where('value',4)->count())--}}
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <span>4</span>
                                            <div class="progress w-100" style="height:15px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width:{{($course->ratings()->where('value',4)->count()/$course->ratings()->count()) * 100}}%;"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100">{{$course->ratings()->where('value',4)->count()}}</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <span>5</span>
                                            <div class="progress w-100" style="height:15px">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width:{{($course->ratings()->where('value',5)->count()/$course->ratings()->count()) * 100}}%;"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100">{{$course->ratings()->where('value',5)->count()}}</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <div>
                                <header>التقييمات</header>
                                <main class="d-flex align-items-center justify-content-center fs-1 my-3 bg-soft-secondary rounded-circle "
                                      style="width: 100px;height: 100px;">
                                    5/{{round($course->ratings()->avg('value'),2,true)}}
                                    {{--                                        {{(float)$course->ratings()->sum('value')+3/($course->ratings()->count()+1)*5}}--}}
                                </main>
                                <footer class="fs--1">
                                    عدد التقييمات: {{$course->ratings()->count()}}
                                </footer>
                            </div>
                        </div>
                        <div>
                            <a href="{{route('admin.course.ratings.index',$course)}}" class="btn btn-outline-dark"> عرض
                                التقييمات </a>
                        </div>
                    </div>
                </div>
            @endif
            <hr>
            <div class="row text-center mb-2">
                <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
                    <h2 class="mb-0" data-anchor="data-anchor">
                        قسم المتدربين</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-sm-6 text-center mx-auto">
                    <p>إضافة المتدربين بواسطة ملف إكسل</p>
                    <form action="{{route('admin.course.student.store_excel',$course)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="customFile">رفع ملف الاكسل</label>
                            <input class="form-control" id="customFile" name="file" type="file"/>
                            <span>
                                    يجب ان تكون اعمدة ملف الاكسل:
                                    الاسم بالعربي, الاسم بالانجليزي, البريد الاكتروني, رقم الهاتف, رقم الهوية, الجنسية بالعربي, الجنسية بالانجليزية.
                                    <br>
                                    في حال كان احد الاعمدة غير مطلوب فليبقى العمود فارغا.
                                </span>
                        </div>
                        <div class="col-12 d-flex mt-5">
                            <button class="btn btn-primary col-6 col-sm-4 mx-auto" type="submit">حفظ</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-sm-6 text-center mx-auto">
                    <p>إضافة المتدربين يدويا</p>

                    <div class="text-center py-3">
                        <a class="btn btn-falcon-primary btn-lg" href="#" data-bs-toggle="modal"
                           data-bs-target="#exampleModal">اضافة طالب</a>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header bg-card-gradient light">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">إضافة طالب</h5>
                                    <button class="btn-close btn-close-white text-white" type="button"
                                            data-bs-dismiss="modal" aria-label="Close">

                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 " action="{{route('admin.course.student.store',$course)}}"
                                          method="post">
                                        @csrf
                                        <div class="col-lg-12">
                                            <label class="form-label" for="name">اسم المتدرب بالعربي</label>
                                            <input class="form-control" id="name" name="name" type="text" value=""/>
                                        </div>
                                        @error('name')
                                        <span class="alert alert-danger" role="alert">{{$message}}</span>
                                        @enderror
                                        <div class="col-lg-12">
                                            <label class="form-label" for="name_en">اسم المتدرب بالانجليزي</label>
                                            <input class="form-control" id="name_en" name="name_en" type="text"
                                                   value=""/>
                                        </div>
                                        @error('name_en')
                                        <span class="alert alert-danger" role="alert">{{$message}}</span>
                                        @enderror
                                        <div class="col-lg-12">
                                            <label class="form-label" for="email">البريد الالكتروني</label>
                                            <input class="form-control" id="email" name="email" type="email"
                                                   value=""/>
                                        </div>
                                        @error('email')
                                        <span class="alert alert-danger" role="alert">{{$message}}</span>
                                        @enderror
                                        <div class="col-lg-12">
                                            <label class="form-label" for="phone">رقم الهاتف</label>
                                            <input class="form-control" id="phone" name="phone" type="text"
                                                   value=""/>
                                        </div>
                                        @error('phone')
                                        <span class="alert alert-danger" role="alert">{{$message}}</span>
                                        @enderror


                                        <div class="col-lg-12">
                                            <label class="form-label" for="id_number">رقم الهوية</label>
                                            <input class="form-control" id="id_number" name="id_number" type="text"
                                                   value=""/>
                                        </div>
                                        @error('id_number')
                                        <span class="alert alert-danger" role="alert">{{$message}}</span>
                                        @enderror
                                        <div class="col-lg-12">
                                            <label class="form-label" for="nationality">الجنسية بالعربي</label>
                                            <input class="form-control" id="nationality" name="nationality"
                                                   type="text" value=""/>
                                        </div>
                                        @error('nationality')
                                        <span class="alert alert-danger" role="alert">{{$message}}</span>
                                        @enderror
                                        <div class="col-lg-12">
                                            <label class="form-label" for="nationality_en">الجنسية
                                                بالانجليزي</label>
                                            <input class="form-control" id="nationality_en" name="nationality_en"
                                                   type="text" value=""/>
                                        </div>
                                        @error('nationality_en')
                                        <span class="alert alert-danger" role="alert">{{$message}}</span>
                                        @enderror

                                        <div class="col-12 d-flex mt-5">
                                            <button class="btn btn-primary col-6 col-sm-4 mx-auto" type="submit">
                                                حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-3">
                <div class="col-12 mx-auto ">
                    <p class="text-center fw-bold fs-3">المتدربين</p>
                    <div class="table-responsive">
                        <table class="table table-primary text-center align-middle">
                            <thead>
                            <tr>
                                <th>الاسم بالعربي</th>
                                <th>الاسم بالانجليزي</th>
                                <th>البريد الاكتروني</th>
                                <th>رقم الهاتف</th>
                                <th>رقم الهوية</th>
                                <th>الجنسية</th>
                                <th>الاعتماد</th>
                                @if($course->exam)
                                    <th>الدرجة</th>
                                @endif
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($course->students as $student)
                                <tr>
                                    <td>{{$student->name ??' - '}}</td>
                                    <td>{{$student->name_en ??' - '}}</td>
                                    <td>{{$student->email ??' - '}}</td>
                                    <td>{{$student->phone ??' - '}}</td>
                                    <td>{{$student->id_number ??' - '}}</td>
                                    <td>{{$student->nationality .'  '.$student->nationality_en }}</td>
                                    <td>
                                        @if($student->pivot->status)
                                            <i class="fas fa-check-circle text-success"></i>
                                        @else
                                            <i class="fas fa-times-circle text-danger"></i>
                                        @endif
                                    </td>
                                    @if($course->exam)
                                        <td class="@if($student->exams->first()->pivot->grade??0 >= (int)$course->exam->pass_mark) text-success @else text-danger @endif ">
                                            {{$student->exams->first()->pivot->grade??'-'}}
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin.course.student.destroy',[$student,$course])}}"
                                           class="btn btn-outline-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <a href="{{route('admin.students.edit',$student)}}"
                                           class="btn btn-outline-primary">
                                            <i class="fas fa-paint-brush"></i>
                                        </a>

                                        <a href="{{route('admin.course.student.pdf_certification',[$course,$student])}}"
                                           target="_blank" class="btn btn-outline-dark">
                                            <i class="fas fa-certificate"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection