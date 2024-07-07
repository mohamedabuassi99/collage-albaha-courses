@extends('layouts.admin.app')
@section('title')
    تصميم الشهادة
@endsection
@push('css')
    {{--    <style>--}}
    {{--        .input-hidden {--}}
    {{--            position: absolute;--}}
    {{--        }--}}
    {{--        input[type=radio]:checked + label > img {--}}
    {{--            border: 1px solid #fff;--}}
    {{--            box-shadow: 0 0 3px 3px #1978a2;--}}
    {{--        }--}}
    {{--        input[type=radio] + label > img {--}}
    {{--            border: 1px #444;--}}
    {{--        }--}}
    {{--    </style>--}}
@endpush
@section('content')
    <div class="card p-0 mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}}); background-size:contain; background-size: auto 100%"></div>
        <div class="card-header">
            <h2 class="text-center pt-2">تصميم الشهادة</h2>
        </div>
        <div class="card-body position-relative  ">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-chosse_design-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-chosse_design" type="button" role="tab"
                            aria-controls="pills-chosse_design"
                            aria-selected="true">اختيار لغة التصميم
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-design-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-design" type="button" role="tab" aria-controls="pills-design"
                            aria-selected="false">تصميم الشهادة
                    </button>
                </li>
                {{--                <li class="nav-item" role="presentation">--}}
                {{--                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"--}}
                {{--                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"--}}
                {{--                            aria-selected="false">Contact--}}
                {{--                    </button>--}}
                {{--                </li>--}}
            </ul>
            <form action="{{route('admin.course.design.store',$course)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-chosse_design" role="tabpanel"
                         aria-labelledby="pills-chosse_design-tab">
                        <div class="row">
                            <div class="col-12">
                                <p class="fs-3 text-dark">
                                    اختيار نسخة الشهادة
                                </p>
                            </div>
                            <div class="col-4 mx-auto">
                                <input type="radio" class="btn-check" name="type" value="ar" id="11"
                                       autocomplete="off">
                                <label class="btn btn-outline-success" for="11">عربي</label>
                            </div>
                            <div class="col-4 mx-auto">
                                <input type="radio" class="btn-check" name="type" value="en" id="22"
                                       autocomplete="off">
                                <label class="btn btn-outline-danger" for="22">انجليزي</label>
                            </div>

                            <div class="col-4 mx-auto">
                                <input type="radio" class="btn-check" name="type" value="ar_en" id="33"
                                       autocomplete="off">
                                <label class="btn btn-outline-dark" for="33">عربي وانجليزي</label>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade " id="pills-design" role="tabpanel" aria-labelledby="pills-design-tab">
                        <div id="ar">
                            <div class="card theme-wizard h-100">
                                <div class="card-header bg-light pt-3 pb-2">
                                    <ul class="nav nav-pills mb-3" role="tablist" id="pill-tab2">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_ar_text"
                                                    type="button" role="tab" aria-controls="form_ar_text"
                                                    aria-selected="true"><span class="fas fa-edit me-2"
                                                                               data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">النصوص</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_ar_images"
                                                    type="button" role="tab" aria-controls="form_ar_images"
                                                    aria-selected="false"><span class="fas fa-images me-2"
                                                                                data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">الصور</span></button>
                                        </li>
                                        {{--                                        <li class="nav-item" role="presentation">--}}
                                        {{--                                            <button class="nav-link" data-wizard-step="data-wizard-step"--}}
                                        {{--                                                    data-bs-toggle="pill" data-bs-target="#form_ar_colors"--}}
                                        {{--                                                    type="button" role="tab" aria-controls="form_ar_colors"--}}
                                        {{--                                                    aria-selected="false"><span class="fas fa-dollar-sign me-2"--}}
                                        {{--                                                                                data-fa-transform="down-2 shrink-2"></span><span--}}
                                        {{--                                                        class="d-none d-md-inline-block fs--1">الالوان</span></button>--}}
                                        {{--                                        </li>--}}
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form-wizard-progress-tab4"
                                                    type="button" role="tab" aria-controls="form-wizard-progress-tab4"
                                                    aria-selected="false"><span class="fas fa-thumbs-up me-2"
                                                                                data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">الانتهاء</span></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                                <div class="card-body py-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_ar_text" id="form_ar_text">
                                            <div class="row">
                                                <div class="mb-3 col-3">
                                                    <label for="">عنوان الشهادة</label>
                                                    <input type="text" name="title_ar" id="title_of_certificate"
                                                           value="عنوان الشهادة لدورة...." class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الطالب</label>
                                                    <input type="text" name="before_student_name_ar"
                                                           id="before_student_name"
                                                           value="نص متغير مثال ( وزارة التربية تبارك ل )"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الدورة</label>
                                                    <input type="text" name="before_course_name_ar"
                                                           id="before_course_name"
                                                           value="وصف قبل اسم الدورة..."
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف تاريخ عدد الساعات</label>
                                                    <input type="text" name="describe_hour_ar"
                                                           id="before_number_of_hour"
                                                           value="نص متغير للساعة"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">اسم الجاهة</label>
                                                    <input type="text" name="describe_name_jaha_ar" id="name_jaha"
                                                           value="اسم الجاهة"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">قيمة الجاهة</label>
                                                    <input type="text" name="name_jaha_ar" id="value_name_jaha"
                                                           value="د محمد ..."
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم المدرب</label>
                                                    <input type="text" name="describe_name_instructor_ar"
                                                           id="before_name_instructor"
                                                           value="اسم المدرب"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف تاريخ بدء الدورة</label>
                                                    <input type="text" name="start_date_ar" id="start_date"
                                                           value="Issued:"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف انتهاء الدورة</label>
                                                    <input type="text" name="end_date_ar" id="end_date" value="Expires:"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف رقم الخاص للشهادة</label>
                                                    <input type="text" name="descripe_certificate_id_ar"
                                                           id="id_certificate"
                                                           value="Certificate ID:"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف ال QR</label>
                                                    <input type="text" name="describe_qr_ar" id="describe_qr"
                                                           value="scan to verify"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_ar_images" id="form_ar_images">
                                            <div class="row mx-auto">
                                                <div class="col-3">
                                                    <label for="">خلفية الشهادة</label>
                                                    <input type="file" name="image_ar" id="image_ar"
                                                           class="form-control">
                                                    <small>ينصح باستخادم صورة طول 556px عرض 800px</small>
                                                </div>


                                                <div class="col-3">
                                                    <label for="">ايقونة زاوية اعلى اليمين</label>
                                                    <input type="file" name="image_corner_top_right"
                                                           id="image_corner_top_right"
                                                           class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label for="">ايقونة زاوية اعلى اليسار</label>
                                                    <input type="file" name="image_corner_top_left"
                                                           id="image_corner_top_left"
                                                           class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label for="">ايقونة زاوية اسفل اليمين</label>
                                                    <input type="file" name="image_corner_bottom_right"
                                                           id="image_corner_bottom_right"
                                                           class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        {{--                                        <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"--}}
                                        {{--                                             aria-labelledby="form_ar_colors" id="form_ar_colors">--}}
                                        {{--                                            <div class="row">--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">لون الاطار</label>--}}
                                        {{--                                                    <input type="color" name="border_color_ar" id="border_color"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                    <div class="text-center">--}}
                                        {{--                                                        <label for="">إلغاء الاطار</label>--}}
                                        {{--                                                        <input type="checkbox" name="is_border_cancel_ar" value="1"--}}
                                        {{--                                                               id="cancel_border_ar">--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">لون الغلاف الشهادة</label>--}}
                                        {{--                                                    <input type="color" name="background_color_ar" value="#fff"--}}
                                        {{--                                                           id="background_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                    <small>في حال كنت تستخدم صورة فهذا يعتبر ملغي</small>--}}
                                        {{--                                                </div>--}}

                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">عنوان الشهادة</label>--}}
                                        {{--                                                    <input type="color" name="title_font_color_ar"--}}
                                        {{--                                                           id="title_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">نص قبل اسم الطالب واسم الدورة</label>--}}
                                        {{--                                                    <input type="color" name="text_before_student_course_font_color_ar"--}}
                                        {{--                                                           id="student_and_course_name_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}

                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">قيمة اسم الطالب </label>--}}
                                        {{--                                                    <input type="color" name="student_name_font_color_ar"--}}
                                        {{--                                                           id="student_name_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">قيمة اسم الدورة </label>--}}
                                        {{--                                                    <input type="color" name="course_name_font_color_ar"--}}
                                        {{--                                                           id="course_name_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">نص الساعات </label>--}}
                                        {{--                                                    <input type="color" name="text_hour_font_color_ar"--}}
                                        {{--                                                           id="text_hour_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">متغيرات الساعات </label>--}}
                                        {{--                                                    <input type="color" name="variable_hour_font_color_ar"--}}
                                        {{--                                                           id="variable_hour_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">نص اسم الجاهة و اسم المدرب </label>--}}
                                        {{--                                                    <input type="color" name="text_instructor_jaha_name_font_color_ar"--}}
                                        {{--                                                           id="text_instructor_jaha_name_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">متغيرات اسم الجاهة واسم المدرب </label>--}}
                                        {{--                                                    <input type="color"--}}
                                        {{--                                                           name="variable_instructor_jaha_name_font_color_ar"--}}
                                        {{--                                                           id="variable_instructor_jaha_name_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">نص التاريخ و رقم الخاص بالشهادة </label>--}}
                                        {{--                                                    <input type="color" name="text_date_font_color_ar"--}}
                                        {{--                                                           id="text_date_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">متغيرات التاريخ و رقم الخاص بالشهادة</label>--}}
                                        {{--                                                    <input type="color" name="variable_date_font_color_ar"--}}
                                        {{--                                                           id="variable_date_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 " style="height: 90px">--}}
                                        {{--                                                    <label for="">نص ال QR</label>--}}
                                        {{--                                                    <input type="color" name="qr_font_color_ar" id="qr_font_color_ar"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}

                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form-wizard-progress-tab4" id="form-wizard-progress-tab4">
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-300 p-4">
                                    <div class="position-relative mx-auto "
                                         id="border_color_element"
                                         style="font-size: 13px; height: 556px;width: 800px; background: white; color: black;">
                                        <div class="position-absolute start-0 top-0 p-2">
                                            <p id="image_corner_top_right_element" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div class="position-absolute end-0 top-0 p-2">
                                            <p id="image_corner_top_left_element" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div class="position-absolute bottom-0 start-0 p-2">
                                            <p id="image_corner_bottom_right_element" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div
                                                class="light fs-3 w-100 text-center rounded-1 position-absolute start-50 translate-middle-x"
                                                style="top:10% !important;">
                                            <p class="" id="title_of_certificate_element">
                                                عنوان الشهادة لدورة....
                                            </p>
                                        </div>
                                        <div class="light rounded-1 position-absolute start-50 translate-middle-x w-100 text-center"
                                             style="top:25% !important;">
                                            <p class="m-0 fs-2" id="before_student_name_element">
                                                نص متغير مثال ( وزارة التربية تبارك ل )
                                            </p>
                                            <p class="my-2 fs-5" id="student_variable_ar">
                                                (اسم الطالب هنا)
                                            </p>
                                            <p class="m-0">
                                                <span id="before_course_name_element">وصف قبل اسم الدورة...</span>
                                                <span
                                                        id="course_variable_ar">{{$course->name ?? '{اسم الدورة }'}}</span>
                                            </p>

                                            @if($course->hours)
                                                <p class="my-2">
                                                    <span id="before_number_of_hour_element">نص متغير للساعة</span>
                                                    <span
                                                            id="value_hour_element_ar">{{$course->hours ??'{course_hours}'}}</span>
                                                </p>
                                            @endif

                                            <div class="m-0 d-flex justify-content-center gap-4">
                                                <p>
                                                    <span>الجنسية:</span>
                                                    <span>{الجنسية}</span>
                                                </p>

                                                <p>
                                                    <span>رقم الهوية:</span>
                                                    <span>{الرقم}</span>
                                                </p>
                                            </div>

                                            <div class="my-3 d-flex justify-content-around align-content-center">
                                                <p class="">
                                                    <span id="name_jaha_element" class="fs-1">اسم الجاهة</span>
                                                    <span id="value_name_jaha_element" class="d-block">د محمد ...</span>
                                                </p>
                                                @if($course->instructor)
                                                    <p class="">
                                                    <span class="fs-1"
                                                          id="before_name_instructor_element">اسم المدرب</span>
                                                        <span class="d-block"
                                                              id="value_name_instrucor_element">{{$course->instructor}}</span>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                                class="light rounded-1 position-absolute bottom-0 start-50 translate-middle-x text-center"
                                                style="bottom:7% !important;">

                                            <img src="{{asset('admin/assets/img/qrimg.png')}}" width="80"
                                                 alt="">
                                            <p class="m-0" id="describe_qr_element">scan to verify</p>
                                        </div>

                                        <div class="light rounded-1 position-absolute bottom-0 end-0 text-center "
                                             style="left:3%!important; bottom:3% !important;">

                                            @if($course->from)
                                                <p class="my-2"><span id="start_date_element">Issued:</span>
                                                    <span id="start_date_element_variable">{{$course->from}}</span>
                                                </p>
                                            @endif

                                            @if($course->publishdate)
                                                <p class="my-2"><span id="end_date_element">Expires:</span>
                                                    <span id="end_date_element_variable">{{$course->publishdate}}</span>
                                                </p>
                                            @endif

                                            <p class="my-2"><span id="id_certificate_element">Certificate ID:</span>
                                                <span id="id_certificate_element_variable">(اي دي الخاص بالشهادة هنا)</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-block text-center ">
                                        <button type="submit" class="btn btn-info col-6 mt-3">حفظ</button>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#title_of_certificate').on("keypress change", function () {
                                                document.getElementById('title_of_certificate_element').innerHTML = $(this).val();
                                            });
                                            $('#before_student_name').on("keypress change", function () {
                                                document.getElementById('before_student_name_element').innerHTML = $(this).val();
                                            });
                                            $('#before_course_name').on("keypress change", function () {
                                                document.getElementById('before_course_name_element').innerHTML = $(this).val();
                                            });
                                            $('#before_number_of_hour').on("keypress change", function () {
                                                document.getElementById('before_number_of_hour_element').innerHTML = $(this).val();
                                            });
                                            $('#start_date').on("keypress change", function () {
                                                document.getElementById('start_date_element').innerHTML = $(this).val();
                                            });
                                            $('#end_date').on("keypress change", function () {
                                                document.getElementById('end_date_element').innerHTML = $(this).val();
                                            });
                                            $('#id_certificate').on("keypress change", function () {
                                                document.getElementById('id_certificate_element').innerHTML = $(this).val();
                                            });
                                            $('#name_jaha').on("keypress change", function () {
                                                document.getElementById('name_jaha_element').innerHTML = $(this).val();
                                            });
                                            $('#value_name_jaha').on("keypress change", function () {
                                                document.getElementById('value_name_jaha_element').innerHTML = $(this).val();
                                            });
                                            $('#before_name_instructor').on("keypress change", function () {
                                                document.getElementById('before_name_instructor_element').innerHTML = $(this).val();
                                            });
                                            $('#describe_qr').on("keypress change", function () {
                                                document.getElementById('describe_qr_element').innerHTML = $(this).val();
                                            });


                                            $('#image_ar').change(function () {
                                                // $('#border_color_element').css('border-color', $(this).val());
                                                readURL(this);
                                            });

                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#border_color_element').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#border_color_element').css('background-repeat', 'no-repeat');
                                                        $('#border_color_element').css('background-size', '800px 556px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#border_color_element').css('background-image', '');
                                                }
                                            }

                                            $('#image_corner_top_right').change(function () {
                                                // $('img #image_corner_top_right').s
                                                readURLtop_right(this)
                                            });

                                            function readURLtop_right(input) {

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#image_corner_top_right_element').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#image_corner_top_right_element').css('background-repeat', 'no-repeat');
                                                        $('#image_corner_top_right_element').css('background-size', '100px 100px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#image_corner_top_right_element').css('background-image', '');
                                                }
                                            }

                                            $('#image_corner_top_left').change(function () {
                                                readURLtop_left(this)
                                            });

                                            function readURLtop_left(input) {

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#image_corner_top_left_element').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#image_corner_top_left_element').css('background-repeat', 'no-repeat');
                                                        $('#image_corner_top_left_element').css('background-size', '100px 100px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#image_corner_top_left_element').css('background-image', '');
                                                }
                                            }

                                            $('#image_corner_bottom_right').change(function () {
                                                readURLbottom_right(this)
                                            });

                                            function readURLbottom_right(input) {

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#image_corner_bottom_right_element').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#image_corner_bottom_right_element').css('background-repeat', 'no-repeat');
                                                        $('#image_corner_bottom_right_element').css('background-size', '100px 100px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#image_corner_bottom_right_element').css('background-image', '');
                                                }
                                            }

                                            //
                                            // $('#cancel_border_ar').click(function () {
                                            //     if (document.getElementById('cancel_border_ar').checked) {
                                            //         $("#border_color_element").css('border', 'none');
                                            //     } else {
                                            //         $("#border_color_element").css({"border": "10px solid #000"});
                                            //     }
                                            // });
                                            //
                                            //
                                            // $('#border_color').change(function () {
                                            //     $('#border_color_element').css('border-color', $(this).val());
                                            // });
                                            //
                                            //
                                            // $('#background_color_ar').change(function () {
                                            //     $('#border_color_element').css('background-color', $(this).val());
                                            // });
                                            // $('#title_font_color_ar').change(function () {
                                            //     $('#title_of_certificate_element').css('color', $(this).val());
                                            // });
                                            // $('#student_and_course_name_font_color_ar').change(function () {
                                            //     $('#before_student_name_element').css('color', $(this).val());
                                            //     $('#before_course_name_element').css('color', $(this).val());
                                            // });
                                            //
                                            // $('#student_name_font_color_ar').change(function () {
                                            //     $('#student_variable_ar').css('color', $(this).val());
                                            // });
                                            // $('#course_name_font_color_ar').change(function () {
                                            //     $('#course_variable_ar').css('color', $(this).val());
                                            // });
                                            // $('#text_hour_font_color_ar').change(function () {
                                            //     $('#before_number_of_hour_element').css('color', $(this).val());
                                            // });
                                            // $('#variable_hour_font_color_ar').change(function () {
                                            //     $('#value_hour_element_ar').css('color', $(this).val());
                                            // });
                                            // $('#text_date_font_color_ar').change(function () {
                                            //     $('#start_date_element').css('color', $(this).val());
                                            //     $('#end_date_element').css('color', $(this).val());
                                            //     $('#id_certificate_element').css('color', $(this).val());
                                            // });
                                            // $('#variable_date_font_color_ar').change(function () {
                                            //     $('#start_date_element_variable').css('color', $(this).val());
                                            //     $('#end_date_element_variable').css('color', $(this).val());
                                            //     $('#id_certificate_element_variable').css('color', $(this).val());
                                            // });
                                            // $('#text_instructor_jaha_name_font_color_ar').change(function () {
                                            //     $('#name_jaha_element').css('color', $(this).val());
                                            //     $('#before_name_instructor_element').css('color', $(this).val());
                                            // });
                                            // $('#variable_instructor_jaha_name_font_color_ar').change(function () {
                                            //     $('#value_name_jaha_element').css('color', $(this).val());
                                            //     $('#value_name_instrucor_element').css('color', $(this).val());
                                            // });
                                            // $('#qr_font_color_ar').change(function () {
                                            //     $('#describe_qr_element').css('color', $(this).val());
                                            // });

                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div id="en">
                            <div class="card theme-wizard h-100">
                                <div class="card-header bg-light pt-3 pb-2">
                                    <ul class="nav nav-pills mb-3" role="tablist" id="pill-tab2">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_en_text"
                                                    type="button" role="tab" aria-controls="form_en_text"
                                                    aria-selected="true"><span class="fas fa-edit me-2"
                                                                               data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">النصوص</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_en_image"
                                                    type="button" role="tab" aria-controls="form_en_image"
                                                    aria-selected="false"><span class="fas fa-images me-2"
                                                                                data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">الصور</span></button>
                                        </li>
                                        {{--                                        <li class="nav-item" role="presentation">--}}
                                        {{--                                            <button class="nav-link" data-wizard-step="data-wizard-step"--}}
                                        {{--                                                    data-bs-toggle="pill" data-bs-target="#form_en_colors"--}}
                                        {{--                                                    type="button" role="tab" aria-controls="form_en_colors"--}}
                                        {{--                                                    aria-selected="false"><span class="fas fa-dollar-sign me-2"--}}
                                        {{--                                                                                data-fa-transform="down-2 shrink-2"></span><span--}}
                                        {{--                                                        class="d-none d-md-inline-block fs--1">الالوان</span></button>--}}
                                        {{--                                        </li>--}}
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_en_done"
                                                    type="button" role="tab" aria-controls="form_en_done"
                                                    aria-selected="false"><span class="fas fa-thumbs-up me-2"
                                                                                data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">الانتهاء</span></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                                <div class="card-body py-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_en_text" id="form_en_text">
                                            <div class="row">
                                                <div class="mb-3 col-3">
                                                    <label for="">عنوان الشهادة</label>
                                                    <input type="text" id="title_of_certificate_en" name="title_en"
                                                           value="Certificate title for a course..."
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الطالب</label>
                                                    <input type="text" id="before_student_name_en"
                                                           name="before_student_name_en"
                                                           value="Variable text example (Ministry of Education bless you)"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الدورة</label>
                                                    <input type="text" id="before_course_name_en"
                                                           name="before_course_name_en"
                                                           value="Description before course name  "
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف تاريخ عدد الساعات</label>
                                                    <input type="text" id="before_number_of_hour_en"
                                                           name="describe_hour_en"
                                                           value="Changeable text for the hour"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">Entity name</label>
                                                    <input type="text" id="name_jaha_en" name="describe_name_jaha_en"
                                                           value="Entity name"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">قيمة الجاهة</label>
                                                    <input type="text" id="value_name_jaha_en" name="name_jaha_en"
                                                           value="Dr mohamed ..." class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم المدرب</label>
                                                    <input type="text" id="before_name_instructor_en"
                                                           name="describe_name_instructor_en"
                                                           value="Name of instructor"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف تاريخ بدء الدورة</label>
                                                    <input type="text" id="start_date_en" name="start_date_en"
                                                           value="Issued:"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف انتهاء الدورة</label>
                                                    <input type="text" id="end_date_en" name="end_date_en"
                                                           value="Expires:"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف رقم الخاص للشهادة</label>
                                                    <input type="text" id="id_certificate_en"
                                                           name="descripe_certificate_id_en"
                                                           value="Certificate ID:" class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف ال QR</label>
                                                    <input type="text" id="describe_qr_en" name="describe_qr_en"
                                                           value="scan to verify"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane  px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_en_image" id="form_en_image">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="">خلفية الشهادة</label>
                                                    <input type="file" name="image_en" id="image_en"
                                                           class="form-control">
                                                    <small>ينصح باستخادم صورة طول 556px عرض 800px</small>
                                                </div>

                                                <div class="col-3 ">
                                                    <label for="">ايقونة زاوية اعلى اليمين</label>
                                                    <input type="file" name="image_corner_top_right_en"
                                                           id="image_corner_top_right_en"
                                                           class="form-control">
                                                </div>
                                                <div class="col-3 ">
                                                    <label for="">ايقونة زاوية اعلى اليسار</label>
                                                    <input type="file" name="image_corner_top_left_en"
                                                           id="image_corner_top_left_en"
                                                           class="form-control">
                                                </div>
                                                <div class="col-3 ">
                                                    <label for="">ايقونة زاوية اسفل اليمين</label>
                                                    <input type="file" name="image_corner_bottom_right_en"
                                                           id="image_corner_bottom_right_en"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"--}}
                                        {{--                                             aria-labelledby="form_en_colors" id="form_en_colors">--}}
                                        {{--                                            <div class="row">--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">لون الاطار</label>--}}
                                        {{--                                                    <input type="color" id="border_color_en" value="000000"--}}
                                        {{--                                                           name="border_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                    <div class="text-center">--}}
                                        {{--                                                        <label for="">إلغاء الاطار</label>--}}
                                        {{--                                                        <input type="checkbox" name="is_border_cancel_en" value="1"--}}
                                        {{--                                                               id="cancel_border_en">--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">لون غلاف الشهادة</label>--}}
                                        {{--                                                    <input type="color" name="background_color_en" value="#fff"--}}
                                        {{--                                                           id="background_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                    <small>في حال كنت تستخدم صورة فهذا يعتبر ملغي</small>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">عنوان الشهادة</label>--}}
                                        {{--                                                    <input type="color" name="title_font_color_en"--}}
                                        {{--                                                           id="title_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">نص قبل اسم الطالب واسم الدورة</label>--}}
                                        {{--                                                    <input type="color" name="text_before_student_course_font_color_en"--}}
                                        {{--                                                           id="text_before_student_course_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">قيمة اسم الطالب </label>--}}
                                        {{--                                                    <input type="color" name="student_name_font_color_en"--}}
                                        {{--                                                           id="student_name_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">قيمة اسم الدورة</label>--}}
                                        {{--                                                    <input type="color" name="course_name_font_color_en"--}}
                                        {{--                                                           id="course_name_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">نص الساعات </label>--}}
                                        {{--                                                    <input type="color" name="text_hour_font_color_en"--}}
                                        {{--                                                           id="text_hour_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">متغيرات الساعات </label>--}}
                                        {{--                                                    <input type="color" name="variable_hour_font_color_en"--}}
                                        {{--                                                           id="variable_hour_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">نص اسم الجاهة و اسم المدرب </label>--}}
                                        {{--                                                    <input type="color" name="text_instructor_jaha_name_font_color_en"--}}
                                        {{--                                                           id="text_instructor_jaha_name_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">متغيرات اسم الجاهة واسم المدرب </label>--}}
                                        {{--                                                    <input type="color"--}}
                                        {{--                                                           name="variable_instructor_jaha_name_font_color_en"--}}
                                        {{--                                                           id="variable_instructor_jaha_name_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">نص التاريخ و رقم الخاص بالشهادة </label>--}}
                                        {{--                                                    <input type="color" name="text_date_font_color_en"--}}
                                        {{--                                                           id="text_date_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">متغيرات التاريخ و رقم الخاص بالشهادة</label>--}}
                                        {{--                                                    <input type="color" name="variable_date_font_color_en"--}}
                                        {{--                                                           id="variable_date_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3 ">--}}
                                        {{--                                                    <label for="">نص ال QR</label>--}}
                                        {{--                                                    <input type="color" name="qr_font_color_en" id="qr_font_color_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="tab-pane  px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_en_done" id="form_en_done">
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-300 p-4">
                                    <div class="position-relative mx-auto  " id="border_color_element_en"
                                         style="font-size: 13px; height: 556px;width: 800px; background: white; color: black;">

                                        <div class="position-absolute start-0 top-0 p-2">
                                            <p id="image_corner_top_right_element_en" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div class="position-absolute end-0 top-0 p-2">
                                            <p id="image_corner_top_left_element_en" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div class="position-absolute bottom-0 start-0 p-2">
                                            <p id="image_corner_bottom_right_element_en" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>

                                        <div
                                                class="light fs-3 w-100 text-center rounded-1 position-absolute start-50 translate-middle-x"
                                                style="top:10% !important;">
                                            <p class="" id="title_of_certificate_element_en">
                                                Certificate title for a course...
                                            </p>
                                        </div>
                                        <div
                                                class="light rounded-1 position-absolute start-50 translate-middle-x w-100 text-center"
                                                style="top:25% !important;">
                                            <p class="m-0 fs-2" id="before_student_name_element_en">
                                                Variable text example (Ministry of Education bless you)
                                            </p>
                                            <p class="my-2 fs-5" id="student_variable_en">
                                                (student name here)
                                            </p>
                                            <p class="m-0">
                                            <span
                                                    id="before_course_name_element_en"> Description before course name  </span>
                                                <span id="course_variable_en">{{{$course->name_en}}}</span>
                                            </p>
                                            @if($course->hours)
                                                <p class="my-2">
                                                    <span id="before_number_of_hour_element_en">Changeable text for the hour</span>
                                                    <span id="value_hour_element_en">{{$course->hours}}</span>
                                                </p>
                                            @endif
                                            <div class="m-0 d-flex justify-content-center gap-4">
                                                <p>
                                                    <span>Nationality:</span>
                                                    <span>{Nationality}</span>
                                                </p>

                                                <p>
                                                    <span>Id Number:</span>
                                                    <span>{ID}</span>
                                                </p>
                                            </div>
                                            <div class="my-3 d-flex justify-content-around align-content-center">
                                                <p class="">
                                                    <span id="name_jaha_element_en" class="fs-1">Entity name</span>
                                                    <span id="value_name_jaha_element_en"
                                                          class="d-block">Dr mohamed ...</span>
                                                </p>
                                                <p class="">
                                                    <span class="fs-1" id="before_name_instructor_element_en">Name of instructor</span>
                                                    <span class="d-block"
                                                          id="value_name_instructor_element_en">{{$course->instructor_en}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                                class="light rounded-1 position-absolute bottom-0 start-50 translate-middle-x text-center"
                                                style="bottom:7% !important;">

                                            <img src="{{asset('admin/assets/img/qrimg.png')}}" width="80"
                                                 alt="">
                                            <p class="m-0" id="describe_qr_element_en">scan to verify</p>
                                        </div>

                                        <div class="light rounded-1 position-absolute bottom-0 end-0 text-center "
                                             style="left:3%!important; bottom:3% !important;">

                                            @if($course->from)
                                                <p class="my-2"><span id="start_date_element_en">Issued:</span>
                                                    <span
                                                            id="start_date_element_variable_en">{{$course->from}}</span>
                                                </p>
                                            @endif
                                            @if($course->publishdate)
                                                <p class="my-2"><span id="end_date_element_en">Expires:</span>
                                                    <span
                                                            id="end_date_element_variable_en">{{$course->publishdate}}</span>
                                                </p>
                                            @endif
                                            <p class="my-2"><span id="id_certificate_element_en">Certificate ID:</span>
                                                <span id="id_certificate_element_variable_en">{{123321312123}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-block text-center">
                                        <button type="submit" class="btn btn-info col-6 mt-3 ">حفظ</button>
                                    </div>

                                    <script>
                                        $(document).ready(function () {


                                            $('#title_of_certificate_en').on("keypress change", function () {
                                                document.getElementById('title_of_certificate_element_en').innerHTML = $(this).val();
                                            });
                                            $('#before_student_name_en').on("keypress change", function () {
                                                document.getElementById('before_student_name_element_en').innerHTML = $(this).val();
                                            });
                                            $('#before_course_name_en').on("keypress change", function () {
                                                document.getElementById('before_course_name_element_en').innerHTML = $(this).val();
                                            });
                                            $('#before_number_of_hour_en').on("keypress change", function () {
                                                document.getElementById('before_number_of_hour_element_en').innerHTML = $(this).val();
                                            });
                                            $('#start_date_en').on("keypress change", function () {
                                                document.getElementById('start_date_element_en').innerHTML = $(this).val();
                                            });
                                            $('#end_date_en').on("keypress change", function () {
                                                document.getElementById('end_date_element_en').innerHTML = $(this).val();
                                            });
                                            $('#id_certificate_en').on("keypress change", function () {
                                                document.getElementById('id_certificate_element_en').innerHTML = $(this).val();
                                            });
                                            $('#name_jaha_en').on("keypress change", function () {
                                                document.getElementById('name_jaha_element_en').innerHTML = $(this).val();
                                            });
                                            $('#value_name_jaha_en').on("keypress change", function () {
                                                document.getElementById('value_name_jaha_element_en').innerHTML = $(this).val();
                                            });
                                            $('#before_name_instructor_en').on("keypress change", function () {
                                                document.getElementById('before_name_instructor_element_en').innerHTML = $(this).val();
                                            });
                                            $('#describe_qr_en').on("keypress change", function () {
                                                document.getElementById('describe_qr_element_en').innerHTML = $(this).val();
                                            });


                                            $('#image_en').change(function () {
                                                // $('#border_color_element').css('border-color', $(this).val());
                                                readURL_en(this);

                                            });

                                            function readURL_en(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#border_color_element_en').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#border_color_element_en').css('background-repeat', 'no-repeat');
                                                        $('#border_color_element_en').css('background-size', '800px 556px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#border_color_element_en').css('background-image', '');
                                                }
                                            }


                                            $('#image_corner_top_right_en').change(function () {
                                                readURLtop_right_en(this)
                                            });

                                            function readURLtop_right_en(input) {

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#image_corner_top_right_element_en').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#image_corner_top_right_element_en').css('background-repeat', 'no-repeat');
                                                        $('#image_corner_top_right_element_en').css('background-size', '100px 100px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#image_corner_top_right_element_en').css('background-image', '');
                                                }
                                            }

                                            $('#image_corner_top_left_en').change(function () {
                                                readURLtop_left_en(this)
                                            });

                                            function readURLtop_left_en(input) {

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#image_corner_top_left_element_en').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#image_corner_top_left_element_en').css('background-repeat', 'no-repeat');
                                                        $('#image_corner_top_left_element_en').css('background-size', '100px 100px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#image_corner_top_left_element_en').css('background-image', '');
                                                }
                                            }

                                            $('#image_corner_bottom_right_en').change(function () {
                                                readURLbottom_right_en(this)
                                            });

                                            function readURLbottom_right_en(input) {

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#image_corner_bottom_right_element_en').css('background-image', 'url(' + e.target.result + ')');
                                                        $('#image_corner_bottom_right_element_en').css('background-repeat', 'no-repeat');
                                                        $('#image_corner_bottom_right_element_en').css('background-size', '100px 100px');
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    alert('select a file to see preview');
                                                    $('#image_corner_bottom_right_element_en').css('background-image', '');
                                                }
                                            }


                                            // $('#border_color_en').change(function () {
                                            //     $('#border_color_element_en').css('border-color', $(this).val());
                                            // });
                                            //
                                            // $('#background_color_en').change(function () {
                                            //     $('#border_color_element_en').css('background-color', $(this).val());
                                            // });
                                            // $('#cancel_border_en').click(function () {
                                            //     if (document.getElementById('cancel_border_en').checked) {
                                            //         $("#border_color_element_en").css('border', 'none');
                                            //     } else {
                                            //         $("#border_color_element_en").css({"border": "10px solid #000"});
                                            //     }
                                            // });
                                            // $('#title_font_color_en').change(function () {
                                            //     $('#title_of_certificate_element_en').css('color', $(this).val());
                                            // });
                                            // $('#text_before_student_course_font_color_en').change(function () {
                                            //     $('#before_student_name_element_en').css('color', $(this).val());
                                            //     $('#before_course_name_element_en').css('color', $(this).val());
                                            // });
                                            //
                                            // $('#student_name_font_color_en').change(function () {
                                            //     $('#student_variable_en').css('color', $(this).val());
                                            // });
                                            // $('#course_name_font_color_en').change(function () {
                                            //     $('#course_variable_en').css('color', $(this).val());
                                            // });
                                            //
                                            // $('#text_hour_font_color_en').change(function () {
                                            //     $('#before_number_of_hour_element_en').css('color', $(this).val());
                                            // });
                                            // $('#variable_hour_font_color_en').change(function () {
                                            //     $('#value_hour_element_en').css('color', $(this).val());
                                            // });
                                            // $('#text_date_font_color_en').change(function () {
                                            //     $('#start_date_element_en').css('color', $(this).val());
                                            //     $('#end_date_element_en').css('color', $(this).val());
                                            //     $('#id_certificate_element_en').css('color', $(this).val());
                                            // });
                                            // $('#variable_date_font_color_en').change(function () {
                                            //     $('#start_date_element_variable_en').css('color', $(this).val());
                                            //     $('#end_date_element_variable_en').css('color', $(this).val());
                                            //     $('#id_certificate_element_variable_en').css('color', $(this).val());
                                            // });
                                            // $('#text_instructor_jaha_name_font_color_en').change(function () {
                                            //     $('#name_jaha_element_en').css('color', $(this).val());
                                            //     $('#before_name_instructor_element_en').css('color', $(this).val());
                                            // });
                                            // $('#variable_instructor_jaha_name_font_color_en').change(function () {
                                            //     $('#value_name_jaha_element_en').css('color', $(this).val());
                                            //     $('#value_name_instructor_element_en').css('color', $(this).val());
                                            // });
                                            // $('#qr_font_color_en').change(function () {
                                            //     $('#describe_qr_element_en').css('color', $(this).val());
                                            // });
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div id="ar_en">
                            <div class="card theme-wizard h-100">
                                <div class="card-header bg-light pt-3 pb-2">
                                    <ul class="nav nav-pills mb-3" role="tablist" id="pill-tab2">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_ar_en_text"
                                                    type="button" role="tab" aria-controls="form_ar_en_text"
                                                    aria-selected="true"><span class="fas fa-edit me-2"
                                                                               data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">النصوص</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_ar_en_image"
                                                    type="button" role="tab" aria-controls="form_ar_en_image"
                                                    aria-selected="false"><span class="fas fa-user me-2"
                                                                                data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">الصور</span></button>
                                        </li>
                                        {{--                                        <li class="nav-item" role="presentation">--}}
                                        {{--                                            <button class="nav-link" data-wizard-step="data-wizard-step"--}}
                                        {{--                                                    data-bs-toggle="pill" data-bs-target="#form_ar_en_color"--}}
                                        {{--                                                    type="button" role="tab" aria-controls="form_ar_en_color"--}}
                                        {{--                                                    aria-selected="false"><span class="fas fa-dollar-sign me-2"--}}
                                        {{--                                                                                data-fa-transform="down-2 shrink-2"></span><span--}}
                                        {{--                                                        class="d-none d-md-inline-block fs--1">الالوان</span></button>--}}
                                        {{--                                        </li>--}}
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-wizard-step="data-wizard-step"
                                                    data-bs-toggle="pill" data-bs-target="#form_ar_en_done"
                                                    type="button" role="tab" aria-controls="form_ar_en_done"
                                                    aria-selected="false"><span class="fas fa-thumbs-up me-2"
                                                                                data-fa-transform="shrink-2"></span><span
                                                        class="d-none d-md-inline-block fs--1">الانتهاء</span></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                                <div class="card-body py-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_ar_en_text" id="form_ar_en_text">
                                            <div class="row">
                                                <div class="mb-3 col-3">
                                                    <label for="">عنوان الشهادة بالعربي</label>
                                                    <input type="text" id="title_ar_en_ar" name="title_ar_en_ar"
                                                           value="عنوان الشهادة بالعربي" class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">عنوان الشهادة الانجليزي</label>
                                                    <input type="text" id="title_ar_en_en" name="title_ar_en_en"
                                                           value="Certificate title for a course" class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الطالب بالعربي</label>
                                                    <input type="text" id="before_student_name_ar_en_ar"
                                                           name="before_student_name_ar_en_ar"
                                                           value="يبارك مؤسسة/جامعة..."
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الطالب بالانجليزي</label>
                                                    <input type="text" id="before_student_name_ar_en_en"
                                                           name="before_student_name_ar_en_en"
                                                           value="wishes to Congratulate"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الدورة بالعربي</label>
                                                    <input type="text" id="before_course_name_ar_en_ar"
                                                           name="before_course_name_ar_en_ar"
                                                           value="لاتمام دورة"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="">وصف قبل اسم الدورة بالانجليزي</label>
                                                    <input type="text" id="before_course_name_ar_en_en"
                                                           name="before_course_name_ar_en_en"
                                                           value="on completing the course"
                                                           class="form-control">
                                                </div>
                                                <div class=" col-3">
                                                    <label for="">وصف تاريخ عدد الساعات بالعربي</label>
                                                    <input type="text" id="before_number_of_hour_ar_en_ar"
                                                           name="before_number_of_hour_ar_en_ar"
                                                           value="بواقع عدد ساعات تدريبية:"
                                                           class="form-control">
                                                </div>
                                                <div class=" col-3">
                                                    <label for="">وصف تاريخ عدد الساعات بالانجليزي</label>
                                                    <input type="text" id="before_number_of_hour_ar_en_en"
                                                           name="before_number_of_hour_ar_en_en"
                                                           value="Number of Training Hours"
                                                           class="form-control">
                                                </div>
                                                <div class=" col-3">
                                                    <label for="">تاريخ صدور الشهادة بالعربي</label>
                                                    <input type="text" readonly id="end_date_ar_en_ar"
                                                           name="end_date_ar_en_ar"
                                                           value="تم اصدار بتاريخ:"
                                                           class="form-control">
                                                </div>
                                                <div class=" col-3">
                                                    <label for="">تاريخ صدور الشهادة بالانجليزي</label>
                                                    <input type="text" readonly id="end_date_ar_en_en"
                                                           name="end_date_ar_en_en"
                                                           value="Issue Date: "
                                                           class="form-control">
                                                </div>
                                                <div class=" col-3">
                                                    <label for="">نص التهنئة الاخير بالعربي</label>
                                                    <input type="text" id="notes_ar_en_ar" name="notes_ar_en_ar"
                                                           value="متمنيا لكم دوام التوفيق والنجاح "
                                                           class="form-control">
                                                </div>
                                                <div class=" col-3">
                                                    <label for="">نص التهنئة الاخير بالانجليزي</label>
                                                    <input type="text" id="notes_ar_en_en" name="notes_ar_en_en"
                                                           value="wishing you continuous success "
                                                           class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label for="">وصف ال QR</label>
                                                    <input type="text" id="describe_qr_ar_en" name="describe_qr_ar_en"
                                                           value="scan to verify"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_ar_en_image" id="form_ar_en_image">
                                            <div class="row mx-auto">
                                                <div class="col-3">
                                                    <label for="">خلفية الشهادة</label>
                                                    <input type="file" name="image_ar_en" id="image_ar_en"
                                                           class="form-control">
                                                    <small>ينصح باستخادم صورة طول 556px عرض 800px</small>
                                                </div>


                                                <div class="col-3">
                                                    <label for="">ايقونة زاوية اعلى اليمين</label>
                                                    <input type="file" name="image_corner_top_right_ar_en"
                                                           id="image_corner_top_right_ar_en"
                                                           class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label for="">ايقونة زاوية اعلى اليسار</label>
                                                    <input type="file" name="image_corner_top_left_ar_en"
                                                           id="image_corner_top_left_ar_en"
                                                           class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label for="">ايقونة زاوية اسفل اليمين</label>
                                                    <input type="file" name="image_corner_bottom_right_ar_en"
                                                           id="image_corner_bottom_right_ar_en"
                                                           class="form-control">
                                                </div>
                                                <div class="col-3">
                                                    <label for="">ايقونة زاوية اسفل اليسار</label>
                                                    <input type="file" name="image_corner_bottom_left_ar_en"
                                                           id="image_corner_bottom_left_ar_en"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"--}}
                                        {{--                                             aria-labelledby="form_ar_en_color" id="form_ar_en_color">--}}
                                        {{--                                            <div class="row">--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">لون غلاف الشهادة</label>--}}
                                        {{--                                                    <input type="color" name="background_color_ar_en" value="#fff"--}}
                                        {{--                                                           id="background_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                    <small>في حال كنت تستخدم صورة فهذا يعتبر ملغي</small>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">لون الاطار</label>--}}
                                        {{--                                                    <input type="color" id="border_color_ar_en" name="border_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                    <div class="text-center">--}}
                                        {{--                                                        <label for="">إلغاء الاطار</label>--}}
                                        {{--                                                        <input type="checkbox" name="is_border_cancel_ar_en" value="1"--}}
                                        {{--                                                               id="cancel_border_ar_en">--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}

                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">عنوان الشهادة</label>--}}
                                        {{--                                                    <input type="color" name="title_font_color_ar_en" id="title_font_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">نص قبل اسم الطالب واسم الدورة</label>--}}
                                        {{--                                                    <input type="color" name="text_before_student_course_font_color_ar_en"--}}
                                        {{--                                                           id="text_before_student_course_font_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                </div>--}}

                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">قيمة اسم الطالب </label>--}}
                                        {{--                                                    <input type="color" name="student_name_font_color_ar_en"--}}
                                        {{--                                                           id="student_name_font_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">قيمة اسم الدورة</label>--}}
                                        {{--                                                    <input type="color" name="course_name_font_color_ar_en"--}}
                                        {{--                                                           id="course_name_font_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">نص الساعات </label>--}}
                                        {{--                                                    <input type="color" name="text_hour_font_color_ar_en"--}}
                                        {{--                                                           id="text_hour_font_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">متغيرات الساعات </label>--}}
                                        {{--                                                    <input type="color" name="variable_hour_font_color_ar_en"--}}
                                        {{--                                                           id="variable_hour_font_color_ar_en"--}}
                                        {{--                                                           class="form-control ">--}}
                                        {{--                                                </div>--}}

                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">نص التاريخ </label>--}}
                                        {{--                                                    <input type="color" name="text_date_font_color_ar_en"--}}
                                        {{--                                                           id="text_date_font_color_ar_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">قيمة التاريخ </label>--}}
                                        {{--                                                    <input type="color" name="variable_date_font_color_ar_en"--}}
                                        {{--                                                           id="variable_date_font_color_ar_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">نص التهنئة </label>--}}
                                        {{--                                                    <input type="color" name="notes_font_color_ar_en"--}}
                                        {{--                                                           id="notes_font_color_ar_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="col-3">--}}
                                        {{--                                                    <label for="">نص ال QR</label>--}}
                                        {{--                                                    <input type="color" name="qr_font_color_ar_en" id="qr_font_color_ar_en"--}}
                                        {{--                                                           class="form-control">--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
                                             aria-labelledby="form_ar_en_done" id="form_ar_en_done">
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-300 p-4">
                                    <div class="position-relative mx-auto " id="border_color_ar_en_element"
                                         style="font-size: 13px; height: 556px;width: 800px; background: white; color: black;">

                                        <div class="position-absolute start-0 top-0 p-2">
                                            <p id="image_corner_top_right_element_ar_en" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div class="position-absolute end-0 top-0 p-2">
                                            <p id="image_corner_top_left_element_ar_en" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div class="position-absolute bottom-0 start-0 p-2">
                                            <p id="image_corner_bottom_right_element_ar_en" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>
                                        <div class="position-absolute bottom-0 end-0 p-2">
                                            <p id="image_corner_bottom_left_element_ar_en" class="p-0 m-0"
                                               style="width:100px; height: 100px"></p>
                                        </div>

                                        <div
                                                class=" w-100 text-center rounded-1 position-absolute start-50
                                        translate-middle-x"
                                                style="top:7% !important;">
                                            <p class="p-0 m-0 fs-3" id="title_ar_en_ar_element">
                                                عنوان الشهادة بالعربي
                                            </p>
                                            <p class="p-0 m-0 fs-2" id="title_ar_en_en_element">
                                                Certificate title for a course...
                                            </p>
                                        </div>
                                        <div
                                                class="light rounded-1 position-absolute start-50 translate-middle-x w-100 text-center"
                                                style="top:25% !important;">
                                            <div class="d-flex justify-content-between text-center  ">
                                                <div class="w-50 mx-2">
                                                    <p class="m-0 " id="before_student_name_ar_en_ar_element">
                                                        يبارك مؤسسة/جامعة...
                                                    </p>
                                                    <p class="m-0 " id="">
                                                        ممثلا في:

                                                        {{$course->instructor}}
                                                    </p>


                                                    <p class="m-0 lh-lg fs-3" id="student_variable_ar_en_ar">
                                                        (اسم الطالب )</p>
                                                    <p class="m-0 lh-lg " id="before_course_name_ar_en_ar_element">
                                                        لاتمام دورة
                                                    </p>

                                                    <p class="my-2 fs-1"
                                                       id="course_variable_ar_en_ar">{{$course->name}}</p>

                                                    <div class="m-0 d-flex justify-content-center gap-3">
                                                        <p class="mb-0">
                                                            <span>الجنسية:</span>
                                                            <span>{الجنسية}</span>
                                                        </p>

                                                        <p class="mb-0">
                                                            <span>رقم الهوية:</span>
                                                            <span>{الرقم}</span>
                                                        </p>
                                                    </div>

                                                    <div class="m-0 d-flex justify-content-center gap-3">
                                                        @if($course->from)
                                                            <p class="mb-0">
                                                                <span>من تاريخ:</span>
                                                                <span>{{$course->from}}</span>
                                                            </p>
                                                        @endif
                                                        @if($course->to)

                                                            <p class="mb-0">
                                                                <span>الى تاريخ:</span>
                                                                <span>{{$course->to}}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    @if($course->days)
                                                        <div class="m-0 my-2">
                                                            <p class="mb-0">
                                                                <span>عدد الأيام:</span>
                                                                <span>{{$course->days}}</span>
                                                            </p>
                                                        </div>
                                                    @endif
                                                    @if($course->hours)
                                                        <p class="m-0 lh-lg my-2">
                                                            <span id="before_number_of_hour_ar_en_ar_element">بواقع عدد ساعات تدريبية:</span>
                                                            <span id="number_of_hour_ar_en_ar_element"> {{$course->hours}} </span>
                                                        </p>
                                                    @endif

                                                    <p class="mb-0 my-2"><span id="end_date_ar_en_ar_element">تم اصدار بتاريخ:</span>
                                                        <span dir="rtl"
                                                              id="end_date_ar_en_ar_variable"> {{$course->publishdate}}</span>
                                                    </p>
                                                    <p class="mb-0 py-2" id="notes_ar_en_ar_element">
                                                        متمنيا لكم دوام التوفيق والنجاح
                                                    </p>


                                                </div>
                                                <div class="w-50 mx-2">
                                                    <p class="m-0 " id="before_student_name_ar_en_en_element">wishes to
                                                        Congratulate</p>
                                                    <p class="m-0">
                                                        Represented in:
                                                        {{$course->instructor_en}}</p>
                                                    <p class="m-0 lh-lg fs-3" id="student_variable_ar_en_en">
                                                        (Student name)</p>
                                                    <p class="m-0 lh-lg " id="before_course_name_ar_en_en_element">on
                                                        completing the course</p>
                                                    <p class="my-2 fs-1"
                                                       id="course_variable_ar_en_en">{{$course->name_en}}</p>

                                                    <div class="m-0 d-flex justify-content-center gap-3">
                                                        <p class="mb-0">
                                                            <span>Id Number:</span>
                                                            <span>{ID}</span>
                                                        </p>

                                                        <p class="mb-0">
                                                            <span>Nationality:</span>
                                                            <span>{Nationality}</span>
                                                        </p>
                                                    </div>
                                                    <div class="m-0 d-flex justify-content-center gap-3" dir="ltr">
                                                        @if($course->from)
                                                            <p class="mb-0">
                                                                <span>From date:</span>
                                                                <span>{{$course->from}}</span>
                                                            </p>
                                                        @endif
                                                        @if($course->to)
                                                            <p class="mb-0">
                                                                <span>To date:</span>
                                                                <span>{{$course->to}}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    @if($course->days)
                                                        <div class="m-0 my-2">
                                                            <p class="mb-0">
                                                                <span>Number of Days:</span>
                                                                <span>{{$course->days}}</span>
                                                            </p>
                                                        </div>
                                                    @endif
                                                    @if($course->hours)
                                                        <p class="m-0 lh-lg my-2">
                                                            <span id="before_number_of_hour_ar_en_en_element">Number of Training Hours:</span>
                                                            <span id="number_of_hour_ar_en_en_element"> {{$course->hours}} </span>
                                                        </p>
                                                    @endif
                                                    <p class="mb-0 my-2"><span
                                                                id="end_date_ar_en_en_element">Issue Date:</span>
                                                        <span id="end_date_ar_en_en_variable"> {{$course->publishdate}} </span>
                                                    </p>
                                                    <p class="mb-0 py-2" id="notes_ar_en_en_element">wishing you
                                                        continuous
                                                        success</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div
                                                class="light rounded-1 position-absolute bottom-0 start-50 translate-middle-x text-center"
                                                style="bottom:4% !important;">

                                            <img src="{{asset('admin/assets/img/qrimg.png')}}" width="80"
                                                 alt="">
                                            <p class="m-0" id="describe_qr_ar_en_element">scan to verify</p>
                                        </div>
                                    </div>
                                    <div class="d-block text-center">
                                        <button type="submit" class="btn btn-info col-6 mt-3 ">حفظ</button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function () {
                                    $('#title_ar_en_ar').on("keypress change", function () {
                                        document.getElementById('title_ar_en_ar_element').innerHTML = $(this).val();
                                    });
                                    $('#title_ar_en_en').on("keypress change", function () {
                                        document.getElementById('title_ar_en_en_element').innerHTML = $(this).val();
                                    });
                                    $('#before_student_name_ar_en_ar').on("keypress change", function () {
                                        document.getElementById('before_student_name_ar_en_ar_element').innerHTML = $(this).val();
                                    });
                                    $('#before_student_name_ar_en_en').on("keypress change", function () {
                                        document.getElementById('before_student_name_ar_en_en_element').innerHTML = $(this).val();
                                    });
                                    $('#before_course_name_ar_en_ar').on("keypress change", function () {
                                        document.getElementById('before_course_name_ar_en_ar_element').innerHTML = $(this).val();
                                    });
                                    $('#before_course_name_ar_en_en').on("keypress change", function () {
                                        document.getElementById('before_course_name_ar_en_en_element').innerHTML = $(this).val();
                                    });
                                    $('#before_number_of_hour_ar_en_ar').on("keypress change", function () {
                                        document.getElementById('before_number_of_hour_ar_en_ar_element').innerHTML = $(this).val();
                                    });
                                    $('#before_number_of_hour_ar_en_en').on("keypress change", function () {
                                        document.getElementById('before_number_of_hour_ar_en_en_element').innerHTML = $(this).val();
                                    });
                                    $('#end_date_ar_en_ar').on("keypress change", function () {
                                        document.getElementById('end_date_ar_en_ar_element').innerHTML = $(this).val();
                                    });
                                    $('#end_date_ar_en_en').on("keypress change", function () {
                                        document.getElementById('end_date_ar_en_en_element').innerHTML = $(this).val();
                                    });
                                    $('#notes_ar_en_ar').on("keypress change", function () {
                                        document.getElementById('notes_ar_en_ar_element').innerHTML = $(this).val();
                                    });
                                    $('#notes_ar_en_en').on("keypress change", function () {
                                        document.getElementById('notes_ar_en_en_element').innerHTML = $(this).val();
                                    });
                                    $('#describe_qr_ar_en').on("keypress change", function () {
                                        document.getElementById('describe_qr_ar_en_element').innerHTML = $(this).val();
                                    });


                                    $('#image_ar_en').change(function () {
                                        // $('#border_color_element').css('border-color', $(this).val());
                                        readURL_ar_en(this);

                                    });

                                    function readURL_ar_en(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#border_color_ar_en_element').css('background-image', 'url(' + e.target.result + ')');
                                                $('#border_color_ar_en_element').css('background-repeat', 'no-repeat');
                                                $('#border_color_ar_en_element').css('background-size', '800px 556px');
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            alert('select a file to see preview');
                                            $('#border_color_ar_en_element').css('background-image', '');
                                        }
                                    }


                                    $('#image_corner_top_right_ar_en').change(function () {
                                        readURLtop_right_ar_en(this)
                                    });

                                    function readURLtop_right_ar_en(input) {

                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#image_corner_top_right_element_ar_en').css('background-image', 'url(' + e.target.result + ')');
                                                $('#image_corner_top_right_element_ar_en').css('background-repeat', 'no-repeat');
                                                $('#image_corner_top_right_element_ar_en').css('background-size', '100px 100px');
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            alert('select a file to see preview');
                                            $('#image_corner_top_right_element_ar_en').css('background-image', '');
                                        }
                                    }

                                    $('#image_corner_top_left_ar_en').change(function () {
                                        readURLtop_left_ar_en(this)
                                    });

                                    function readURLtop_left_ar_en(input) {

                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#image_corner_top_left_element_ar_en').css('background-image', 'url(' + e.target.result + ')');
                                                $('#image_corner_top_left_element_ar_en').css('background-repeat', 'no-repeat');
                                                $('#image_corner_top_left_element_ar_en').css('background-size', '100px 100px');
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            alert('select a file to see preview');
                                            $('#image_corner_top_left_element_ar_en').css('background-image', '');
                                        }
                                    }

                                    $('#image_corner_bottom_right_ar_en').change(function () {
                                        readURLbottom_right_ar_en(this)
                                    });

                                    function readURLbottom_right_ar_en(input) {

                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#image_corner_bottom_right_element_ar_en').css('background-image', 'url(' + e.target.result + ')');
                                                $('#image_corner_bottom_right_element_ar_en').css('background-repeat', 'no-repeat');
                                                $('#image_corner_bottom_right_element_ar_en').css('background-size', '100px 100px');
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            alert('select a file to see preview');
                                            $('#image_corner_bottom_right_element_ar_en').css('background-image', '');
                                        }
                                    }

                                    $('#image_corner_bottom_left_ar_en').change(function () {
                                        readURLbottom_left_ar_en(this)
                                    });

                                    function readURLbottom_left_ar_en(input) {

                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                $('#image_corner_bottom_left_element_ar_en').css('background-image', 'url(' + e.target.result + ')');
                                                $('#image_corner_bottom_left_element_ar_en').css('background-repeat', 'no-repeat');
                                                $('#image_corner_bottom_left_element_ar_en').css('background-size', '100px 100px');
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            alert('select a file to see preview');
                                            $('#image_corner_bottom_left_element_ar_en').css('background-image', '');
                                        }
                                    }

                                    //
                                    // $('#border_color_ar_en').change(function () {
                                    //     $('div #border_color_ar_en_element').css('border-color', $(this).val());
                                    // });
                                    // $('#cancel_border_ar_en').click(function () {
                                    //     if (document.getElementById('cancel_border_ar_en').checked) {
                                    //         $("div #border_color_ar_en_element").css('border', 'none');
                                    //     } else {
                                    //         $("div #border_color_ar_en_element").css({"border": "10px solid #000"});
                                    //     }
                                    // });
                                    //
                                    // $('#background_color_ar_en').change(function () {
                                    //     $('#border_color_ar_en_element').css('background-color', $(this).val());
                                    // });


                                    // $('#title_font_color_ar_en').change(function () {
                                    //     $('#title_ar_en_ar_element').css('color', $(this).val());
                                    //     $('#title_ar_en_en_element').css('color', $(this).val());
                                    // });
                                    // $('#text_before_student_course_font_color_ar_en').change(function () {
                                    //     $('#before_student_name_ar_en_ar_element').css('color', $(this).val());
                                    //     $('#before_course_name_ar_en_ar_element').css('color', $(this).val());
                                    //     $('#before_student_name_ar_en_en_element').css('color', $(this).val());
                                    //     $('#before_course_name_ar_en_en_element').css('color', $(this).val());
                                    // });
                                    //
                                    // $('#student_name_font_color_ar_en').change(function () {
                                    //     $('#student_variable_ar_en_ar').css('color', $(this).val());
                                    //     $('#student_variable_ar_en_en').css('color', $(this).val());
                                    // });
                                    // $('#course_name_font_color_ar_en').change(function () {
                                    //     $('#course_variable_ar_en_ar').css('color', $(this).val());
                                    //     $('#course_variable_ar_en_en').css('color', $(this).val());
                                    // });


                                    // $('#text_hour_font_color_ar_en').change(function () {
                                    //     $('#before_number_of_hour_ar_en_ar_element').css('color', $(this).val());
                                    //     $('#before_number_of_hour_ar_en_en_element').css('color', $(this).val());
                                    // });
                                    // $('#variable_hour_font_color_ar_en').change(function () {
                                    //     $('#number_of_hour_ar_en_ar_element').css('color', $(this).val());
                                    //     $('#number_of_hour_ar_en_en_element').css('color', $(this).val());
                                    // });
                                    // $('#text_date_font_color_ar_en').change(function () {
                                    //     $('#end_date_ar_en_ar_element').css('color', $(this).val());
                                    //     $('#end_date_ar_en_en_element').css('color', $(this).val());
                                    // });
                                    // $('#variable_date_font_color_ar_en').change(function () {
                                    //     $('#end_date_ar_en_ar_variable').css('color', $(this).val());
                                    //     $('#end_date_ar_en_en_variable').css('color', $(this).val());
                                    // });
                                    // $('#qr_font_color_ar_en').change(function () {
                                    //     $('#describe_qr_ar_en_element').css('color', $(this).val());
                                    // });
                                    // $('#notes_font_color_ar_en').change(function () {
                                    //     $('#notes_ar_en_ar_element').css('color', $(this).val());
                                    //     $('#notes_ar_en_en_element').css('color', $(this).val());
                                    // });


                                });
                            </script>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#ar').hide();
            $('#en').hide();
            $('#ar_en').hide();

            $('input').on('change', function () {
                var image = $('input[name="type"]:checked').val();
                if (image == "ar") {
                    $('#en').hide();
                    $('#ar_en').hide();
                    $('#ar').show();

                } else if (image == "en") {
                    $('#ar').hide();
                    $('#ar_en').hide();
                    $('#en').show();

                } else if (image == "ar_en") {
                    $('#ar').hide();
                    $('#en').hide();
                    $('#ar_en').show();

                }

                $('#pills-design-tab').trigger('click')


            });

        });
    </script>
    {{--    <script>--}}
    {{--        document.addEventListener("DOMContentLoaded", function(event) {--}}
    {{--            let ar = document.getElementById('ar');--}}
    {{--            let en = document.getElementById('en');--}}
    {{--            let ar_en = document.getElementById('ar_en');--}}
    {{--            let image = document.getElementsByName('image_check');--}}
    {{--            console.log(image)--}}
    {{--            image[0].addEventListener('change', () => {--}}
    {{--                alert(image.value());--}}
    {{--                // var image = $('input[name="image_check"]:checked').val();--}}
    {{--                if (image == "ar") {--}}
    {{--                    en.classList.add('d-none');--}}
    {{--                    ar_en.classList.add('d-none')--}}
    {{--                    ar.classList.remove('d-none');--}}
    {{--                    ar.classList.add('d-block');--}}
    {{--                } else if (image == "en") {--}}
    {{--                    ar_en.classList.add('d-none')--}}
    {{--                    ar.classList.add('d-none')--}}
    {{--                    en.classList.remove('d-none');--}}
    {{--                    en.classList.add('d-block');--}}
    {{--                } else if (image == "ar_en") {--}}
    {{--                    en.classList.add('d-none');--}}
    {{--                    ar.classList.add('d-none');--}}
    {{--                    ar_en.classList.remove('d-none')--}}
    {{--                    ar_en.classList.add('d-block')--}}
    {{--                }--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
@push('js')
@endpush

