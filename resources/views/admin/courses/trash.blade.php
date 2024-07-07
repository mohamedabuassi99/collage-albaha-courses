@extends('layouts.admin.app')
@section('title')
    جميع الدورات المحذوفة
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <h3 class="text-center mt-3 mb-4">
                    جميع الدورات المحذوفة
                </h3>
                @if(session('success'))
                    <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                        <div class="bg-success me-3 icon-item"><span
                                    class="fas fa-check-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">{{session('success')}}</p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                        <div class="bg-danger me-3 icon-item"><span
                                    class="fas fa-times-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">{{session('failed')}}
                        </p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-12 d-md-flex justify-content-between align-items-center  ">
                    <div class="">
                        <form action="{{route('admin.course.index')}}" method="get">
                            {{--                            @csrf--}}
                            <div class="d-flex gap-2 mb-3 ">
                                <input type="search" name="search" class="form-control " placeholder="بحث بالدورات المحذوفة"
                                       id="">
                                <button class="btn btn-outline-primary"> بحث</button>
                            </div>
                        </form>
                    </div>
                    <div class="">
{{--                        <a href="{{route('admin.course.create')}}" class="btn btn-outline-dark">اضافة دورة</a>--}}
                    </div>
                </div>
                <div class="table-responsive scrollbar">
                    <table class="table table-striped align-middle text-center overflow-hidden">

                        <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الاسم بالانجليزي</th>
                            <th scope="col">اسم منشأ الدورة</th>
                            <th scope="col">عدد الطلاب</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($courses as $course)
                            <tr class="btn-reveal-trigger">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->name_en}}</td>
                                <td>{{$course->user->name}}</td>
                                <td>{{$course->students->count()}}</td>
                                <td>
                                    <a href="{{route('admin.course.restore',$course)}}" class="btn btn-outline-facebook">استرجاع</a>
                                    <a href="{{route('admin.course.force_delete',$course)}}" class="btn btn-outline-danger"> حذف نهائي</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">لا يوجد دورات محذوفة</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-center my-4">
                    {{$courses->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection