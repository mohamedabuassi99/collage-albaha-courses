@extends('layouts.admin.app')
@section('title')
        جميع المستخدمين
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <h3 class="text-center mt-3 mb-4">
                    جميع المستخدمين
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
                        <a href="{{route('admin.user.create')}}" class="btn btn-outline-dark">اضافة مستخدم</a>
                    </div>
                </div>
                <div class="table-responsive scrollbar">
                    <table class="table table-striped align-middle text-center overflow-hidden">

                        <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">البريد الاكتروني</th>
                            <th scope="col">الصلاحية</th>
                            <th scope="col">الدورات</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)

                            <tr class="btn-reveal-trigger">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->hasRole('admin'))
                                        مدير
                                    @else
                                        مدرب
                                    @endif
                                </td>
                                <td>{{$user->courses_count}}</td>
                                <td>
                                    <a href="{{route('admin.user.edit',$user)}}" class="btn btn-outline-primary">تعديل</a>
                                    <a href="{{route('admin.user.destroy',$user)}}" class="btn btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">لا يوجد دورات مضافة</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection