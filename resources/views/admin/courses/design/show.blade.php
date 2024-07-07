@extends('layouts.admin.app')
@section('title')
    تصميم دورة {{$course->name?? $course->name_en}}
@endsection
@push('css')
@endpush

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('back/assets/img/icons/spot-illustrations/corner-1.png')}});"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-12">
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
                    <div class="row g-0">
                        <div class="col-lg-12 pe-lg-2">
                            <div class="card-header">
                                <h2 class="mb-0 text-center">تصميم الشهادة </h2>
                            </div>
                            <div class="card-body d-flex justify-content-center align-items-center gap-5 bg-300">
                                @if($designCertificate->type == "ar")
                                    <div class=""
                                         style="font-size: 13px; height: 556px;width: 800px; color: black; background: white;">
                                        <div class=" align-content-center justify-content-center">
                                            <div class="col-12 p-0 img-fluid">
                                                <div class="position-relative   mb-4 "
                                                     style="font-size: 13px; height: 556px; width: 800px;
                                                     @if($designCertificate->image != null)
                                                             background-image:url('{{asset('storage/'.$designCertificate->image)}}');
                                                             background-repeat: no-repeat;
                                                             background-size: 800px 556px;
                                                     @endif
                                                             ">
                                                    <div class="position-absolute start-0 top-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_top_right)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div class="position-absolute end-0 top-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_top_left)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div class="position-absolute bottom-0 start-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_bottom_right)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>

                                                    <div class="light fs-3 w-100 text-center rounded-1 position-absolute start-50 translate-middle-x"
                                                         style="top:10% !important;">
                                                        <p class="">
                                                            {{$designCertificate->title_ar}}
                                                        </p>
                                                    </div>
                                                    <div class="light rounded-1 position-absolute start-50 translate-middle-x w-100 text-center"
                                                         style="top:25% !important;">
                                                        <p class="m-0 fs-2">
                                                            {{$designCertificate->before_student_name_ar}}
                                                        </p>

                                                        <p class="my-2 fs-5">
                                                            {student_name}
                                                        </p>
                                                        <p class="m-0">
                                                          <span>
                                                                {{$designCertificate->before_course_name_ar}}
                                                            </span>
                                                            <span>{{$course->name ?? '{اسم الدورة }'}}</span>
                                                        </p>
                                                        @if($course->hours)
                                                            <p class="my-2">
                                                            <span>
                                                                {{$designCertificate->describe_hour_ar}}:
                                                            </span>
                                                                <span>{{$course->hours}}</span>
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


                                                        <div
                                                                class="my-3 d-flex justify-content-around align-content-center">

                                                            <p class="">
                                                                @if($designCertificate->name_jaha != null)

                                                                    <span class="fs-1">{{$designCertificate->describe_name_jaha}}</span>
                                                                    <span class="d-block">{{$designCertificate->name_jaha}}</span>
                                                                @endif
                                                            </p>

                                                            <p class="">
                                                                <span class="fs-1">{{$designCertificate->describe_name_instructor}}</span>
                                                                <span class="d-block">{{$course->instructor}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                            class="light rounded-1 position-absolute bottom-0 start-50 translate-middle-x text-center"
                                                            style="bottom:7% !important;">

                                                        {{--                                                        <img src="{{asset('front/img/demo/presentation/qrcode.png')}}"--}}
                                                        {{--                                                             width="80"--}}
                                                        {{--                                                             alt="">--}}
                                                        {{--                                                        <div>--}}
                                                        {{--                                                            {{QrCode::format('png')->size(90)->generate('test')}}--}}
                                                        {{--                                                        </div>--}}
                                                        {!! QrCode::format('svg')->encoding('UTF-8')->size(80)->generate('Make me into a QrCode!'); !!}
                                                        <p class="m-0"
                                                        >{{$designCertificate->describe_qr}}</p>
                                                    </div>
                                                    <div
                                                            class="light rounded-1 position-absolute bottom-0 end-0 text-center "
                                                            style="left:3%!important; bottom:3% !important;">
                                                        @if($course->from)
                                                            <p class="my-2">
                                                                <span>{{$designCertificate->start_date_ar}}:</span>
                                                                <span
                                                                >{{$course->from}}</span>
                                                            </p>
                                                        @endif
                                                        @if($course->publishdate)
                                                            <p class="my-2">
                                                                <span>{{$designCertificate->end_date_ar}}:</span>
                                                                <span
                                                                >{{$course->publishdate}}</span>
                                                            </p>
                                                        @endif
                                                        <p class="my-2">
                                                            <span>{{$designCertificate->descripe_certificate_id_ar}}:</span>
                                                            <span>{{$designCertificate->id}}</span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                @elseif($designCertificate->type == "en")
                                    <div class=""
                                         style="font-size: 13px; height: 556px;width: 800px; color: black; background: white;">
                                        <div class="row align-content-center">
                                            <div class="col-12  p-0 img-fluid">
                                                <div class="position-relative   mb-4 "
                                                     style="font-size: 13px; height: 556px;width: 800px;

                                                     @if($designCertificate->image != null)
                                                             background-image:url('{{asset('storage/'.$designCertificate->image)}}');
                                                             background-repeat: no-repeat;
                                                             background-size: 800px 556px;
                                                     @endif
                                                             ">

                                                    <div class="position-absolute start-0 top-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_top_right)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div class="position-absolute end-0 top-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_top_left)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div class="position-absolute bottom-0 start-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_bottom_right)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>

                                                    <div class="light fs-3 w-100 text-center rounded-1 position-absolute start-50 translate-middle-x"
                                                         style="top:12% !important;">
                                                        <p class="">
                                                            {{$designCertificate->title_en}}
                                                        </p>
                                                    </div>
                                                    <div
                                                            class="light rounded-1 position-absolute start-50 translate-middle-x w-100 text-center"
                                                            style="top:25% !important;">
                                                        <p class="m-0 fs-2">
                                                            {{$designCertificate->before_student_name_en}}
                                                        </p>
                                                        <p class="my-2 fs-5">
                                                            {student_name}
                                                        </p>
                                                        <p class="m-0">
                                                            <span> {{$designCertificate->before_course_name_en}}  </span>
                                                            <span>{{{$course->name_en}}}</span>
                                                        </p>
                                                        @if($course->hours)
                                                            <p class="my-2">
                                                                <span>{{$designCertificate->describe_hour_en}}:</span>
                                                                <span>{{$course->hours}}</span>
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

                                                        <div
                                                                class="my-3 d-flex justify-content-around align-content-center">

                                                            <p class="">
                                                                @if($designCertificate->name_jaha != null)

                                                                    <span class="fs-1">{{$designCertificate->describe_name_jaha}}</span>
                                                                    <span class="d-block">{{$designCertificate->name_jaha}}</span>
                                                                @endif
                                                            </p>

                                                            <p class="">
                                                                <span class="fs-1">{{$designCertificate->describe_name_instructor}}</span>
                                                                <span class="d-block">{{$course->instructor_en}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                            class="light rounded-1 position-absolute bottom-0 start-50 translate-middle-x text-center"
                                                            style="bottom:7% !important;">

                                                        {!! QrCode::format('svg')->encoding('UTF-8')->size(80)->generate('Make me into a QrCode!'); !!}

                                                        <p class="m-0"
                                                        >
                                                            {{$designCertificate->describe_qr}}
                                                        </p>
                                                    </div>
                                                    <div
                                                            class="light rounded-1 position-absolute bottom-0 end-0 text-center "
                                                            style="left:3%!important; bottom:3% !important;">
                                                        @if($course->from)
                                                            <p class="my-2"><span
                                                                >{{$designCertificate->start_date_en}}:</span>
                                                                <span
                                                                >{{$course->from}}</span>
                                                            </p>
                                                        @endif
                                                        @if($course->publishdate)
                                                            <p class="my-2"><span
                                                                >{{$designCertificate->end_date_en}}:</span>
                                                                <span
                                                                >{{$course->publishdate}}</span>
                                                            </p>
                                                        @endif
                                                        <p class="my-2"><span
                                                            >{{$designCertificate->descripe_certificate_id_en}}:</span>
                                                            <span
                                                            >{{$designCertificate->id}}</span>
                                                        </p>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                @elseif($designCertificate->type == "ar_en")
                                    <div class=""
                                         style="font-size: 13px; height: 556px;width: 800px; color: black; background: white;">
                                        <div class="justify-content-center align-content-center">
                                            <div class="col-12 p-0 img-fluid">
                                                <div class="position-relative  mb-4 "
                                                     style="font-size: 13px; height: 556px;width: 800px;
                                                     @if($designCertificate->image != null)
                                                             background-image:url('{{asset('storage/'.$designCertificate->image)}}');
                                                             background-repeat: no-repeat;
                                                             background-size: 800px 556px;
                                                     @endif
                                                             ">
                                                    <div class="position-absolute start-0 top-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_top_right)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div class="position-absolute end-0 top-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_top_left)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div class="position-absolute bottom-0 start-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_bottom_right)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div class="position-absolute bottom-0 end-0 p-2">
                                                        <p class="p-0 m-0"
                                                           style=" background-image:url({{asset('storage/'.@$designCertificate->image_corner_bottom_left)}}); background-repeat: no-repeat; background-size: 100px 100px; width:100px; height: 100px"></p>
                                                    </div>
                                                    <div
                                                            class=" w-100 text-center rounded-1 position-absolute start-50 translate-middle-x"
                                                            style="top:7% !important;">
                                                        <p class="p-0 m-0 fs-3">
                                                            {{$designCertificate->title_ar}}
                                                        </p>
                                                        <p class="p-0 m-0 fs-2">
                                                            {{$designCertificate->title_en}}
                                                        </p>
                                                    </div>
                                                    <div
                                                            class="light rounded-1 position-absolute start-50 translate-middle-x w-100 text-center"
                                                            style="top:25% !important;">
                                                        <div class="d-flex justify-content-between text-center  ">

                                                            <div class="w-50 mx-2">
                                                                <p class="m-0 ">
                                                                    {{$designCertificate->before_student_name_ar}}
                                                                </p>

                                                                <p class="m-0 " id="">
                                                                    ممثلا في:

                                                                    {{$course->instructor}}
                                                                </p>

                                                                <p class="m-0 lh-lg fs-3">
                                                                    {اسم الطالب بالعربي}</p>
                                                                <p class="m-0 lh-lg ">
                                                                    {{$designCertificate->before_course_name_ar}}
                                                                </p>

                                                                <p class="my-2 fs-1">{{$course->name}}</p>

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
                                                                        <span>{{$designCertificate->describe_hour_ar}} </span>
                                                                        <span
                                                                        > {{$course->hours}}</span>
                                                                    </p>
                                                                @endif
                                                                <p class="m-0 my-2">
                                                                    <span>{{$designCertificate->end_date_ar}}</span>
                                                                    <span dir="rtl"> {{$course->publishdate}}</span>
                                                                </p>
                                                                <p class="m-0 py-2">
                                                                    {{$designCertificate->note_ar}}
                                                                </p>
                                                            </div>
                                                            <div class="w-50 mx-2">
                                                                <p class="m-0 ">{{$designCertificate->before_student_name_en}}</p>
                                                                <p class="m-0">
                                                                    Represented in:
                                                                    {{$course->instructor_en}}</p>
                                                                <p class="m-0 lh-lg fs-3">
                                                                    {student_name_en}</p>
                                                                <p class="m-0 lh-lg ">{{$designCertificate->before_course_name_en}}</p>
                                                                <p class="my-2 fs-1">{{$course->name_en}}</p>
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
                                                                <div class="m-0 d-flex justify-content-center gap-3"
                                                                     dir="ltr">
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
                                                                        <span>{{$designCertificate->describe_hour_en}}</span>
                                                                        <span
                                                                        > {{$course->hours}} </span>
                                                                    </p>
                                                                @endif
                                                                <p class="m-0 my-2">
                                                                    <span>{{$designCertificate->end_date_en}}</span>
                                                                    <span> {{$course->publishdate}} </span>
                                                                </p>
                                                                <p class="m-0 py-2"
                                                                >{{$designCertificate->note_en}}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="light rounded-1 position-absolute bottom-0 start-50 translate-middle-x text-center"
                                                         style="bottom:4% !important;">
                                                        {!! QrCode::format('svg')->encoding('UTF-8')->size(80)->generate('Make me into a QrCode!'); !!}
                                                        <p class="m-0"
                                                        >{{$designCertificate->describe_qr}}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
