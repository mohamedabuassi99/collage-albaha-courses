@extends('layouts.admin.app')
@section('title')
    جميع الطلاب الغير معتمدين
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <h3 class="text-center mt-3 mb-4">
                    جميع الطلاب الغير معتمدين
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
                <div class="table-responsive scrollbar">
                    <table class="table table-striped text-center align-middle overflow-hidden">

                        <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">البريد الاكتروني</th>
                            <th scope="col">رقم الهوية</th>
                            <th scope="col">الجنسية</th>
                            <th scope="col">عدد الكورسات المسجل بها</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr class="btn-reveal-trigger">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$student->name ?? $student->name_en}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->id_number ?? '-'}}</td>
                                <td>{{$student->nationality ?? $student->nationality_en ?? '-'}}</td>
                                <td>{{$student->courses->count() ?? '-'}}</td>
                                <td>
                                    <a href="{{route('admin.approval.students.accept',$student)}}" class="btn btn-outline-success">اعتماد</a>
                                    <a href="{{route('admin.students.destroy',$student)}}" class="btn btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">لا يوجد طلاب غير معتمدين</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection