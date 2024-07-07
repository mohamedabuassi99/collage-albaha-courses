@extends('layouts.admin.app')
@section('title')
    جميع طلبات تغيير البيانات من الطلاب
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <h3 class="text-center mt-3 mb-4">
                    جميع طلبات تغيير البيانات من الطلاب
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
                <div class="text-center mb-3">
                    <a href="{{route('admin.approval.change_students_information.accept_all')}}" class="btn btn-outline-success">اعتماد الجميع</a>
                </div>
                <div class="table-responsive scrollbar">
                    <table class="table table-striped align-middle text-center overflow-hidden">

                        <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الاسم بالانجليزي</th>
                            <th scope="col">البريد الاكتروني</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">رقم الهوية</th>
                            <th scope="col">الجنسية بالعربي</th>
                            <th scope="col">الجنسية بالانجليزي</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr class="btn-reveal-trigger">
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $student->student->name}}  @if($student->student->name != $student->name)<br> <span class="text-success"> {{$student->name ?? '-' }}</span> @endif</td>
                                <td>{{ $student->student->name_en ?? ' - '}} @if($student->student->name_en != $student->name_en) <br> <span class="text-success"> {{$student->name_en ?? '-' }}</span> @endif</td>
                                <td>{{ $student->student->email}} @if($student->student->email != $student->email) <br> <span class="text-success"> {{$student->email ?? '-'}}</span> @endif</td>
                                <td>{{ $student->student->phone}} </td>
                                <td>{{ $student->student->id_number ?? ' - '}} @if($student->student->id_number != $student->id_number) <br> <span class="text-success"> {{$student->id_number ?? '-'}}</span> @endif</td>
                                <td>{{ $student->student->nationality ?? ' -'}} @if($student->student->nationality != $student->nationality) <br> <span class="text-success"> {{$student->nationality ?? '-'}}</span> @endif</td>
                                <td>{{ $student->student->nationality_en ?? ' -'}} @if($student->student->nationality_en != $student->nationality_en) <br> <span class="text-success"> {{$student->nationality_en ?? '-'}}</span> @endif</td>
                                <td>
                                    <a href="{{route('admin.approval.change_students_information.accept',$student)}}" class="btn btn-outline-success">اعتماد</a>
                                    <a href="{{route('admin.approval.change_students_information.unaccept',$student)}}" class="btn btn-outline-danger">رفض</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">لا يوجد طلاب غير معتمدين</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection