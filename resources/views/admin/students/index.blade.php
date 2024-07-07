@extends('layouts.admin.app')
@section('title')
    جميع الطلاب
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-1.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <h3 class="text-center mt-3 mb-4">
                    جميع الطلاب
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
                        <form action="{{route('admin.students.index')}}" method="get">
                            {{--                            @csrf--}}
                            <div class="d-flex gap-2 mb-3 ">
                                <input type="search" name="search" value="{{$search}}" class="form-control w-auto "
                                       placeholder="بحث بالاسم او البريد"
                                       id="">
                                <button class="btn btn-outline-primary"> بحث</button>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <a href="{{route('admin.students.create')}}" class="btn btn-outline-dark">اضافة طالب</a>
                    </div>
                </div>
                <div class="table-responsive scrollbar">
                    <table class="table table-striped align-middle text-center overflow-hidden p-0">

                        <thead>
                        <tr class="btn-reveal-trigger ">
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الاسم بالانجليزي</th>
                            <th scope="col">البريد الالكتروني</th>
                            <th scope="col">رقم الهوية</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">الجنسية بالعربي</th>
                            <th scope="col">الجنسية بالانجليزي</th>
                            <th scope="col">عدد الدورات</th>
                            <th scope="col">الاعتماد</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr class="btn-reveal-trigger ">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->name_en ?? '-'}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->id_number}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->nationality}}</td>
                                <td>{{$student->nationality_en}}</td>
                                <td>{{$student->courses->count()}}</td>
                                <td>@if($student->status) <i class="fas fa-check-circle text-success"></i> @else  <i
                                            class="fas fa-times-circle text-danger"></i> @endif</td>
                                <td>
                                    <a href="{{route('admin.students.show',$student)}}"
                                       class="btn btn-outline-facebook">عرض</a>
                                    <a href="{{route('admin.students.edit',$student)}}" class="btn btn-outline-primary">تعديل</a>
                                    <a href="{{route('admin.students.destroy',$student)}}"
                                       class="btn btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">لا يوجد طلاب مضافة</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-center my-4">
                    {{ $students->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection