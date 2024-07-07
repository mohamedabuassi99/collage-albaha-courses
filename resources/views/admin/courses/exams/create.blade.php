@extends('layouts.admin.app')
@section('title')
    امتحان دورة {{$course->name}}
@endsection
@push('css')
    <link href="{{asset('admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet"/>

@endpush
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <h2 class="mb-0 text-center mb-4">
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
            </div>
            <form action="{{route('admin.course.exams.store',$course)}}" method="post">
                @csrf
                <div class="row mx-md-7">
                    <p class="fs-3 text-center text-dark">بيانات الامتحان</p>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label" for="title">عنوان الامتحان</label>
                        <input class="form-control" name="title" value="{{old('title')?? @$course->exam->title}}"
                               id="title" min="0"
                               type="text"
                               placeholder="عنوان الامتحان"/>
                        @error('title')
                        <span class="text-danger d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 mb-3  form-check form-switch mt-2">
                        <label class="form-check-label" for="review">مراجع الامتحان</label>
                        <input class="form-check-input" name="review"
                               id="review" @if($course->exam->review??false) checked
                               @elseif($course->exam->review??false == false)  @endif
                               type="checkbox" value="1"
                               placeholder="مراجعة الامتحان"/>
                        <p>عرض نتائج الطالب بعد انتهاء مدة الامتحان</p>
                        @error('review')
                        <span class="text-danger d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 ">
                        <label class="form-label" for="final_mark">الدرجة النهائية</label>
                        <input class="form-control" name="final_mark"
                               value="{{old('final_mark')?? @$course->exam->final_mark}}"
                               id="final_mark" min="0"
                               type="text"
                               placeholder="الدرجة النهائية"/>
                        <p class="text-center">مثال: 100%/</p>
                        @error('final_mark')
                        <span class="text-danger d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 ">
                        <label class="form-label" for="pass_mark">الحد الادنى للنجاح</label>
                        <input class="form-control " name="pass_mark"
                               value="{{old('pass_mark')?? @$course->exam->pass_mark}}"
                               id="pass_mark" min="0"
                               type="text"
                               placeholder="الحد الادنى للنجاح"/>
                        <p class="text-center">مثال: 60/100</p>
                        @error('pass_mark')
                        <span class="text-danger d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 ">
                        <label class="form-label" for="per_page">عدد الاسئلة للصفحة الواحد داخل الاختبار</label>
                        <input class="form-control " name="per_page"
                               value="{{old('per_page')?? @$course->exam->per_page}}"
                               id="per_page" min="0"
                               type="text"
                               placeholder="عدد اسئلة الاختبار بالصفحة"/>
                        <p class="text-center">مثال: 3 اسئلة بكل واجهة</p>
                        @error('per_page')
                        <span class="text-danger d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label" for="from">بداية الامتحان</label>
                        <input class="form-control datetimepicker" type="text" name="from"
                               value="{{old('from')?? @$course->exam->from}}"
                               id="from"
                               data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}'
                               placeholder="بداية الامتحان"/>
                        @error('from')
                        <span class="text-danger d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label" for="to">نهاية الامتحان</label>
                        <input class="form-control datetimepicker" type="text" name="to"
                               value="{{old('to')?? @$course->exam->to}}"
                               id="to"
                               data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}'
                               placeholder="نهاية الامتحان"/>
                        @error('to')
                        <span class="text-danger d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="col-12 text-center">
                        <button class="btn btn-falcon-info col-5 my-4">حفظ</button>
                    </div>

                </div>
            </form>

            @if($course->exam)
                <hr class="my-4">

                <div class="position-md-absolute text-center text-md-start border border-secondary  rounded-3 p-2">
                    <p><span class="fw-bolder">عدد الاسئلة:</span> <span>{{$course->exam->questions->count()}}</span>
                    </p>
                    <p><span class="fw-bolder">مدة الامتحان:</span> <span>{{Carbon\Carbon::create($course->exam->from)->diffInMinutes($course->exam->to)}}  دقيقة</span>
                    </p>
                    {{--                    <p><span class="fw-bolder">مجموع علامات الاسئلة:</span> <span--}}
                    {{--                                class="@if($course->exam->questions->sum('mark') == $course->exam->final_mark) text-success @else text-danger @endif ">{{$course->exam->questions->sum('mark') .' / '.$course->exam->final_mark }}</span>--}}
                    {{--                    </p>--}}
                    <p>
                        يتم توزيع الاسئلة بشكل عشوائي للطالب.
                    </p>
                </div>
                <p class="fs-3 text-center text-dark"> اسئلة الاختبار</p>
                <div class="d-flex justify-content-center gap-3">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal"
                            data-bs-target="#true_of_false">صح او خطأ
                    </button>
                    <div class="modal fade " id="true_of_false" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document"
                             style="width: 700px; margin: auto; max-width: 90%">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('admin.course.exams.questions.store',$course->exam)}}"
                                      method="post">

                                    <div class="modal-body p-0">
                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                            <h4 class="mb-1" id="modalExampleDemoLabel"> اضافة سؤال صح ام خطأ </h4>
                                        </div>
                                        <div class="p-4 pb-0">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="question_true">السؤال:</label>
                                                <textarea class="form-control" id="question_true"
                                                          name="question" required></textarea>
                                            </div>
                                            <input type="hidden" name="q_type" value="true_or_false">

                                            <div class="mb-3">
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <div>
                                                        <p class="text-center fs-3">الاجابة</p>

                                                        <div class="d-flex gap-2 align-items-center">
                                                            <div>
                                                                <input type="radio" class="btn-check" name="answer"
                                                                       required
                                                                       id="true" value="صح" autocomplete="off">
                                                                <label class="btn btn-outline-success"
                                                                       for="true">صح</label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" class="btn-check" name="answer"
                                                                       required
                                                                       id="false" value="خطأ" autocomplete="off">
                                                                <label class="btn btn-outline-danger"
                                                                       for="false">خطأ</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="col-form-label"
                                                               for="mark">عدد العلامات على السؤال</label>
                                                        <input class="form-control w-auto" id="mark" name="mark" min="1"
                                                               {{--                                                               max="{{$course->exam->final_mark - $course->exam->questions->sum('mark')}}"--}}
                                                               value="1" type="number"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء
                                        </button>
                                        <button class="btn btn-primary" type="submit">إضافة</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#choose">
                        اختيارات متعددة
                    </button>
                    <div class="modal fade" id="choose" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document"
                             style="width: 700px; margin: auto; max-width: 90%">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('admin.course.exams.questions.store',$course->exam)}}"
                                      method="post">
                                    @csrf
                                    <div class="modal-body p-0">
                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                            <h4 class="mb-1" id="modalExampleDemoLabel">اختيار متعدد </h4>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="question_true">السؤال:</label>
                                                <textarea class="form-control" id="question_true"
                                                          name="question" required></textarea>
                                            </div>
                                            <input type="hidden" name="q_type" value="mcq">
                                            <div class="mb-3">
                                                <p class="text-center fs-3">الاجابة</p>
                                                <div class="btn-group-vertical w-100" role="group"
                                                     aria-label="Basic radio toggle button group">

                                                    <div class="w-100 d-flex align-items-center gap-3">
                                                        <input type="radio" class=" " required name="answer" value="0"
                                                               id="btnradio1"
                                                               autocomplete="off">
                                                        <label class="w-100" for="btnradio1">
                                                            <input type="text" class="form-control mx-auto"
                                                                   name="options[]" id="">
                                                        </label>
                                                    </div>

                                                    <div class="w-100 d-flex align-items-center gap-3">
                                                        <input type="radio" class=" " required name="answer" value="1"
                                                               id="btnradio2"
                                                               autocomplete="off">
                                                        <label class="w-100" for="btnradio2">
                                                            <input type="text" class="form-control mx-auto"
                                                                   name="options[]" id="">
                                                        </label>
                                                    </div>

                                                    <div class="w-100 d-flex align-items-center gap-3">
                                                        <input type="radio" class=" " required name="answer" value="2"
                                                               id="btnradio3"
                                                               autocomplete="off">
                                                        <label class="w-100" for="btnradio3">
                                                            <input type="text" class="form-control mx-auto"
                                                                   name="options[]" id="">
                                                        </label>
                                                    </div>

                                                    <div class="w-100 d-flex align-items-center gap-3">
                                                        <input type="radio" class=" " required name="answer" value="3"
                                                               id="btnradio4"
                                                               autocomplete="off">
                                                        <label class="w-100" for="btnradio4">
                                                            <input type="text" class="form-control mx-auto"
                                                                   name="options[]" id="">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label"
                                                       for="mark">عدد العلامات على السؤال</label>
                                                <input class="form-control w-auto" id="mark" name="mark" min="1"
                                                       {{--                                                       max="{{$course->exam->final_mark - $course->exam->questions->sum('mark')}}"--}}
                                                       value="1" type="number"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء
                                        </button>
                                        <button class="btn btn-primary" type="submit">إضافة</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  mt-5 p-md-4 rounded-3 ">
                    @foreach($course->exam->questions as $question)
                        {{--                    @if(!$loop->first)--}}
                        {{--                            <hr class="text-secondary">--}}
                        {{--                        @endif--}}
                        <div class="col-12 ">
                            <div class=" border-secondary bg-light p-3 mb-3 rounded-3"
                                 style="box-shadow: 3px 4px 10px 1px rgba(25,41,121,0.2);">
                                <div class="border-bottom border-secondary pb-3 d-md-flex justify-content-between align-items-center ">
                                    <p class="text-black  fs-2 mb-0 d-flex align-items-center justify-content-between w-100">
                                        <span>{{$loop->index+1}} - {{$question->question}}</span>
                                        <span class=" fs--1 float-end  mx-3">({{$question->mark}} العلامات)</span>
                                    </p>
                                    <div class="d-md-flex text-center justify-content-md-center align-items-md-center gap-2">

                                        <button class=" btn btn-outline-primary rounded-pill " type="button"
                                                data-bs-toggle="modal"
                                                @if($question->q_type== 1 ) data-bs-target="#true_of_false-{{$loop->index}}"
                                                @elseif($question->q_type == 0) data-bs-target="#mcq-{{$loop->index}}" @endif>
                                            تعديل
                                        </button>
                                        <a href="{{route('admin.course.exams.questions.destroy',$question)}}"
                                           class=" btn btn-outline-danger rounded-pill ">حذف</a>
                                    </div>
                                </div>
                                <ul class="list-unstyled px-4 mt-3 row">
                                    @foreach(json_decode($question->options) as $index => $option)
                                        @if($option != null)
                                            <li class="col-md-6 col-12">{{$loop->index+1}} - <span
                                                        class="@if($question->answers == $option) text-success text-decoration-underline fw-bolder @endif">{{$option}}</span>
                                            </li>
                                        @endif

                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        @if($question->q_type == 1)
                            <div class="modal fade " id="true_of_false-{{$loop->index}}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document"
                                     style="width: 700px; margin: auto; max-width: 90%">
                                    <div class="modal-content position-relative">
                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('admin.course.exams.questions.update',$question)}}"
                                              method="post">

                                            <div class="modal-body p-0">
                                                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                    <h4 class="mb-1" id="modalExampleDemoLabel"> اضافة سؤال صح ام
                                                        خطأ </h4>
                                                </div>
                                                <div class="p-4 pb-0">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="question_true">السؤال:</label>
                                                        <textarea class="form-control" id="question_true"
                                                                  name="question"
                                                                  required>{{$question->question}}</textarea>
                                                    </div>
                                                    <input type="hidden" name="q_type" value="true_or_false">

                                                    <div class="mb-3">
                                                        <div class="d-flex justify-content-around align-items-center">
                                                            <div>
                                                                <p class="text-center fs-3">الاجابة</p>

                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <div>
                                                                        <input type="radio" class="btn-check"
                                                                               name="answer" required
                                                                               id="true-{{$question->id}}"
                                                                               @if($question->answers == "صح") checked
                                                                               @endif
                                                                               value="صح" autocomplete="off">
                                                                        <label class="btn btn-outline-success"
                                                                               for="true-{{$question->id}}">صح</label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" class="btn-check"
                                                                               name="answer" required
                                                                               id="false-{{$question->id}}" value="خطأ"
                                                                               @if($question->answers == "خطأ") checked
                                                                               @endif
                                                                               autocomplete="off">
                                                                        <label class="btn btn-outline-danger"
                                                                               for="false-{{$question->id}}">خطأ</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label class="col-form-label"
                                                                       for="mark">عدد العلامات على السؤال</label>
                                                                <input class="form-control w-auto" id="mark" name="mark"
                                                                       min="1"
                                                                       max="100" value="{{$question->mark ?? 1}}"
                                                                       type="number"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                                    الغاء
                                                </button>
                                                <button class="btn btn-primary" type="submit">تحديث</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @elseif($question->q_type == 0)
                            <div class="modal fade" id="mcq-{{$loop->index}}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document"
                                     style="width: 700px; margin: auto; max-width: 90%">
                                    <div class="modal-content position-relative">
                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('admin.course.exams.questions.update',$question)}}"
                                              method="post">
                                            @csrf
                                            <div class="modal-body p-0">
                                                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                    <h4 class="mb-1" id="modalExampleDemoLabel">اختيار متعدد </h4>
                                                </div>
                                                <div class="p-4 pb-0">
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="question_true">السؤال:</label>
                                                        <textarea class="form-control" id="question_true"
                                                                  name="question"
                                                                  required>{{$question->question}}</textarea>
                                                    </div>
                                                    <input type="hidden" name="q_type" value="mcq">
                                                    <div class="mb-3">
                                                        <p class="text-center fs-3">الاجابة</p>
                                                        <div class="btn-group-vertical w-100" role="group"
                                                             aria-label="Basic radio toggle button group">

                                                            @foreach(json_decode($question->options) as $option)
                                                                <div class="w-100 d-flex align-items-center gap-3">
                                                                    <input type="radio"
                                                                           @if($question->answers == $option) checked
                                                                           @endif required name="answer"
                                                                           value="{{$loop->index}}"
                                                                           id="btnradio-{{$loop->index}}"
                                                                           autocomplete="off">
                                                                    <label class="w-100"
                                                                           for="btnradio-{{$loop->index}}">
                                                                        <input type="text" class="form-control mx-auto"
                                                                               name="options[]" value="{{$option}}"
                                                                               id="">
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="mark">عدد العلامات على السؤال</label>
                                                        <input class="form-control w-auto" id="mark" name="mark" min="1"
                                                               max="100" value="{{$question->mark ?? 1}}"
                                                               type="number"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                                    الغاء
                                                </button>
                                                <button class="btn btn-primary" type="submit">تحديث</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>

            @endif
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('admin/assets/js/flatpickr.js')}}"></script>

@endpush