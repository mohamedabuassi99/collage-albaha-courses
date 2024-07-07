@extends('layouts.front.app')

@section('title')
    {{$course->name}}
@endsection

@push('css')
    <style>
        .rate:not(:checked) > input {
            display: none;
        }

        .rate:not(:checked) > label {
            /*float:right;*/
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked) > label:before {
            content: '★ ';
        }

        .rate > input:checked ~ label {
            color: #ffc700;
        }

        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }

        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

    </style>
@endpush
@section('content')

    <div class="container px-5 ">
        <div class="row ">
            {{--            @include('front.student.sidebar.sidebar')--}}
            <div class="col-12 col-lg-12 shadow bg-white rounded-3 mt-3 p-0">
                @if(session('success'))
                    <div class="alert alert-success border-2 m-3 d-flex align-items-center" role="alert">
                        <div class="bg-success me-3 icon-item"><span
                                    class="fas fa-times-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">{{session('success')}}
                        </p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('failed'))
                    <div class="alert alert-danger border-2 m-3 d-flex align-items-center" role="alert">
                        <div class="bg-danger me-3 icon-item"><span
                                    class="fas fa-times-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">{{session('failed')}}
                        </p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <header class="text-center my-4  ">
                    <h3>{{$course->name}}</h3>
                    <h4>{{$course->name_en}}</h4>
                </header>
                <main>
                    <ul class="list-unstyled mx-3 row ">
                        @if($course->instructor ?? $course->instructor_en)
                            <li class="col-md-4 col-12 mb-4">
                                <span class="fs-1 text-black">اسم المدرب</span>:
                                <span>{{$course->instructor ?? $course->instructor_en}}</span>
                            </li>
                        @endif

                        @if($course->hours)
                            <li class="col-md-4 col-12 mb-4">
                                <span class="fs-1 text-black">عدد ساعات الدورة</span>:
                                <span>{{$course->hours }}</span>
                            </li>
                        @endif
                        @if($course->days)
                            <li class="col-md-4 col-12 mb-4">
                                <span class="fs-1 text-black">عدد ايام الدورة</span>:
                                <span>{{$course->days }}</span>
                            </li>
                        @endif
                        @if($course->from)
                            <li class="col-md-4 col-12 mb-4">
                                <span class="fs-1 text-black">بداية الدورة</span>:
                                <span>{{$course->from }}</span>
                            </li>
                        @endif
                        @if($course->to)
                            <li class="col-md-4 col-12 mb-4">
                                <span class="fs-1 text-black">نهاية الدورة</span>:
                                <span>{{$course->to }}</span>
                            </li>
                        @endif
                    </ul>


                    @if($course->to <= today()->toDateString())
                        <hr class="hr-19 bg-white mx-md-5 mx-3">
                        @if($rating)
                            <header>
                                <h5 class="text-black text-center my-4 ">التقيم الخاص بي لهذه الدورة</h5>
                            </header>
                            <main class="text-center row col-12 col-md-6 mx-auto">
                                <p class="">
                                    {{$rating->description}}
                                </p>
                                <div class="d-flex justify-content-center">
                                    @for($x=1;$x<=5;$x++)
                                        @if($x<=$rating->value)
                                            <svg width="35" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 47.94 47.94" style="enable-background:new 0 0 47.94 47.94;" xml:space="preserve">
<path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
</svg>
                                        @else
                                            <svg width="35" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 47.94 47.94" style="enable-background:new 0 0 47.94 47.94;" xml:space="preserve">
<path style="fill:#716a62;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
</svg>
                                        @endif
                                    @endfor
                                </div>
                            </main>
                        @else

                            <header>
                                <h3 class="text-black text-center my-4 ">
                                    تقييم الدورة
                                </h3>
                            </header>
                            <main class="text-center row col-12 col-md-6 mx-auto">

                                <div>
                                    <form action="{{route('student.course.register.rating.store',$student->courses->first()->pivot)}}"
                                          method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="description">
                                                ادخل تقييمك لهذه الدورة:
                                            </label><textarea class="form-control"
                                                              name="description"
                                                              id="description"
                                                              rows="3"></textarea></div>

                                        <div class="rate">
                                            <input type="radio" id="star5" name="value" value="5"/>
                                            <label for="star5" title="text"></label>
                                            <input type="radio" id="star4" name="value" value="4"/>
                                            <label for="star4" title="text"></label>
                                            <input type="radio" id="star3" name="value" value="3"/>
                                            <label for="star3" title="text"></label>
                                            <input type="radio" id="star2" name="value" value="2"/>
                                            <label for="star2" title="text"></label>
                                            <input type="radio" id="star1" name="value" value="1"/>
                                            <label for="star1" title="text"></label>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </main>
                        @endif

                    @endif

                    @if($course->to <= today()->toDateString())
                        <hr class="hr-19 bg-white mx-md-5 mx-3">
                        <header>
                            <h3 class="text-black text-center my-4 ">
                                طباعة الشهادة
                            </h3>
                        </header>
                        <main class="text-center py-3">
                            @if($student->courses->first()->pivot->status)
                                @if($course->design || $course->id < 160)
                                    @if($course->exam)
                                        @if((int)@$course->exam->students->last()->pivot->grade >= (int)$course->exam->pass_mark)
                                            <a href="{{route('student.course.print',$course)}}"
                                               class="btn btn-falcon-primary ">
                                                <span class="">تنزيل</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 477 477" style="enable-background:new 0 0 30 30;"
                                                     xml:space="preserve">
<path d="M462,55H15C6.716,55,0,61.715,0,70v298c0,8.284,6.716,15,15,15h263.7v29c0,3.449,1.777,6.654,4.702,8.481
	c1.614,1.009,3.453,1.519,5.298,1.519c1.497,0,2.998-0.336,4.387-1.014l28.393-13.858l28.394,13.858
	c3.103,1.515,6.763,1.322,9.685-0.505c2.925-1.827,4.702-5.032,4.702-8.481v-29H462c8.284,0,15-6.716,15-15V70
	C477,61.715,470.284,55,462,55z M278.172,270.692c0-23.879,19.428-43.307,43.307-43.307c23.88,0,43.308,19.428,43.308,43.307
	c0,23.88-19.428,43.308-43.308,43.308C297.6,314,278.172,294.572,278.172,270.692z M364.26,317.308
	c12.608-11.58,20.526-28.188,20.526-46.616c0-34.907-28.399-63.307-63.308-63.307c-34.907,0-63.307,28.399-63.307,63.307
	c0,18.429,7.92,35.038,20.528,46.618V324H102.072C97.978,302.228,80.771,285.022,59,280.927V157.072
	c21.771-4.095,38.978-21.301,43.072-43.072h272.855c4.095,21.771,21.301,38.978,43.072,43.072v123.855
	c-21.771,4.095-38.978,21.301-43.072,43.072H364.26V317.308z M344.26,395.991l-18.394-8.978c-2.77-1.352-6.004-1.352-8.773,0
	l-18.393,8.978v-66.247c7.074,2.738,14.75,4.256,22.778,4.256c8.03,0,15.707-1.519,22.781-4.257V395.991z M447,353h-82.74v-9H384
	c5.522,0,10-4.478,10-10c0-18.748,15.252-34,34-34c5.522,0,10-4.478,10-10V148c0-5.522-4.478-10-10-10c-18.748,0-34-15.252-34-34
	c0-5.522-4.478-10-10-10H93c-5.522,0-10,4.478-10,10c0,18.748-15.252,34-34,34c-5.522,0-10,4.478-10,10v142c0,5.522,4.478,10,10,10
	c18.748,0,34,15.252,34,34c0,5.522,4.478,10,10,10h185.7v9H30V85h417V353z"/>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
</svg>
                                            </a>
                                        @else
                                            <span class=" text-danger">لم تتخطى الامتحان</span>
                                        @endif
                                    @else
                                        <a href="{{route('student.course.print',$course)}}"
                                           class="btn btn-falcon-primary ">
                                            <span class="">تنزيل</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 477 477" style="enable-background:new 0 0 30 30;"
                                                 xml:space="preserve">
<path d="M462,55H15C6.716,55,0,61.715,0,70v298c0,8.284,6.716,15,15,15h263.7v29c0,3.449,1.777,6.654,4.702,8.481
	c1.614,1.009,3.453,1.519,5.298,1.519c1.497,0,2.998-0.336,4.387-1.014l28.393-13.858l28.394,13.858
	c3.103,1.515,6.763,1.322,9.685-0.505c2.925-1.827,4.702-5.032,4.702-8.481v-29H462c8.284,0,15-6.716,15-15V70
	C477,61.715,470.284,55,462,55z M278.172,270.692c0-23.879,19.428-43.307,43.307-43.307c23.88,0,43.308,19.428,43.308,43.307
	c0,23.88-19.428,43.308-43.308,43.308C297.6,314,278.172,294.572,278.172,270.692z M364.26,317.308
	c12.608-11.58,20.526-28.188,20.526-46.616c0-34.907-28.399-63.307-63.308-63.307c-34.907,0-63.307,28.399-63.307,63.307
	c0,18.429,7.92,35.038,20.528,46.618V324H102.072C97.978,302.228,80.771,285.022,59,280.927V157.072
	c21.771-4.095,38.978-21.301,43.072-43.072h272.855c4.095,21.771,21.301,38.978,43.072,43.072v123.855
	c-21.771,4.095-38.978,21.301-43.072,43.072H364.26V317.308z M344.26,395.991l-18.394-8.978c-2.77-1.352-6.004-1.352-8.773,0
	l-18.393,8.978v-66.247c7.074,2.738,14.75,4.256,22.778,4.256c8.03,0,15.707-1.519,22.781-4.257V395.991z M447,353h-82.74v-9H384
	c5.522,0,10-4.478,10-10c0-18.748,15.252-34,34-34c5.522,0,10-4.478,10-10V148c0-5.522-4.478-10-10-10c-18.748,0-34-15.252-34-34
	c0-5.522-4.478-10-10-10H93c-5.522,0-10,4.478-10,10c0,18.748-15.252,34-34,34c-5.522,0-10,4.478-10,10v142c0,5.522,4.478,10,10,10
	c18.748,0,34,15.252,34,34c0,5.522,4.478,10,10,10h185.7v9H30V85h417V353z"/>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
</svg>
                                        </a>
                                    @endif
                                @else
                                    <p class="text-warning text-decoration-underline"> الشهادات غير جاهزة </p>
                                @endif
                            @else
                                <div class="text-dark">
                                    قيد التسجيل
                                </div>
                            @endif
                        </main>
                    @endif

                    @if($course->videos->count()>0)
                        <hr class="hr-19 bg-white mx-md-5 mx-3">
                        <header>
                            <h3 class="text-black text-center my-4 ">
                                المحاضرات(YouTube)
                            </h3>
                        </header>
                        <main class="text-center">
                            <a href="{{route('student.courses.youtube_lectures.index',$course)}}"
                               class="btn btn-falcon-danger">عرض المحاضرات</a>
                        </main>
                    @endif

                    @if($course->lectures->count()>0)
                        <hr class="hr-19 bg-white mx-md-5 mx-3">
                        <header>
                            <h3 class="text-black text-center my-4 ">
                                المحاضرات(ZOOM)
                            </h3>
                        </header>
                        <main class="text-center">
                            <a href="{{route('student.courses.lectures.index',$course)}}"
                               class="btn btn-falcon-primary">عرض المحاضرات</a>
                        </main>
                    @endif
                    @if($course->exam)
                        <hr class="hr-19 bg-white mx-md-5 mx-3">
                        <header class="my-3 text-center">
                            <h3>
                                امتحان الدورة
                            </h3>
                        </header>
                        <main>
                            <ul class="list-unstyled mx-3 text-center row ">

                                <li class="col-md-6 col-12 s mb-4">
                                    <span class="fs-1 text-black">موعد الامتحان</span>:
                                    <span>{{\Carbon\Carbon::create($course->exam->from)->translatedFormat('l j F Y - h:i a')  }}</span>
                                </li>
                                <li class="col-md-6 col-12 s mb-4">
                                    <span class="fs-1 text-black">موعد نهاية الامتحان</span>:
                                    <span>{{\Carbon\Carbon::create($course->exam->to)->translatedFormat('l j F Y - h:i a')  }}</span>
                                </li>
                                <li class=" col-12  mb-4">
                                    <span class="fs-1 text-black">مدة الامتحان</span>:
                                    <span>{{ Carbon\Carbon::create($course->exam->from)->diffInMinutes($course->exam->to)}}  دقيقة </span>
                                </li>
                            </ul>

                            @if(@$course->exam->students->last()->pivot->finish)
                                <div class="text-center mb-4">
                                    <div class="table-responsive mx-3 rounded">
                                        <table class="table table-bordered">
                                            <tr class="table-dark">
                                                <th>المحاولة</th>
                                                <th>الحالة</th>
                                                <th>العلامة</th>
                                                <th>المراجعة</th>
                                            </tr>
                                            @foreach($course->exam->students as $attempt)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$attempt->pivot->finish?'تم التسليم '. \Carbon\Carbon::create($attempt->pivot->finish)->translatedFormat('l j F Y - h:i a') :'-'}}</td>
                                                    <td>
                                                        @if(\Carbon\Carbon::now()->greaterThan($course->exam->to))
                                                            {{$course->exam->final_mark.'/'.$attempt->pivot->grade}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(\Carbon\Carbon::now()->greaterThan($course->exam->to))
                                                            @if($course->exam->review)
                                                                <a href="{{route('student.courses.exam.review',$course->exam)}}">review</a>
                                                            @else
                                                                لا يوجد مراجعة
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="text-center my-4">
                                    @if(\Carbon\Carbon::now()->between($course->exam->from, $course->exam->to, true))
                                        <a href="{{route('student.courses.exam.attempt',$course->exam)}}"
                                           class="btn btn-falcon-default"> دخول الاختبار </a>
                                    @elseif(\Carbon\Carbon::now()->lessThan($course->exam->from))
                                        <p class="text-center">الوقت المتبقي
                                            للامتحان: {{\Carbon\Carbon::parse($course->exam->from)->diffForHumans()}}</p>
                                        <a href="javascript:void(0)" disabled class="btn btn-falcon-default">لم يبدا
                                            الاختبار بعد </a>
                                    @elseif(\Carbon\Carbon::now()->greaterThan($course->exam->to))
                                        <p class="text-danger">انتهى الاختبار </p>

                                    @endif
                                </div>
                            @endif
                        </main>
                    @endif
                </main>
            </div>
        </div>
    </div>

@endsection

