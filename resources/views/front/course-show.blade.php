@extends('layouts.front.app')
@section('title')
    {{$course->name??$course->name_en}}
@endsection
@push('css')

@endpush
@section('content')

    <div class="container">
        <div class="row">
            <div class=" col-12 col-md-8 mx-auto">
                <div class="card my-5 bg-cover min-vh-50 d-flex justify-content-center align-items-center">
                    <div class=" text-center">
                        <span>{{$course->category->title}}</span>
                        <h3>{{$course->name}}</h3>
                        <h4>{{$course->name_en}}</h4>
                        <p>{{$course->description}}</p>
                        @if(\Carbon\Carbon::now()->lessThan($course->from))

                        <a href="{{route('student.course.register',$course)}}" class=" btn btn-primary ">تسجيل</a>
                            <div class="d-flex justify-content-center align-items-center gap-3 text-dark my-3">
                                <h3 class="fs-1 fs-md-4">
                                    <span id="days">-</span>
                                    <br>
                                    يوم
                                </h3>
                                <div class="fs-1 fs-md-4">:</div>
                                <h3 class="fs-1 fs-md-4">
                                    <span id="hours">-</span>
                                    <br>
                                    ساعة
                                </h3>
                                <div class="fs-1 fs-md-4">:</div>
                                <h3 class="fs-1 fs-md-4"><span id="minutes">-</span>
                                    <br>
                                    دقائق
                                </h3>
                                <div class="fs-1 fs-md-4">:</div>
                                <h3 class="fs-1 fs-md-4">
                                    <span id="secounds">-</span>
                                    <br>
                                    ثواني
                                </h3>
                            </div>
                        @else
                            <p class="text-danger"> انتهى التسجيل</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{\Carbon\Carbon::parse($course->from)->format('Y-m-d\TH:i:s')}}").getTime();

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

            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("secounds").innerHTML = seconds;

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                window.location.reload();
            }
        }, 1000);
    </script>
@endpush
