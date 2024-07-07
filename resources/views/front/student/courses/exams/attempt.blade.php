<!DOCTYPE html>
<html lang="en-US" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>امتحان - {{getTitle()}} </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{getLogo32()}}">
    <link rel="manifest" href="{{asset('admin/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <script src="{{asset('admin/assets/js/config.js')}}"></script>
    <script src="{{asset('admin/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>
    <link href="{{asset('admin/vendors/overlayscrollbars/OverlayScrollbars.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('admin/assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@200;300;400;500&display=swap"
          rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


    <style>
        * {
            font-family: 'IBM Plex Sans Arabic', sans-serif !important;
        }
        .navbar-nav {
            font-size: 1.2rem;
        }

        .navbar-nav .show > .nav-link, .navbar-light .navbar-nav .nav-link:hover {
            color: #267dec;
        }
        .animation-ctn{
            text-align:center;
            margin-top:5em;
        }

        @-webkit-keyframes checkmark {
            0% {
                stroke-dashoffset: 100px
            }

            100% {
                stroke-dashoffset: 200px
            }
        }

        @-ms-keyframes checkmark {
            0% {
                stroke-dashoffset: 100px
            }

            100% {
                stroke-dashoffset: 200px
            }
        }

        @keyframes checkmark {
            0% {
                stroke-dashoffset: 100px
            }

            100% {
                stroke-dashoffset: 0px
            }
        }

        @-webkit-keyframes checkmark-circle {
            0% {
                stroke-dashoffset: 480px

            }

            100% {
                stroke-dashoffset: 960px;

            }
        }

        @-ms-keyframes checkmark-circle {
            0% {
                stroke-dashoffset: 240px
            }

            100% {
                stroke-dashoffset: 480px
            }
        }

        @keyframes checkmark-circle {
            0% {
                stroke-dashoffset: 480px
            }

            100% {
                stroke-dashoffset: 960px
            }
        }

        @keyframes colored-circle {
            0% {
                opacity:0
            }

            100% {
                opacity:100
            }
        }

        /* other styles */
        /* .svg svg {
            display: none
        }
         */
        .inlinesvg .svg svg {
            display: inline
        }

        /* .svg img {
            display: none
        } */

        .icon--order-success svg polyline {
            -webkit-animation: checkmark 0.25s ease-in-out 0.7s backwards;
            animation: checkmark 0.25s ease-in-out 0.7s backwards
        }

        .icon--order-success svg circle {
            -webkit-animation: checkmark-circle 0.6s ease-in-out backwards;
            animation: checkmark-circle 0.6s ease-in-out backwards;
        }
        .icon--order-success svg circle#colored {
            -webkit-animation: colored-circle 0.6s ease-in-out 0.7s backwards;
            animation: colored-circle 0.6s ease-in-out 0.7s backwards;
        }
    </style>

</head>
<body class="bg-100" >

<p class="position-absolute position-fixed bg-soft-primary rounded m-3  opacity-75 fs--1 end-0 z-index-1 p-2 ">
    الوقت المتبقي:
    <span class="text-danger" id="time-count"></span>
</p>
<div class="container ">
    <div class="row pt-5 justify-content-center">
        <div class="col-md-3  col">
            <div class="card">
                <div class="card-header text-center">
                    <img src="{{asset('admin/assets/img/team/avatar.png')}}" width="75" alt="">
                    <h4 class="my-3">{{auth('student')->user()->name}}</h4>
                </div>
            </div>
            <div class="card  mt-3">
                <div class="card-body text-center">
                    <p>مؤشر اللون <span class="text-success">الاخضر</span> للسؤال الذي تم اجابته</p>
                    <p>مؤشر اللون <span class="text-danger">الاحمر</span> للسؤال الذي لم يتم اجابته</p>
                    <ul class="list-unstyled row justify-content-center">
                        {{--                    @for($x = 1 ;$questions->total()>=$x; $x++)--}}
                        {{--                        <li class="col-4  text-center p-2">--}}
                        {{--                        <p class="bg-200 @if() text-danger @endif  p-2">{{$x}}</p>--}}
                        {{--                        </li>--}}
                        {{--                    @endfor--}}
                        @foreach($questions_side as $question)
                            <li class="col-3 text-center p-2">
                                <a href="?page={{(int)(1+$loop->index/$exam->per_page)}}">
                                    <p class=" @if(\App\Models\Answer::where('question_id',$question->id)
                                            ->where('student_id',auth('student')->id())->exists()) bg-200 text-success
                                            @else bg-soft-danger text-danger  @endif
                                    @if($questions->currentPage() == (int)(1+$loop->index/$exam->per_page)))
                                            text-decoration-underline
                                            @endif
                                            p-2 rounded">
                                        {{$loop->index+1}}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7  col-12 ">

            @foreach($questions as $question)
                <form action="{{route('student.courses.exam.answer',[auth('student')->user(),$question])}}"
                      method="post">
                    @csrf
                    <div class="card bg-100 mb-4">
                        <div class="card-header bg-200 border-bottom border-1 border-secondary d-flex justify-content-between">
                            <p class="fs-1 text-dark mb-0">{{$question->question}}</p>
                            <span>({{$question->mark}}) علامة</span>
                        </div>
                        <div class="card-body">
                            @foreach(json_decode($question->options) as $options)
                                @if($options != null)

                                <div class="mb-2 mx-3">
                                    <div class="form-check">

                                        <input class="form-check-input"
                                               type="radio" name="answers"
                                               id="question-{{$question->id}}-{{$loop->index}}"
                                               @if(App\Models\Answer::where('student_id',$student->id)->where('question_id',$question->id)->where('answers',$options)->first())
                                               checked @endif
                                               value="{{$options}}"/>
                                        <label class="form-check-label fs-0"
                                               for="question-{{$question->id}}-{{$loop->index}}">{{$options}}</label>
                                    </div>

                                </div>
                                <script>
                                    jQuery(document).ready(function () {
                                        jQuery('#question-{{$question->id}}-{{$loop->index}}').click(function (e) {
                                            // e.preventDefault();
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            jQuery.ajax({
                                                url: "{{ route('student.courses.exam.answer',[auth('student')->user(),$question]) }}",
                                                method: 'post',
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    answers: jQuery('#question-{{$question->id}}-{{$loop->index}}').val(),
                                                },
                                                success: function (result) {
                                                    $('#question-{{$question->id}}-{{$loop->index}}').attr('checked', 'checked');
                                                },
                                                error: function (result) {
                                                    alert(result);
                                                }
                                            });
                                        });
                                    });
                                </script>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </form>
            @endforeach
            <div class="py-4 d-flex justify-content-between gap-3 align-items-center">
                {{--                {{$questions->links()}}--}}
                <div class="d-flex align-items-center">
                    @if(!$questions->onFirstPage())
                        <a href="{{ $questions->previousPageUrl()}}"
                           class="btn btn-falcon-primary d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 version="1.1"
                                 width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">

                            <g transform="translate(128 128) scale(0.72 0.72)" style="">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                   transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
                                    <path d="M 9.518 37.866 H 1 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 8.518 c 0.552 0 1 0.448 1 1 S 10.07 37.866 9.518 37.866 z"
                                          style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(174,11,11); fill-rule: nonzero; opacity: 1;"
                                          transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                    <path d="M 57.872 77.188 c -0.603 0 -1.206 -0.229 -1.665 -0.688 l -9.587 -9.587 c -0.918 -0.92 -0.918 -2.414 0 -3.332 l 9.447 -9.447 H 29.181 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 29.301 c 0.404 0 0.77 0.243 0.924 0.617 c 0.155 0.374 0.069 0.804 -0.217 1.09 L 48.034 64.995 c -0.139 0.139 -0.139 0.365 0.001 0.505 l 9.585 9.585 c 0.139 0.14 0.365 0.139 0.504 0 l 29.78 -29.781 c 0.084 -0.084 0.099 -0.191 0.096 -0.266 c 0.003 -0.15 -0.012 -0.257 -0.096 -0.341 l -29.78 -29.781 c -0.181 -0.18 -0.321 -0.184 -0.504 0 l -9.586 9.585 c -0.139 0.139 -0.139 0.365 0 0.504 l 11.154 11.153 c 0.286 0.286 0.372 0.716 0.217 1.09 c -0.154 0.374 -0.52 0.617 -0.924 0.617 H 18.341 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 37.727 l -9.447 -9.447 c -0.918 -0.919 -0.918 -2.414 0 -3.332 l 9.586 -9.586 c 0.892 -0.891 2.444 -0.89 3.332 0 l 29.78 29.78 c 0.464 0.463 0.705 1.087 0.68 1.755 c 0.025 0.593 -0.216 1.216 -0.68 1.68 l -29.78 29.781 C 59.079 76.958 58.476 77.188 57.872 77.188 z"
                                          style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(36,102,190); fill-rule: nonzero; opacity: 1;"
                                          transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                    <path d="M 20.862 54.134 h -8.295 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 8.295 c 0.552 0 1 0.447 1 1 S 21.414 54.134 20.862 54.134 z"
                                          style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(11,218,52); fill-rule: nonzero; opacity: 1;"
                                          transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                    <path d="M 41.533 46 H 7.307 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 34.226 c 0.552 0 1 0.448 1 1 S 42.085 46 41.533 46 z"
                                          style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(152,109,200); fill-rule: nonzero; opacity: 1;"
                                          transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                </g>
                            </g>
</svg>
                            <span>السابقة</span>
                        </a>
                    @endif
                    @if(!$questions->onLastPage())

                        <a href="{{ $questions->nextPageUrl() }}"
                           class="btn btn-falcon-primary d-flex align-items-center">
                            <span>التالي</span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 version="1.1" width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">
<g transform="translate(128 128) scale(0.72 0.72)" style="">
    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
       transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89) matrix(-1 0 0 1 90 0) ">
        <path d="M 9.518 37.866 H 1 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 8.518 c 0.552 0 1 0.448 1 1 S 10.07 37.866 9.518 37.866 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(174,11,11); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 57.872 77.188 c -0.603 0 -1.206 -0.229 -1.665 -0.688 l -9.587 -9.587 c -0.918 -0.92 -0.918 -2.414 0 -3.332 l 9.447 -9.447 H 29.181 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 29.301 c 0.404 0 0.77 0.243 0.924 0.617 c 0.155 0.374 0.069 0.804 -0.217 1.09 L 48.034 64.995 c -0.139 0.139 -0.139 0.365 0.001 0.505 l 9.585 9.585 c 0.139 0.14 0.365 0.139 0.504 0 l 29.78 -29.781 c 0.084 -0.084 0.099 -0.191 0.096 -0.266 c 0.003 -0.15 -0.012 -0.257 -0.096 -0.341 l -29.78 -29.781 c -0.181 -0.18 -0.321 -0.184 -0.504 0 l -9.586 9.585 c -0.139 0.139 -0.139 0.365 0 0.504 l 11.154 11.153 c 0.286 0.286 0.372 0.716 0.217 1.09 c -0.154 0.374 -0.52 0.617 -0.924 0.617 H 18.341 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 37.727 l -9.447 -9.447 c -0.918 -0.919 -0.918 -2.414 0 -3.332 l 9.586 -9.586 c 0.892 -0.891 2.444 -0.89 3.332 0 l 29.78 29.78 c 0.464 0.463 0.705 1.087 0.68 1.755 c 0.025 0.593 -0.216 1.216 -0.68 1.68 l -29.78 29.781 C 59.079 76.958 58.476 77.188 57.872 77.188 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(36,102,190); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 20.862 54.134 h -8.295 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 8.295 c 0.552 0 1 0.447 1 1 S 21.414 54.134 20.862 54.134 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(11,218,52); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 41.533 46 H 7.307 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 34.226 c 0.552 0 1 0.448 1 1 S 42.085 46 41.533 46 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(152,109,200); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
    </g>
</g>
</svg>
                        </a>
                    @endif
                </div>
                <div>
                    <button class="btn btn-falcon-danger" type="button" data-bs-toggle="modal" data-bs-target="#error-modal">تسليم الاختبار</button>
                    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    {{--                                    <div class="rounded-top-lg py-3 ps-4 pe-6 ">--}}
                                    {{--                                        <h4 class="mb-1" id="modalExampleDemoLabel"> </h4>--}}
                                    {{--                                    </div>--}}
                                    <div class="p-4 pb-0 text-center">
                                        <p class="">
                                            هل تود تسليم الاختبار؟
                                        </p>
                                        <div class="icon icon--order-success svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">
                                                <g fill="none" stroke="#22AE73" stroke-width="2">
                                                    <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                                                    <circle id="colored" fill="#22AE73" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                                                    <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center d-flex justify-content-center align-items-center gap-5 my-3">
                                    <button class="btn btn-falcon-danger" type="button" data-bs-dismiss="modal">لا</button>
                                    <a class="btn btn-falcon-success" href="{{route('student.courses.exam.finish',$exam)}}">نعم </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{\Carbon\Carbon::parse($exam->to)->format('Y-m-d\TH:i:s')}}").getTime();

    // Update the count down every 1 second

    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="time-count"
        document.getElementById("time-count").innerHTML = hours + " س "
            + minutes + " د " + seconds + " ثواني  ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            window.location.reload();
        }
    }, 1000);
</script>
<script src="{{asset('admin/vendors/popper/popper.min.js')}}"></script>
<script src="{{asset('admin/vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendors/anchorjs/anchor.min.js')}}"></script>
<script src="{{asset('admin/vendors/is/is.min.js')}}"></script>
{{--<script src="{{asset('admin/vendors/echarts/echarts.min.js')}}"></script>--}}
{{--<script src="{{asset('admin/vendors/progressbar/progressbar.min.js')}}"></script>--}}
<script src="{{asset('admin/vendors/lodash/lodash.min.js')}}"></script>
{{--<script src="../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>--}}
<script src="{{asset('admin/vendors/list.js/list.min.js')}}"></script>
<script src="{{asset('admin/assets/js/theme.js')}}"></script>

@stack('js')
</body>

</html>