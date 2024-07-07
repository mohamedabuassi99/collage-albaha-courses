@extends('layouts.front.app')

@section('title')
    محاضرات زوم  {{$course->name}}
@endsection

@section('content')

    <div class="container-fluid px-5 ">
        <div class="row ">
            @include('front.student.sidebar.sidebar')
            <div class="col-12 col-lg-10 shadow bg-white rounded-3 mt-3 p-0">
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
                <header>
                    <h3 class="text-black text-center my-4 ">
                        المحاضرات(ZOOM)
                    </h3>
                </header>
                <div class="table-responsive mx-3 rounded">
                    <table class="table table-striped text-center">
                        <thead>
                        <tr class="bg-soft-info">
                            <th>#</th>
                            <th>العنوان</th>
                            <th>تاريخ المحاضرة</th>
                            <th>مدة المحاضرة</th>
                            <th>رابط الدخول</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($course->lectures as $lecture)
                            <tr class=" {{\Carbon\Carbon::today()->toDateString() == \Carbon\Carbon::parse($lecture->start_at)->toDateString() ? 'text-success':' '}}">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$lecture->topic}}</td>
                                <td>{{\Carbon\Carbon::create($lecture->start_at)->translatedFormat('l j F Y - h:i a')}}</td>
                                <td>{{$lecture->duration}} د</td>
                                <td>
                                    <a href="{{$lecture->join_url}}" target="_blank" class="btn btn-link">
                                        دخول المحاضرة
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">لا يوجد محاضرات لهذه الدورة</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection