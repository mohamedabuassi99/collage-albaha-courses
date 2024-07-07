@extends('layouts.front.app')
@section('title')
    الصفحة الرئيسية
@endsection
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <style>
        .swiper-button-next:after, .swiper-rtl .swiper-button-prev:after {
            content: none;
        }

        .swiper-button-prev:after, .swiper-rtl .swiper-button-next:after {
            content: none;
        }

        .swiper-button-next, .swiper-rtl .swiper-button-prev {
            right: auto;
        }

        .swiper-button-disabled {
            display: none !important;
        }


    </style>
@endpush
@section('content')
    @if(session('failed'))
        <div class="vh-100 mx-3 position-fixed z-index-2">
            <div class="alert alert-warning border-2 d-flex align-items-center top-50 mt-10" role="alert">
                <div class="bg-danger me-3 icon-item">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
<circle style="fill:#D75A4A;" cx="25" cy="25" r="25"/>
                        <polyline
                                style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;"
                                points="16,34 25,25 34,16
	"/>
                        <polyline
                                style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;"
                                points="16,16 25,25 34,34
	"/>
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
                </div>
                <p class="mb-0 flex-1">{{session('failed')}}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
  <div class="container-fluid position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 h-100 w-100  @if(!@$setting->cover) bg-cover @endif " style="@if(@$setting->cover) background-image: url({{getCover()}}); background-attachment: fixed;
                background-size: cover; @endif "></div>
        <div class="mx-auto row">
            <div class="col-12 col-md-6  d-flex justify-content-center align-items-center position-relative">
                <div class="w-75 text-center my-4">
                    <h1 class="text-black" style="backdrop-filter: blur(1px);">
                    {{ getTitle() }}
                    </h1>
                    <p class="text-muted my-4 fs-1" style="backdrop-filter: blur(1px);">منصة ادارة الدورات التدريبية</p>
                    <a href="#courses" class="btn btn-primary opacity-85 w-50"> الدورات المتاحة!</a>
                </div>
            </div>

            <div class="col-12 col-md-6  ">
                <div class="col-12 col-xl-7 col-md-12  mx-auto text-center opacity-85 card my-5 my-md-8  py-5 px-4">
                    @if(session('success'))
                        <p class="alert-success py-3 text-success">{{session('success')}}</p>
                    @endif
                    <h4>سجل معنا لكي يصلك تحديث الدورات الجديدة</h4>
                    <form action="{{route('subscriber.store')}}" method="post">
                        @csrf
                        <div class="m-3">
                            <label for="email" class="fs-1">البريد الاكتروني</label>
                            <input type="email" class="form-control  mx-auto py-2 "
                                   name="email"
                                   id="email">
                            @error('email')
                            <span class="d-block text-danger">
                                {{$message}}
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-outline-primary col-6 mt-2 mb-3 ">تسجيل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs justify-content-center mt-5 border-0">
                        @foreach($categories as $category)
                            <li class="nav-item ">
                                <a class="nav-link  @if($loop->first) active @endif" id="category-id-{{$category->id}}"
                                   data-bs-toggle="tab"
                                   href="#category-{{$category->id}}" role="tab"
                                   aria-controls="category-{{$category->id}}"
                                   aria-selected="@if($loop->first) true @else false @endif">{{$category->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content " id="courses">
                        @foreach($categories as $category)
                            <div class="tab-pane fade @if($loop->first) show active @endif "
                                 id="category-{{$category->id}}" role="tabpanel"
                                 aria-labelledby="category-id-{{$category->id}}">
                                <div class="row ">
                                    <div class="col-md-10 col-12 mx-auto">
                                        <div class="swiper mySwiper-{{$category->id}} py-3 position-relative">
                                            <div class="swiper-wrapper ">
                                                @forelse($category->courses as $course)
                                                    <div class="swiper-slide " style="">
                                                        <a href="{{route('home.course.show',$course)}}" class="a-card">
                                                            <div class="card " style="">
                                                                <div class="card-img-top">
                                                                    @if($course->cover)
                                                                        <img class="img-fluid rounded-top"
                                                                             style="height:170px; width: 100%"
                                                                             src="{{$course->getCover()}}"
                                                                             alt="{{$course->name}}"/>
                                                                    @else
                                                                        <div style=" height:170px; width: 100%"
                                                                             class="bg-card-gradient-course rounded-top d-flex align-items-center justify-content-center">
                                                                            <p class="text-white text-center fs-1"
                                                                               style="transform: rotate(-20deg)">{{$course->name ?? $course->name_en}}</p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="card-body">
                                                                    <p class="fs-1 custom-card-header text-dark text-nowrap overflow-hidden ">{{$course->name ?? $course->name_en}}</p>

                                                                    <div class="d-flex gap-2 ">

                                                                        @if($course->days)
                                                                            <p class="mb-1 text-secondary">
                                                                                <span>عدد الايام</span>
                                                                                <span> {{$course->days}} </span>
                                                                            </p>
                                                                        @endif
                                                                        @if($course->hours)
                                                                            <p class="mb-1 text-secondary">
                                                                                <span>عدد الساعات</span>
                                                                                <span>{{$course->hours}}</span>
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="d-flex gap-1">
                                                                        @if($course->from)
                                                                            <p class="mb-1 text-secondary">
                                                                                <span>من</span>
                                                                                <span>{{$course->from}}</span>
                                                                            </p>
                                                                        @endif
                                                                        @if($course->to)

                                                                            <p class="mb-1 text-secondary">
                                                                                <span>الى</span>
                                                                                <span>{{$course->to}}</span>
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                    {{--                                                                    <div class="text-center" style="height: 35px;">--}}
                                                                    {{--                                                                        @if($course->from >= today()->toDateString())--}}
                                                                    {{--                                                                            <div class="d-flex justify-content-between align-items-center">--}}
                                                                    {{--                                                                                <a class="btn btn-outline-primary col-6"--}}
                                                                    {{--                                                                                   href="{{route('home.course.show',$course)}}">--}}
                                                                    {{--                                                                                    تسجيل</a>--}}
                                                                    {{--                                                                                <span class="text-success">{{$course->price}} ر.س </span>--}}
                                                                    {{--                                                                            </div>--}}
                                                                    {{--                                                                        @else--}}
                                                                    {{--                                                                            <p class="text-danger p-0"> انتهى--}}
                                                                    {{--                                                                                التسجيل </p>--}}
                                                                    {{--                                                                        @endif--}}
                                                                    {{--                                                                    </div>--}}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    </a>
                                                @empty
                                                    <p class="h3 my-4 w-100 text-center text-danger">لا يوجد دورات
                                                        متاحة</p>
                                                @endforelse
                                            </div>
                                            <div class="swiper-button-prev d-none d-md-block "
                                                 style=" ">
                                                <svg height="35px" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 512.035 512.035"
                                                     xml:space="preserve">
                                <g transform="translate(1 1)">
                                    <polygon style="fill:#63D3FD;" points="255.035,502.484 459.835,255.017 255.035,7.551 50.235,7.551 255.035,255.017
                                		50.235,502.484 	"/>
                                    <polygon style="fill:#FFFFFF;"
                                             points="255.035,255.017 255.035,255.017 7.568,502.484 50.235,502.484 	"/>
                                    <polygon style="fill:#3DB9F9;" points="502.501,255.017 255.035,7.551 203.835,7.551 203.835,7.551 255.035,7.551 459.835,255.017
                                		255.035,502.484 	"/>
                                    <polygon style="fill:#FFFFFF;"
                                             points="195.301,7.551 195.301,7.551 7.568,7.551 255.035,255.017 50.235,7.551 	"/>
                                    <path d="M255.035,511.017H7.568c-3.413,0-6.827-1.707-7.68-5.12c-0.853-3.413-0.853-6.827,1.707-9.387l241.493-241.493
                                		L1.595,13.524c-2.56-2.56-3.413-5.973-1.707-9.387c0.853-3.413,4.267-5.12,7.68-5.12h247.467c2.56,0,4.267,0.853,5.973,2.56
                                		l42.667,42.667c3.413,3.413,3.413,8.533,0,11.947c-3.413,3.413-8.533,3.413-11.947,0l-40.107-40.107H28.048l232.96,232.96
                                		c3.413,3.413,3.413,8.533,0,11.947l-232.96,232.96h223.573l238.933-238.933L342.928,107.391c-3.413-3.413-3.413-8.533,0-11.947
                                		c3.413-3.413,8.533-3.413,11.947,0l153.6,153.6c3.413,3.413,3.413,8.533,0,11.947L261.008,508.457
                                		C259.301,510.164,257.595,511.017,255.035,511.017z"/>
                                    <path d="M331.835,75.817c0-5.12-3.413-8.533-8.533-8.533c-5.12,0-8.533,3.413-8.533,8.533c0,5.12,3.413,8.533,8.533,8.533
                                		C328.421,84.351,331.835,80.937,331.835,75.817"/>
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
                                                    <g>
                                                    </g>
                                </svg>
                                            </div>
                                            <div class="swiper-button-next d-none d-md-block "
                                                 style=" ">
                                                <svg height="35px" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 512.035 512.035"
                                                     xml:space="preserve">
                                <g transform="translate(1 1)">
                                    <polygon style="fill:#63D3FD;"
                                             points="255,7.551 50.2,255.017 255,502.484 459.8,502.484 255,255.017 459.8,7.551 	"/>
                                    <polygon style="fill:#3DB9F9;"
                                             points="255,255.017 255,255.017 502.467,7.551 459.8,7.551 	"/>
                                    <polygon style="fill:#FFFFFF;" points="7.533,255.017 255,502.484 306.2,502.484 306.2,502.484 255,502.484 50.2,255.017
                                		255,7.551 	"/>
                                    <polygon style="fill:#3DB9F9;"
                                             points="314.733,502.484 314.733,502.484 502.467,502.484 255,255.017 459.8,502.484 	"/>
                                    <path d="M502.467,511.017H255c-2.56,0-4.267-0.853-5.973-2.56L1.56,260.991c-3.413-3.413-3.413-8.533,0-11.947L249.027,1.577
                                		c1.707-1.707,3.413-2.56,5.973-2.56h247.467c3.413,0,6.827,1.707,7.68,5.12c1.707,3.413,0.853,6.827-1.707,9.387l-93.867,93.867
                                		c-3.413,3.413-8.533,3.413-11.947,0c-3.413-3.413-3.413-8.533,0-11.947l79.36-79.36H258.413L19.48,255.017l238.933,238.933h223.573
                                		l-232.96-232.96c-3.413-3.413-3.413-8.533,0-11.947l102.4-102.4c3.413-3.413,8.533-3.413,11.947,0
                                		c3.413,3.413,3.413,8.533,0,11.947l-96.427,96.427L508.44,496.511c2.56,2.56,3.413,5.973,1.707,9.387
                                		C509.293,509.311,505.88,511.017,502.467,511.017z"/>
                                    <path d="M391.533,127.017c0-5.12-3.413-8.533-8.533-8.533s-8.533,3.413-8.533,8.533s3.413,8.533,8.533,8.533
                                		S391.533,132.137,391.533,127.017"/>
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
                                                    <g>
                                                    </g>
                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-200">
        <div class="container  mt-7">
            <div class="row py-5 text-center">
                <div class="col-md-4">
                    <h1><span class="counter"
                              data-countup='{"endValue":{{\App\Models\Course::count()}},"suffix":"+"}'></span></h1>
                    <h3>عدد الدورات</h3>
                    <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#6A82A1;" d="M495.031,121.148c-4.613,0-475,0-478.062,0C7.598,121.148,0,128.745,0,138.117v245.244
	c0,9.371,7.598,16.969,16.969,16.969h165.633c19.707,18.828,46.042,29.489,73.399,29.489s53.692-10.661,73.399-29.489h165.633
	c9.371,0,16.969-7.598,16.969-16.969V138.117C512,128.745,504.402,121.148,495.031,121.148z"/>
                        <path style="fill:#36495E;" d="M495.031,121.148c-8.983,0-226.53,0-239.031,0v308.67c27.356,0,53.692-10.661,73.399-29.489h165.633
	c9.371,0,16.969-7.598,16.969-16.969V138.117C512,128.745,504.402,121.148,495.031,121.148z"/>
                        <path style="fill:#FFDA79;" d="M256,370.027c-19.632,0-36.459-12.239-43.249-29.489H76.759c-9.371,0-16.969-7.596-16.969-16.969
	V99.151c0-9.371,7.598-16.969,16.969-16.969h149.752c9.371,0,16.969,7.598,16.969,16.969c0,6.903,5.617,12.52,12.52,12.52
	c6.904,0,12.52-5.617,12.52-12.52c0-9.371,7.598-16.969,16.969-16.969h149.752c9.371,0,16.969,7.598,16.969,16.969v224.419
	c0,9.372-7.598,16.969-16.969,16.969H299.249C292.458,357.788,275.631,370.027,256,370.027z"/>
                        <g>
                            <path style="fill:#FFD155;" d="M255.997,286.662c-9.371,0-16.969-7.598-16.969-16.969v-87.177c0-9.371,7.598-16.969,16.969-16.969
		c9.371,0,16.969,7.598,16.969,16.969v87.177C272.966,279.064,265.368,286.662,255.997,286.662z"/>
                            <path style="fill:#FFD155;" d="M201.938,236.571H130.82c-9.371,0-16.969-7.598-16.969-16.969v-59.114
		c0-9.371,7.598-16.969,16.969-16.969h71.118c9.371,0,16.969,7.598,16.969,16.969v59.114
		C218.907,228.974,211.31,236.571,201.938,236.571z M147.789,202.633h37.18v-25.176h-37.18V202.633z"/>
                            <path style="fill:#FFD155;" d="M201.938,286.662H130.82c-9.371,0-16.969-7.598-16.969-16.969s7.598-16.969,16.969-16.969h71.118
		c9.371,0,16.969,7.598,16.969,16.969C218.907,279.064,211.31,286.662,201.938,286.662z"/>
                            <path style="fill:#FFD155;" d="M435.241,82.182H285.489c-9.371,0-16.969,7.598-16.969,16.969c0,6.903-5.617,12.52-12.52,12.52
		v258.358c19.632,0,36.459-12.24,43.249-29.489h135.991c9.371,0,16.969-7.598,16.969-16.969V99.151
		C452.209,89.779,444.612,82.182,435.241,82.182z"/>
                        </g>
                        <g>
                            <path style="fill:#FFC72D;" d="M256,165.547v121.115c9.37-0.001,16.966-7.598,16.966-16.968v-87.177
		C272.966,173.145,265.37,165.549,256,165.547z"/>
                            <path style="fill:#FFC72D;" d="M381.18,286.662h-71.118c-9.371,0-16.969-7.598-16.969-16.969s7.598-16.969,16.969-16.969h71.118
		c9.371,0,16.969,7.598,16.969,16.969C398.149,279.064,390.551,286.662,381.18,286.662z"/>
                            <path style="fill:#FFC72D;" d="M381.18,177.456h-71.118c-9.371,0-16.969-7.598-16.969-16.969s7.598-16.969,16.969-16.969h71.118
		c9.371,0,16.969,7.598,16.969,16.969S390.551,177.456,381.18,177.456z"/>
                            <path style="fill:#FFC72D;" d="M381.18,232.059h-71.118c-9.371,0-16.969-7.598-16.969-16.969s7.598-16.969,16.969-16.969h71.118
		c9.371,0,16.969,7.598,16.969,16.969S390.551,232.059,381.18,232.059z"/>
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
                        <g>
                        </g>
</svg>

                </div>
                <div class="col-md-4 my-5 my-md-0">
                    <h1><span class="counter"
                              data-countup='{"endValue":{{\App\Models\Student::count()}},"suffix":"+"}'></span></h1>
                    <h3>عدد المتدربين</h3>
                    <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#D29B6E;" d="M118.29,220.69v40.768c0,6.2-4.044,11.676-9.971,13.5l-61.896,19.044
	c-11.852,3.648-19.94,14.599-19.94,26.999v102.723c0,19.501,15.809,35.31,35.31,35.31h17.655h185.379V220.69H118.29z"/>
                        <path style="fill:#59D8FF;" d="M167.724,326.621c-34.178,0-64.311-17.941-81.629-44.825l-39.672,12.207
	c-11.852,3.647-19.94,14.598-19.94,26.998v102.723c0,19.501,15.809,35.31,35.31,35.31h17.655h185.379V229.517
	C264.828,282.924,221.131,326.621,167.724,326.621z"/>
                        <g>
                            <path style="fill:#00C3F0;" d="M264.828,229.517c0,53.407-43.697,97.103-97.103,97.103c-34.178,0-64.311-17.941-81.629-44.825
		l-17.483,5.379c19.891,34.113,56.776,57.101,99.112,57.101c40.951,0,76.794-21.517,97.103-53.795V229.517z"/>
                            <path style="fill:#00C3F0;" d="M176.552,414.897H88.276c-4.875,0-8.828-3.953-8.828-8.828v-41.996
		c0-7.023-2.791-13.76-7.756-18.727l-40.238-40.238c-3.129,4.583-4.971,10.06-4.971,15.893v102.723
		c0,19.501,15.809,35.31,35.31,35.31h17.655h123.586v-17.655C203.034,426.753,191.178,414.897,176.552,414.897z"/>
                        </g>
                        <path style="fill:#F0C087;" d="M242.759,158.897h-1.31l-3.104-61.793H98.207v61.793H92.69c-7.313,0-13.241,5.929-13.241,13.241
	v17.655c0,7.313,5.929,13.241,13.241,13.241h8.369l1.434,8.963c1.079,6.742,4.564,12.866,9.81,17.238l28.344,23.62
	c3.807,3.172,8.607,4.91,13.564,4.91h27.029c4.956,0,9.756-1.738,13.564-4.91l28.344-23.62c5.246-4.371,8.73-10.495,9.81-17.238
	l1.434-8.963h8.367c7.313,0,13.241-5.929,13.241-13.241v-17.655C256,164.825,250.071,158.897,242.759,158.897z"/>
                        <path style="fill:#E6AF78;" d="M238.345,97.103h-88.276H98.207v61.793H92.69c-7.313,0-13.241,5.929-13.241,13.241v17.655
	c0,7.313,5.929,13.241,13.241,13.241h8.369l1.434,8.962c1.079,6.743,4.564,12.866,9.81,17.238l28.344,23.62
	c3.807,3.172,8.607,4.91,13.562,4.91h11.161l-12.584-37.75c-1.8-5.4-2.718-11.055-2.718-16.748v-53.198
	c0-4.875,3.953-8.828,8.828-8.828l0,0c0,0,8.828,0,12.359-4.242c5.38,2.751,11.41,4.242,17.655,4.242
	c6.246,0,12.274-1.491,17.655-4.242c5.38,2.751,11.41,4.242,17.655,4.242c0.888,0,1.754-0.06,2.614-0.158l13.72,0.017
	L238.345,97.103z"/>
                        <path style="fill:#694B4B;" d="M273.655,95.338c0-9.781-6.665-17.932-15.676-20.37c0.98-2.439,1.551-5.088,1.551-7.879
	c0-11.701-9.485-21.186-21.186-21.186c-0.431,0-0.833,0.102-1.258,0.127c-2.883-8.276-10.67-14.251-19.928-14.251
	c-2.274,0-4.43,0.424-6.47,1.111c-4.522-4.985-10.987-8.173-18.248-8.173c-1.873,0-3.679,0.248-5.432,0.642
	c-5.054-4.745-11.806-7.704-19.285-7.704s-14.231,2.959-19.285,7.704c-1.753-0.394-3.561-0.642-5.432-0.642
	c-6.739,0-12.834,2.713-17.293,7.087c-0.122-0.002-0.238-0.025-0.362-0.025c-9.258,0-17.045,5.976-19.928,14.251
	c-0.425-0.025-0.828-0.127-1.258-0.127c-11.701,0-21.186,9.485-21.186,21.186c0,2.79,0.572,5.439,1.55,7.879
	c-9.01,2.438-15.674,10.589-15.674,20.37c0,5.451,2.116,10.369,5.498,14.124c-3.382,3.754-5.498,8.673-5.498,14.124
	c0,7.841,4.311,14.593,10.652,18.238c0.314,9.474,8.045,17.073,17.597,17.073h7.718c3.452,0,6.398-2.496,6.966-5.901l4.928-29.568
	c0.53,0.04,1.035,0.159,1.575,0.159c7.379,0,13.862-3.78,17.655-9.502c3.794,5.721,10.276,9.502,17.655,9.502
	c7.379,0,13.862-3.78,17.655-9.502c3.794,5.721,10.276,9.502,17.655,9.502s13.862-3.78,17.655-9.502
	c3.794,5.721,10.276,9.502,17.655,9.502c0.538,0,1.045-0.119,1.575-0.159l4.928,29.568c0.568,3.405,3.514,5.901,6.966,5.901h9.483
	c9.75,0,17.655-7.905,17.655-17.655c0-0.183-0.049-0.353-0.054-0.535c5.359-3.823,8.882-10.029,8.882-17.12
	c0-5.451-2.116-10.37-5.499-14.124C271.539,105.707,273.655,100.789,273.655,95.338z"/>
                        <path style="fill:#5A4146;" d="M162.554,108.204c-8.276-2.883-14.251-10.67-14.251-19.928c0-5.451,2.116-10.37,5.498-14.124
	c-3.382-3.754-5.498-8.673-5.498-14.124c0-9.781,6.665-17.932,15.676-20.37c-0.98-2.439-1.55-5.088-1.55-7.879
	c0-5.442,2.111-10.354,5.483-14.105c-0.064,0-0.122-0.019-0.186-0.019c-7.479,0-14.231,2.959-19.285,7.704
	c-1.753-0.394-3.561-0.642-5.432-0.642c-6.739,0-12.834,2.713-17.293,7.087c-0.122-0.002-0.238-0.025-0.362-0.025
	c-9.258,0-17.045,5.976-19.928,14.251c-0.425-0.025-0.828-0.127-1.258-0.127c-11.701,0-21.186,9.485-21.186,21.186
	c0,2.79,0.572,5.439,1.55,7.879c-9.011,2.438-15.676,10.589-15.676,20.37c0,5.451,2.116,10.369,5.498,14.124
	c-3.382,3.754-5.498,8.673-5.498,14.124c0,7.841,4.311,14.593,10.652,18.238c0.314,9.474,8.045,17.073,17.597,17.073h7.718
	c3.452,0,6.398-2.496,6.966-5.901l4.928-29.568c0.53,0.04,1.035,0.159,1.575,0.159c7.379,0,13.862-3.78,17.655-9.502
	c3.794,5.721,10.276,9.502,17.655,9.502c4.873,0,9.267-1.761,12.843-4.53c-2.419-2.519-4.015-5.82-4.015-9.594
	C162.428,109.031,162.516,108.625,162.554,108.204z"/>
                        <path style="fill:#E6AF78;"
                              d="M150.069,414.897h26.483c14.626,0,26.483,11.857,26.483,26.483v17.655h-52.966V414.897z"/>
                        <path style="fill:#D5DCED;" d="M485.517,397.241H220.69c-14.626,0-26.483-11.857-26.483-26.483V211.862
	c0-14.626,11.857-26.483,26.483-26.483h264.828c14.626,0,26.483,11.857,26.483,26.483v158.897
	C512,385.385,500.143,397.241,485.517,397.241z"/>
                        <path style="fill:#AFB9D2;" d="M406.069,459.034l-15.613-117.092c-1.17-8.771-8.651-15.321-17.501-15.321H333.25
	c-8.849,0-16.331,6.55-17.501,15.321l-15.612,117.092v17.655h105.931V459.034z"/>
                        <circle style="fill:#FFFFFF;" cx="353.103" cy="273.655" r="17.655"/>
                        <path style="fill:#F5DCB4;" d="M503.172,494.345H8.828c-4.875,0-8.828-3.953-8.828-8.828v-17.655c0-4.875,3.953-8.828,8.828-8.828
	h494.345c4.875,0,8.828,3.953,8.828,8.828v17.655C512,490.392,508.047,494.345,503.172,494.345z"/>
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
                </div>
                <div class="col-md-4">
                    <h1><span class="counter"
                              data-countup='{"endValue":{{\App\Models\Registration::count()}},"suffix":"+"}'></span>
                    </h1>
                    <h3>عدد الخريجين</h3>
                    <svg width="50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px"
                         viewBox="0 0 501.333 501.333" style="enable-background:new 0 0 501.333 501.333;"
                         xml:space="preserve">
<path style="fill:#2E4859;" d="M491.733,468.267c-12.8-44.8-44.8-80-86.4-96l-80-30.933l-19.2-40.533L250.667,320L195.2,300.8
	L176,341.333l-80,30.933c-40.533,16-72.533,51.2-86.4,96L0,501.333h250.667h250.667L491.733,468.267z"/>
                        <g>
                            <polygon style="fill:#F6F7F8;"
                                     points="250.667,345.6 229.333,402.133 172.8,341.333 195.2,300.8 	"/>
                            <polygon style="fill:#F6F7F8;"
                                     points="250.667,345.6 272,402.133 328.533,341.333 306.133,300.8 	"/>
                        </g>
                        <g>
                            <ellipse style="fill:#FEC656;" cx="250.667" cy="190.933" rx="94.933" ry="154.667"/>
                            <path style="fill:#FEC656;" d="M169.6,204.8c4.267,22.4,0,42.667-8.533,44.8c-8.533,2.133-19.2-14.933-23.467-38.4
		c-4.267-22.4,0-42.667,8.533-44.8C154.667,164.267,165.333,181.333,169.6,204.8z"/>
                            <path style="fill:#FEC656;" d="M331.733,204.8c-4.267,22.4,0,42.667,8.533,44.8c8.533,2.133,19.2-14.933,23.467-38.4
		c4.267-22.4,0-42.667-8.533-44.8C346.667,164.267,336,181.333,331.733,204.8z"/>
                        </g>
                        <polygon style="fill:#3A5569;" points="35.2,66.133 275.2,0 466.133,77.867 245.333,114.133 "/>
                        <path style="fill:#FEC656;" d="M395.733,48c0,0,33.067-7.467,33.067,16s5.333,209.067,5.333,209.067h-39.467l8.533-220.8L395.733,48
	z"/>
                        <path style="fill:#637888;" d="M250.667,49.067c-52.267,0-94.933,7.467-94.933,18.133V160c0-10.667,42.667-19.2,94.933-19.2
	S345.6,149.333,345.6,160V66.133C345.6,56.533,302.933,49.067,250.667,49.067z"/>
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
                </div>
            </div>
        </div>
    </div>

{{--    <div class="bg-100">--}}
{{--        <div class="container  mt-5">--}}
{{--            <div class="row ">--}}
{{--                <div class="col-12  text-center">--}}
{{--                    <h1 class="mt-5 mb-3 text-center">بيوت الخبرة</h1>--}}
{{--                    <p class="mt-3 mb-5 text-primary">--}}
{{--                        قائمة بيوت الخبرة--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-12 col-12">--}}
{{--                    <div class="row mb-5">--}}
{{--                        <div class="col-lg-4 col-12 mb-5">--}}
{{--                            <div class="text-center shadow rounded-3 bg-light border-top border-3 border-info">--}}
{{--                                <img src="{{asset('images/logo-req.webp')}}" class=""--}}
{{--                                     style="margin-top: -20px; margin-bottom: 20px;" height="100" width="100" alt="">--}}
{{--                                <div class="p-2 p-md-1">--}}
{{--                                    <h5 class="text-dark px-1" style="height: 50px">الاستشارات والدراسات الدعوية--}}
{{--                                        والفكرية--}}
{{--                                        والقضائية</h5>--}}
{{--                                    --}}{{--                            <h5 class="text-muted">It instructor</h5>--}}
{{--                                    <p class="px-3 pt-3 " style="height: 150px; overflow: auto;">--}}
{{--                                        تقديم الخدمات و الدراسات و الاستشارات الدعوية و الفكرية و القضائية بمهنية عالية--}}
{{--                                        وفق--}}
{{--                                        أفض--}}
{{--                                        الخبرات و الممارسات المحلية و العالمية من خلال فريق عمل محترف--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-12 mb-5 mb-md-0">--}}
{{--                            <div class="text-center shadow rounded-3 bg-light border-top border-3 border-danger">--}}
{{--                                <img src="{{asset('images/logo-req.webp')}}" class=""--}}
{{--                                     style="margin-top: -20px; margin-bottom: 20px;" height="100" width="100" alt="">--}}
{{--                                <div class="p-2 p-md-1">--}}
{{--                                    <h5 class="text-dark px-1" style="height: 50px">دعم للاستشارات والحلول التقنية</h5>--}}
{{--                                    --}}{{--                            <h5 class="text-muted">It instructor</h5>--}}
{{--                                    <p class="px-3 pt-3" style="height: 150px; overflow: auto;">بيت الخبرة دعم--}}
{{--                                        للاستشارات و--}}
{{--                                        الحلول التقنية يقدم دورات احترافية في تخصص تقنية--}}
{{--                                        المعلومات و الاستشارات و الاشراف على المشاريع التقنية. كما سبق لبيت الخبرة تنفيذ--}}
{{--                                        العديد--}}
{{--                                        من المشاريع التقنية المتخصصة بالتعاون مع جهات حكومية و خاصة.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-12 mb-5">--}}
{{--                            <div class="text-center shadow rounded-3 bg-light border-top border-3 border-success">--}}
{{--                                <img src="{{asset('images/logo-req.webp')}}" class=""--}}
{{--                                     style="margin-top: -20px; margin-bottom: 20px;" height="100" width="100" alt="">--}}
{{--                                <div class="p-2 p-md-1">--}}
{{--                                    <h5 class="text-dark px-1" style="height: 50px">بيت الخبرة الاستشاري لتنمية القدرات--}}
{{--                                        والكفايات</h5>--}}
{{--                                    --}}{{--                            <h5 class="text-muted">It instructor</h5>--}}
{{--                                    <p class="px-3 pt-3" style="height: 150px; overflow: auto;">بيت الخبرة الاستشاري--}}
{{--                                        لتنمية--}}
{{--                                        القدرات والكفايات ،بكلية العلوم والآداب بقلوة ،--}}
{{--                                        يقدم برامج تنمية القدرات والكفايات والتحصيلي للطلاب والمعلمين ويقدم دورات في--}}
{{--                                        اللغة--}}
{{--                                        الانكليزية والمهارات الرياضية وعلوم الحاسب والتوعية النفسية والشخصية والتربية--}}
{{--                                        الخاصة--}}
{{--                                        والعمل التطوعي .--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    {{--    <div class="my-5 py-8 bg-200">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <h2 class="text-center">--}}
    {{--                    Learn better with support along the way.--}}
    {{--                </h2>--}}
    {{--                <div class="col-12  px-xl-5 pt-5">--}}
    {{--                    <div class="row ">--}}
    {{--                        <div class="col-lg-3 col-sm-6 col-12 text-center ">--}}
    {{--                            <div class="mx-3">--}}
    {{--                                <span class="fa fa-clock text-info h1  my-3"></span>--}}
    {{--                                <p class="fs-1 fw-bolder text-black mb-3">1-hour avg. response time</p>--}}
    {{--                                <p>Get responses to your questions within 1 hour, so learning remains unblocked.</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-lg-3 col-sm-6 col-12 text-center ">--}}
    {{--                            <div class="mx-3">--}}
    {{--                                <span class="fa fa-clock text-primary h1  my-3"></span>--}}
    {{--                                <p class="fs-1 fw-bolder text-black mb-3">1-hour avg. response time</p>--}}
    {{--                                <p>Get responses to your questions within 1 hour, so learning remains unblocked.</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-lg-3 col-sm-6 col-12 text-center ">--}}
    {{--                            <div class="mx-3">--}}
    {{--                                <span class="fa fa-clock text-success h1  my-3"></span>--}}
    {{--                                <p class="fs-1 fw-bolder text-black mb-3">1-hour avg. response time</p>--}}
    {{--                                <p>Get responses to your questions within 1 hour, so learning remains unblocked.</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-lg-3 col-sm-6 col-12 text-center ">--}}
    {{--                            <div class="mx-3">--}}
    {{--                                <span class="fa fa-clock text-danger h1  my-3"></span>--}}
    {{--                                <p class="fs-1 fw-bolder text-black mb-3">1-hour avg. response time</p>--}}
    {{--                                <p>Get responses to your questions within 1 hour, so learning remains unblocked.</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    @push('js')
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            @foreach($categories as $category)
            var swiper = new Swiper(".mySwiper-{{$category->id}}", {
                slidesPerView: 1,
                spaceBetween: 10,
                autoplay: {
                    delay: 10000,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    600: {
                        slidesPerView: 2,
                    },
                    1000: {
                        slidesPerView: 3,
                    },
                    1600: {
                        slidesPerView: 4,
                    },
                },
            });
            @endforeach
        </script>
    @endpush
@endsection