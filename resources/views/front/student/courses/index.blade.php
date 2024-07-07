@extends('layouts.front.app')

@section('title')
    دوراتي
@endsection

@section('content')

    <div class="container px-5 ">
        <div class="row ">
{{--            @include('front.student.sidebar.sidebar')--}}
            <div class="col-12 col-lg-12  mt-3 p-0">
                @if(session('success'))
                    <div class="alert alert-success border-2 m-3 d-flex align-items-center" role="alert">
                        <div class="bg-success me-3 icon-item"><span
                                    class="fas fa-times-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">{{session('success')}}
                        </p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    @forelse($student->courses as $course)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4  ">
                            <div class="card text-center rounded mb-3 p-3">
                                <h5 class="card-header "
                                    style="height: 55px;"> {{$course->name ?? $course->name_en }} </h5>
                                <div class="card-body">
                                    <a href="{{route('student.courses.show',$course)}}"
                                       class="btn btn-falcon-primary"> عرض الدورة</a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>

            </div>
        </div>
    </div>
@endsection