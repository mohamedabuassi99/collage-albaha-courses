<!DOCTYPE html>
<html lang="en-US" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->

    <title> @yield('title') - {{getTitle()}} </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{getLogo32()}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="keywords"
          content="university, courses, albaha, certifications, KSA, Saudi, {{getTitle()}}, دورات, شهادات.">
    <meta name="copyright" content="Albaha university - {{getTitle()}}">
    <meta name="description" content="{{getTitle()}}, منصة ادارة الدورات التدريبية. ">
    <meta name="page-topic" content="Courses">
    <meta name="page-type" content="Online Courses">
    <meta name="audience" content="Every Student">

    <script src="{{asset('admin/assets/js/config.js')}}"></script>
    <script src="{{asset('admin/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>


    <link href="{{asset('admin/vendors/overlayscrollbars/OverlayScrollbars.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    {{--    <link href="{{asset('admin/assets/css/theme.min.css')}}" rel="stylesheet" id="style-default">--}}
    <link href="{{asset('admin/assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('admin/assets/css/custom.css')}}" rel="stylesheet" id="user-style-rtl">
    {{--    <link href="{{asset('admin/assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">--}}
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@200;300;400;500&display=swap"
          rel="stylesheet">

    @stack('css')
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
    </style>
    {{--    <script>--}}
    {{--        // var isRTL = JSON.parse(localStorage.getItem('isRTL'));--}}
    {{--        // if (isRTL) {--}}
    {{--        var linkDefault = document.getElementById('style-default');--}}
    {{--        var userLinkDefault = document.getElementById('user-style-default');--}}
    {{--        linkDefault.setAttribute('disabled', true);--}}
    {{--        userLinkDefault.setAttribute('disabled', true);--}}
    {{--        document.querySelector('html').setAttribute('dir', 'rtl');--}}
    {{--        // } else {--}}
    {{--        //     var linkRTL = document.getElementById('style-rtl');--}}
    {{--        //     var userLinkRTL = document.getElementById('user-style-rtl');--}}
    {{--        //     linkRTL.setAttribute('disabled', true);--}}
    {{--        //     userLinkRTL.setAttribute('disabled', true);--}}
    {{--        // }--}}
    {{--    </script>--}}
</head>
<body class="bg-100">
<div class="content pb-0 ">
    <header>
        <nav class="navbar navbar-expand-lg bg-light border-bottom navbar-light py-3  ">
            <div class="container ">
                {{--            <a class="navbar-brand" href="#">Navbar</a>--}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarLightExample"
                        aria-controls="navbarLightExample" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
                </button>
                <div class="collapse navbar-collapse justify-content-between mx-md-7" id="navbarLightExample">
                    <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link  @if(request()->routeIs('home')) active @endif" aria-current="page"
                               href="{{route('home')}}">الصفحة الرئيسية</a>
                        </li>
                        @if(auth('student')->check())
                            <li class="nav-item">
                                <a class="nav-link  @if(request()->routeIs('student.courses.index')) active @endif"
                                   aria-current="page"
                                   href="{{route('student.courses.index')}}">دوراتي</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if(request()->routeIs('student.calender.index')) active @endif"
                                   aria-current="page"
                                   href="{{route('student.calender.index')}}">المهام</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if(request()->routeIs('student.profile')) active @endif"
                                   aria-current="page"
                                   href="{{route('student.profile')}}">الملف الشخصي</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if(request()->routeIs('student.logout')) active @endif"
                                   aria-current="page"
                                   href="{{route('student.logout')}}">تسجيل الخروج</a>
                            </li>
                        @elseif(auth()->check())

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#"
                                   id="navbarLightExampleDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">{{auth()->user()->name}}</a>
                                <div class="dropdown-menu py-0" aria-labelledby="navbarLightExampleDropdown">
                                    <div class="bg-white dark__bg-1000 py-2 rounded-3">
                                        <a class="dropdown-item py-2" href="{{route('admin.index')}}">لوحة التحكم</a>
                                        <hr class="dropdown-divider"/>
                                        <a class="dropdown-item text-danger" href="{{route('admin.logout')}}">تسجيل
                                            الخروج</a>
                                    </div>
                                </div>
                            </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('login')) active @endif"
                                   href="{{route('login')}}">تسجيل دخول</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('student.register')) active @endif"
                                   href="{{route('student.register')}}">تسجيل</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <div class="theme-control-toggle  px-2">
                                <input
                                        class="form-check-input theme-control-toggle-input" id="themeControlToggle"
                                        type="checkbox" data-theme-control="theme" value="dark"/><label
                                        class="mb-0 theme-control-toggle-label theme-control-toggle-light"
                                        for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Switch to light theme">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </label><label
                                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark"
                                        for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Switch to dark theme">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                    </svg>
                                </label></div>
                        </li>
                    </ul>

                </div>
                <div>
                    <a href="{{route('home')}}">
                        <img src="{{getLogo()}}" height="55" width="150" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class=" bg-200">
        <div class="container ">
            <div class="row g-0 justify-content-around align-items-center fs--1 pt-5 mx-md-7">
                <div class="col-12 col-md-3 mb-4  text-center">
                    <img src="{{getLogo()}}" height="55" width="150" class="img-fluid" alt="">
                    <br>
                    @php
                    $settings = \App\Models\Settings::first();
                    @endphp
                    <ul class="list-unstyled d-flex gap-2 justify-content-center align-items-center flex-wrap mt-3">
                        @if($settings->facebook)
                            <li>
                                <a href="{{$settings->facebook}}" target="_blank">
                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" class="ui-icon align-text-bottom text-gray-800">
                                        <defs>
                                            <svg viewBox="0 0 24 24" fill="currentColor" id="facebook"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17 2v4h-2c-.69 0-1 .81-1 1.5V10h3v4h-3v8h-4v-8H7v-4h3V6c0-2.21 1.79-4 4-4h3z"></path>
                                            </svg>
                                        </defs>
                                        <g>
                                            <path d="M17 2v4h-2c-.69 0-1 .81-1 1.5V10h3v4h-3v8h-4v-8H7v-4h3V6c0-2.21 1.79-4 4-4h3z"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($settings->twitter)
                            <li>
                                <a href="{{$settings->twitter}}" target="_blank">
                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" class="ui-icon align-text-bottom text-gray-800">
                                        <defs>
                                            <svg viewBox="0 0 24 24" fill="currentColor" id="twitter"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 01-1.93.07 4.28 4.28 0 004 2.98 8.521 8.521 0 01-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"></path>
                                            </svg>
                                        </defs>
                                        <g>
                                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 01-1.93.07 4.28 4.28 0 004 2.98 8.521 8.521 0 01-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($settings->instagram)
                            <li>
                                <a href="{{$settings->instagram}}" target="_blank">
                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" class="ui-icon align-text-bottom text-gray-800">
                                        <defs>
                                            <svg viewBox="0 0 24 24" fill="currentColor" id="instagram"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4c0 3.2-2.6 5.8-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8C2 4.6 4.6 2 7.8 2m-.2 2C5.61 4 4 5.61 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8c1.99 0 3.6-1.61 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5M12 7c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5m0 2c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path>
                                            </svg>
                                        </defs>
                                        <g>
                                            <path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4c0 3.2-2.6 5.8-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8C2 4.6 4.6 2 7.8 2m-.2 2C5.61 4 4 5.61 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8c1.99 0 3.6-1.61 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5M12 7c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5m0 2c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($settings->linkedin)
                            <li>
                                <a href="{{$settings->linkedin}}" target="_blank">
                                    <svg xmlns:xlink="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 34 34" class="global-nav__logo">
                                        <g>
                                            <path d="M34,2.5v29A2.5,2.5,0,0,1,31.5,34H2.5A2.5,2.5,0,0,1,0,31.5V2.5A2.5,2.5,0,0,1,2.5,0h29A2.5,2.5,0,0,1,34,2.5ZM10,13H5V29h5Zm.45-5.5A2.88,2.88,0,0,0,7.59,4.6H7.5a2.9,2.9,0,0,0,0,5.8h0a2.88,2.88,0,0,0,2.95-2.81ZM29,19.28c0-4.81-3.06-6.68-6.1-6.68a5.7,5.7,0,0,0-5.06,2.58H17.7V13H13V29h5V20.49a3.32,3.32,0,0,1,3-3.58h.19c1.59,0,2.77,1,2.77,3.52V29h5Z"
                                                  fill="black"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($settings->youtube)
                            <li>
                                <a href="{{$settings->youtube}}" target="_blank">
                                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                         height="24" viewBox="0 0 68 48" width="24">
                                        <path d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"
                                              fill="#000"></path>
                                        <path d="M 45,24 27,14 27,34" fill="#FFFFFF"></path>
                                    </svg>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-5  ">
                    <h5>الروابط</h5>
                    <ul class="list-unstyled">
                        <li class="#">سياسة الخصوصية</li>
                        <li class="#">الاسئلة الشائعة</li>
                        <li class="#">التحقق من الشهادات</li>
                        <li class="#">شروط الاستخدام</li>
                    </ul>
                </div>

            </div>
            <hr>
            <div class="row text-center">
                <p class="m-0 pb-3">تطوير و تشغيل بيت الخبرة دعم للاستشارات و الحلول التقنية</p>
                <p class="m-0 pb-3">جميع الحقوق محفوظة لمعهد الدراسات و الخدمات الاستشارية ب{{getTitle()}}، المملكة العربية السعودية ©
                    1443هـ -
                    {{now()->year}}م.</p>
            </div>
        </div>
    </footer>
</div>

<script src="{{asset('admin/vendors/popper/popper.min.js')}}"></script>
<script src="{{asset('admin/vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendors/anchorjs/anchor.min.js')}}"></script>
<script src="{{asset('admin/vendors/is/is.min.js')}}"></script>
{{--<script src="{{asset('admin/vendors/echarts/echarts.min.js')}}"></script>--}}
{{--<script src="{{asset('admin/vendors/progressbar/progressbar.min.js')}}"></script>--}}
{{--<script src="{{asset('admin/vendors/fontawesome/all.min.js')}}"></script>--}}
<script src="{{asset('admin/vendors/countup/countUp.umd.js')}}"></script>
<script src="{{asset('admin/vendors/lodash/lodash.min.js')}}"></script>
{{--<script src="../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>--}}
<script src="{{asset('admin/vendors/list.js/list.min.js')}}"></script>
<script src="{{asset('admin/assets/js/theme.js')}}"></script>

@stack('js')

</body>

</html>