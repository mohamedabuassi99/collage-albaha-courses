<div class="col-12 col-lg-2  py-3 px-2">
    <ul class=" list-unstyled ">
        <li class="nav-link shadow bg-white mb-4 rounded-3 py-3">

            <a href="{{route('home')}}" class="text-dark ">
                <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                الصفحة الرئيسية</a></li>
        <li class="nav-link shadow bg-white mb-4 rounded-3 py-3 ">
            <a href="{{route('student.courses.index')}}"
               class="@if(!request()->routeIs('student.courses.index')) text-dark @endif ">
                <svg xmlns="http://www.w3.org/2000/svg" height="28" class="h5 " fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                دوراتي</a></li>
        <li class="nav-link shadow bg-white mb-4 rounded-3 py-3">
            <a href="{{route('student.profile')}}"
               class="@if(!request()->routeIs('student.profile')) text-dark @endif ">
                <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                الملف الشخصي</a></li>
        <li class="nav-link shadow bg-white mb-4 ounded-3 py-3 "><a href="{{route('student.logout')}}"
                                                                    class="text-danger">
                <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                تسجيل
                الخروج</a></li>
    </ul>
</div>