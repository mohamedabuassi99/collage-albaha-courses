<!doctype html>
<html lang="en">
<head>
    <title>{{$register->course->name??$register->course->name_en}}</title>
</head>
<style>
    td {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body style="position: relative; font-family: Lateef, sans-serif; " dir="rtl">

@if($register->course->design->type == "ar")
    <div style="position: absolute; width: 800px; height: 556px;
    @if($register->course->design->image != null)
            background-image: url({{asset('storage/'.$register->course->design->image)}});
            background-repeat:no-repeat;
            background-size:800px 556px;

    @endif ">
        <table style="width:100%;  top:-10%;">
            <tr style="">
                <td colspan="1" style="padding:10px; height:100px;width:100px;" width="14% ">
                    @if($register->course->design->image_corner_top_right)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_top_right)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>
                <td colspan="4" width="72%"
                    style="height:49px;  font-size:40px; text-align: center; padding-top:30px;">
                    <b style="">
                        {{$register->course->design->title_ar}}
                    </b>
                    <br>
                </td>
                <td colspan="1" style="padding: 10px; height:100px;width:100px; text-align: center;" width="14% ">
                    @if($register->course->design->image_corner_top_left)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_top_left)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>
            </tr>
            <tr style="">
                <td colspan="6" style="height:31px; ">
                </td>
            </tr>
            <tr style="">
                <td colspan="6" style="height:31px; font-size:27px; text-align: center; ">
                <span>
                    {{$register->course->design->before_student_name_ar}}
                </span></td>
            </tr>
            <tr style="">
                <td colspan="6" style="height: 80px; font-size:45px; text-align: center; ">
                <span>
                    {{$register->student->name}}
                </span></td>
            </tr>
            <tr style="">
                <td colspan="6"
                    style="height:auto; padding-top:15px; padding-bottom: 10px; width: 100%;  font-size:25px; text-align: center; ">

                    <span>
                          {{$register->course->design->before_course_name_ar}}
                      </span>
                    <span>
                        {{$register->course->name ?? '{اسم الدورة }'}}</span>

                </td>
            </tr>
            <tr style="">
                <td colspan="6"
                    style="height:auto; padding-top:5px; padding-bottom: 10px; font-size:20px; text-align: center; ">
                    @if($register->course->hours)
                        <span>
                        {{$register->course->design->describe_hour_ar}}:
                    </span>
                        <span
                        >{{$register->course->hours ??'{course_hours}'}}</span>
                    @endif
                </td>
            </tr>
            <tr style="">
                <td colspan="6"
                    style="height:auto; padding-top:5px; padding-bottom: 10px; font-size:20px; text-align: center; ">
                    <p class="mb-0" style="">
                        @if($register->student->id_number)
                            <span>رقم الهوية:</span>
                            <span>{{$register->student->id_number}}</span>
                        @endif
                        @if($register->student->nationality)
                            <span>الجنسية:</span>
                            <span>{{$register->student->nationality}}</span>
                        @endif
                    </p>
                </td>
            </tr>
            <tr style="display: flex">
                <td colspan="3"
                    style="height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    @if($register->course->design->name_jaha != null)
                        <p class="">
                            <span class=""
                            >{{$register->course->design->name_jaha}}</span>
                            <br>
                            <span class=""
                            >{{$register->course->design->describe_name_jaha}}</span>
                        </p>
                    @endif

                </td>
                <td colspan="3"
                    style="height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    @if($register->course->instructor != null)
                        <p class="">
                    <span class=""
                    >{{$register->course->design->describe_name_instructor}}</span>
                            <br>
                            <span class=""
                            >{{$register->course->instructor}}</span>
                        </p>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; text-align: center; padding-top: 50px; height:100px;width:100px;"
                    width="33% ">
                    @if($register->course->design->image_corner_bottom_right)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_bottom_right)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>
                <td width="34% " colspan="2"
                    style=" height: 150px; font-size:20px; text-align: center; padding-top: 20px;">
                    <div style="height: 80px; width: 80px; ">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(80)->generate(route('student.course.proof',$register->id))) !!} ">

                        <br>
                        <p>{{$register->course->design->describe_qr}}</p>
                    </div>
                </td>
                <td colspan="2" width="33% "
                    style=" height: 150px; font-size:16px; text-align: center; padding-left: 25px; padding-top: 40px; ">
                    @if($register->course->from)
                        <p class="" style="font-size: 20px;">
                            <span
                            >{{$register->course->design->start_date_ar}}</span>
                            <span
                            >{{$register->course->from}}</span>
                        </p>
                    @endif
                    @if($register->course->publishdate)
                        <p class="" style="font-size: 20px;">
                            <span
                            >{{$register->course->design->end_date_ar}}</span>
                            <span
                            >{{$register->course->publishdate}}</span>
                        </p>
                    @endif

                    <p class="" style="font-size: 20px;">
                        <span>{{$register->course->design->descripe_certificate_id_ar}}</span>
                        <span
                        >{{$register->id}}</span>
                    </p>
                </td>

            </tr>
        </table>
    </div>
@elseif($register->course->design->type == "en")
    <div style="position: absolute;

    @if($register->course->design->image != null)
            background-image: url({{asset('storage/'.$register->course->design->image)}});
            background-repeat:no-repeat;
            background-size:800px 556px;
    @endif
            ">
        <table style="width:100%; top:-10%; background: dodgerblue;" dir="ltr">

            <tr style="">
                <td colspan="1" style="padding: 10px; text-align: center; height:100px;width:100px;" width="14% ">
                    @if($register->course->design->image_corner_top_left)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_top_left)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>
                <td colspan="4" width="72%"
                    style="height:49px;  font-size:40px; text-align: center; padding-top:30px;">
                    <b style="">
                        {{$register->course->design->title_en}}
                    </b>
                    <br>
                </td>
                <td colspan="1" style="padding:10px; height:100px;width:100px;" width="14% ">
                    @if($register->course->design->image_corner_top_right)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_top_right)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>
            </tr>
            <tr style="">
                <td colspan="6" style="height:31px; ">
                </td>
            </tr>
            <tr style="">
                <td colspan="6" style="height:36px; font-size:23px; text-align: center; ">
                <span>
                    {{$register->course->design->before_student_name_en}}
                </span></td>
            </tr>
            <tr style="">
                <td colspan="6" style="height: 85px;  font-size:45px; text-align: center; ">
                <span>
                    {{$register->student->name_en}}
                </span>
                </td>
            </tr>
            <tr style="">
                <td colspan="6"
                    style="height:auto; padding-top:5px; padding-bottom: 10px; width: 100%;  font-size:25px; text-align: center; ">

                    <span>
                          {{$register->course->design->before_course_name_en}}
                      </span>
                    <span>
                        {{$register->course->name_en ?? '{اسم الدورة }'}}</span>

                </td>
            </tr>
            <tr style="">
                <td colspan="6"
                    style="height:auto; padding-top:5px; padding-bottom: 10px; font-size:20px; text-align: center; ">
                    @if($register->course->hours)
                        <span>
                        {{$register->course->design->describe_hour_en}}:
                    </span>
                        <span
                        >{{$register->course->hours ??'{course_hours}'}}</span>
                    @endif
                </td>
            </tr>
            <tr style="">
                <td colspan="6"
                    style="height:auto; padding-top:5px; padding-bottom: 10px; font-size:20px; text-align: center; ">
                    <p class="mb-0" style="">
                        @if($register->student->id_number)
                            <span>Id Number:</span>
                            <span>{{$register->student->id_number}}</span>
                        @endif
                        @if($register->student->nationality_en)
                            <span>Nationality:</span>
                            <span>{{$register->student->nationality_en}}</span>
                        @endif
                    </p>
                </td>
            </tr>
            <tr style="display: flex">
                <td colspan="3"
                    style="height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    @if($register->course->instructor_en != null)
                        <p class="">
                    <span class=""
                    >{{$register->course->design->describe_name_instructor}}</span>
                            <br>
                            <span class=""
                            >{{$register->course->instructor_en}}</span>
                        </p>
                    @endif
                </td>
                <td colspan="3"
                    style="height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    @if($register->course->design->name_jaha != null)
                        <p class="">
                            <span class=""
                            >{{$register->course->design->name_jaha}}</span>
                            <br>
                            <span class=""
                            >{{$register->course->design->describe_name_jaha}}</span>
                        </p>
                    @endif

                </td>

            </tr>
            <tr>

                <td colspan="2" width="33% "
                    style=" height: 150px; font-size:20px; text-align: center; padding-left: 25px; padding-top: 40px; ">
                    @if($register->course->from)
                        <p class="" style="">
                            <span
                            >{{$register->course->design->start_date_en}}</span>
                            <span
                            >{{$register->course->from}}</span>
                        </p>
                    @endif
                    @if($register->course->publishdate)
                        <p class="" style="">
                            <span
                            >{{$register->course->design->end_date_en}}</span>
                            <span
                            >{{$register->course->publishdate}}</span>
                        </p>
                    @endif

                    <p class="" style="">
                        <span
                        >{{$register->course->design->descripe_certificate_id_en}}</span>
                        <span
                        >{{$register->id}}</span>
                    </p>
                </td>
                <td width="34% " colspan="2"
                    style=" height: 150px; font-size:20px; text-align: center; padding-top: 20px;">
                    <div style="height: 80px; width: 80px; ">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(80)->generate(route('student.course.proof',$register->id))) !!} ">
                    </div>
                    <br>
                    <p>{{$register->course->design->describe_qr}}</p>
                </td>
                <td colspan="2" style="padding: 10px; text-align: center; padding-top: 55px; height:100px;width:100px;"
                    width="33% ">
                    @if($register->course->design->image_corner_bottom_right)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_bottom_right)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>

            </tr>
        </table>
    </div>
@elseif($register->course->design->type == "ar_en")
    <div style="position: absolute;

    @if($register->course->design->image != null)
            background-image: url({{asset('storage/'.$register->course->design->image)}});
            background-repeat:no-repeat;
            background-size:800px 557px;
    @endif
            ">
        <table style="width:100%; top:-10%; ">

            <tr style=" ">
                <td colspan="1" style="padding:10px; text-align:right" width="14% ">
                    @if($register->course->design->image_corner_top_right)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_top_right)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>
                <td colspan="4"
                    style="height:49px;  font-size:40px; text-align: center; padding-top:30px;">
                    <b>
                        {{$register->course->design->title_ar}}
                    </b>
                    <br>
                    <b style="font-size: 34px;
                        ">
                        {{$register->course->design->title_en}}
                    </b>
                </td>

                <td colspan="1" style="padding:10px;" width="14% ">
                    @if($register->course->design->image_corner_top_left)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_top_left)}}"
                             style=" height:100px; width:100px;">
                    @endif
                </td>
            </tr>
            <tr style="">
                <td style="height:40px; "></td>
            </tr>

            <tr style=" height: 40px;" width="">
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 350px; font-size:20px; text-align: center; ">
                    <p class="m-0 "
                       style="">
                        {{$register->course->design->before_student_name_ar}}
                    </p>
                    <p class="">
                        ممثلا في:

                        {{$register->course->instructor}}</p>
                    <p class="" style="font-size: 30px; ">
                        بان المتدرب/ة  {{$register->student->name}}</p>
                </td>
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 350px; font-size:20px; text-align: center; ">
                    <p class="m-0 "
                       style="">
                        {{$register->course->design->before_student_name_en}}
                    </p>
                    <p class="">
                        Represented in:
                        {{$register->course->instructor_en}}</p>
                    <p class=""
                       style="font-size: 30px; ">
                        That the trainee {{$register->student->name_en}}</p>
                </td>
            </tr>



            <tr style="">
                <td colspan="3"
                    style=" height:auto; line-height: 30px;  width: 390px; font-size:25px; text-align: center; ">
                    <p class="">
                        {{$register->course->design->before_course_name_ar}}
                    </p>
                    <p class="" style="font-size: 23px; ">{{$register->course->name}}</p>
                </td>
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:25px; text-align: center;">
                    <p class="">
                        {{$register->course->design->before_course_name_en}}
                    </p>
                    <p class=""
                       style="font-size: 23px; "
                    >{{$register->course->name_en}}</p>
                </td>
            </tr>
            <tr style="">
                <td colspan="3"
                    style=" height:auto; line-height: 30px;  width: 390px; font-size:20px; text-align: center;">
                    <p class="mb-0" style="">
                        @if($register->student->id_number)
                            <span>رقم الهوية:</span>
                            <span>{{$register->student->id_number}}</span>
                        @endif
                        @if($register->student->nationality)
                            <span>الجنسية:</span>
                            <span>{{$register->student->nationality}}</span>
                        @endif
                    </p>

                </td>

                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    <div class="m-0 d-flex justify-content-center gap-3" style="">
                        <p class="mb-0" style="">
                            @if($register->student->id_number)
                                <span>Id Number:</span>
                                <span>{{$register->student->id_number}}</span>
                            @endif
                            @if($register->student->nationality_en)
                                <span>Nationality:</span>
                                <span>{{$register->student->nationality_en}}</span>
                            @endif
                        </p>

                    </div>

                </td>
            </tr>

            <tr style="">
                <td colspan="3"
                    style=" height:auto; line-height: 30px;  width: 390px; font-size:20px; text-align: center;">
                    <p class="mb-0" style="">
                        @if($register->course->from)
                            <span>من تاريخ:</span>
                            <span>{{$register->course->from}}</span>
                        @endif
                        @if($register->course->to)
                            <span>الى تاريخ:</span>
                            <span>{{$register->course->to}}</span>
                        @endif
                    </p>

                </td>
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    <div class="m-0 d-flex justify-content-center gap-3" style="">
                        <p class="mb-0" style="">
                            @if($register->course->from)
                                <span>From date:</span>
                                <span>{{$register->course->from}}</span>
                            @endif
                            @if($register->course->to)
                                <span>To date:</span>
                                <span>{{$register->course->to}}</span>
                            @endif
                        </p>

                    </div>

                </td>
            </tr>
            @if($register->course->days)
                <tr style="">
                    <td colspan="3"
                        style=" height:auto; line-height: 30px;  width: 390px; font-size:20px; text-align: center;">
                        <p class="mb-0" style="">
                            <span>عدد الأيام:</span>
                            <span>{{$register->course->days}}</span>
                        </p>

                    </td>
                    <td colspan="3"
                        style=" height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                        <div class="m-0 d-flex justify-content-center gap-3" style="">
                            <p class="mb-0" style="">
                                <span>Number of Days:</span>
                                <span>{{$register->course->days}}</span>
                            </p>
                        </div>
                    </td>
                </tr>
            @endif
            <tr style="">
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    <span>
                        {{$register->course->design->describe_hour_ar}} </span>
                    <span>
                        {{$register->course->hours}}</span>
                </td>
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center; direction: ltr;">
                   <span>
                        {{$register->course->design->describe_hour_en}} </span>
                    <span>
                        {{$register->course->hours}}</span>
                </td>
            </tr>
            <tr style="display: flex">
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center;">
                    <span>{{$register->course->design->end_date_ar}}</span>
                    <span dir="rtl"> {{$register->course->publishdate}}</span>
                </td>
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:20px; text-align: center; direction: ltr;">
                    <span>{{$register->course->design->end_date_en}}</span>
                    <span dir="rtl"> {{$register->course->publishdate}}</span>
                </td>
            </tr>
            <tr style="display: flex">
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:24px; text-align: center;">
                    <p class="m-0 py-2">
                        {{$register->course->design->note_ar}}
                    </p>
                </td>
                <td colspan="3"
                    style=" height:auto; line-height: 30px; width: 390px; font-size:24px; text-align: center;">
                    <p class="m-0 py-2">
                        {{$register->course->design->note_en}}
                    </p>
                </td>
            </tr>
            <tr style="padding:10px;">
                <td colspan="1" style="padding:10px ; padding-top:50px;  height:100px;width:100px;" width="14% ">
                    @if($register->course->design->image_corner_bottom_right)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_bottom_right)}}"
                             style=" height:100px;width:100px;">
                    @endif
                </td>
                <td colspan="4" style=" height: 150px; width:72%; font-size:20px; text-align: center;">
                    <div style="height: 80px; width: 80px; ">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(80)->generate(route('student.course.proof',$register->id))) !!} ">
                    </div>
                    <p>{{$register->course->design->describe_qr}}</p>
                </td>
                <td colspan="1" style="padding:10px; padding-top:50px;  height:100px; width:100px; " width="14% ">
                    @if($register->course->design->image_corner_bottom_left)
                        <img src="{{asset('storage/'.$register->course->design->image_corner_bottom_left)}}"
                             style=" height:100px; width:100px;">
                    @endif
                </td>
            </tr>
        </table>
    </div>
@endif
</body>
</html>
