@extends('layouts.front.app')

@section('title')
    مهامي
@endsection

@push('css')
    <link href="{{asset('admin/vendors/fullcalendar/main.min.css')}}" rel="stylesheet"/>

@endpush
@section('content')
    <div class="container px-md-5 ">
        <div class="row bg-light my-4">
            <div class="col-12 col-md-3  p-md-5">
                <div class="min-vh-25">
                    <h3 class="text-center">الامتحانات القادمة</h3>
                    @foreach($exams as $exam)
                        @if(\Carbon\Carbon::parse($exam->from)->greaterThan(now()))
                            <ul class="list-unstyled">
                                <li><a href="{{route('student.courses.show',$exam)}}"> {{$exam->exam->title}} - {{$exam->name}}</a></li>
                            </ul>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="min-vh-25">
                    <h3 class="text-center">محاضرات القادمة</h3>
                    @foreach($lectures as $lecture)
                        @if(\Carbon\Carbon::parse($lecture->start_at)->greaterThan(now()))
                            <ul class="list-unstyled">
                                <li><a href="{{route('student.courses.show',$lecture->course)}}"> {{$lecture->topic}} - {{$lecture->course->name}}</a></li>
                            </ul>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-md-9 p-md-5 ">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <script src="{{ asset('admin/vendors/fullcalendar/main.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // headerToolbar: { center: 'dayGridMonth,timeGridWeek',}, // buttons for switching between views
                initialView: 'dayGridMonth',
                locale: 'ar',
                events: [
                        @foreach($exams as $exam)
                    {
                        title: '{{$exam->exam->title}} - {{$exam->name}}',
                        start: '{{$exam->exam->from}}',
                        end: '{{$exam->exam->to}}',
                        url: '{{route('student.courses.show',$exam)}}',
                        textColor: '#ff0000',
                        display: 'block',
                    },
                        @endforeach
                        @foreach($lectures as $lecture)
                    {
                        title: '{{$lecture->topic}} - {{$lecture->course->name}}',
                        start: '{{$lecture->start_at}}',
                        end: '{{\Carbon\Carbon::parse($lecture->start_at)->addMinute($lecture->duration)->toDateTimeString()}}',
                        url: '{{route('student.courses.show',$lecture->course)}}',
                        textColor: '#2d8cff',
                        display: 'block',
                    },
                    @endforeach
                ],
                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                }
            });

            calendar.render();
        });

    </script>
@endpush