@extends('layouts.admin.app')
@section('title')
    الصفحة الشخصية
@endsection

@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-1.png')}});"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-12">
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
                    <div class="row g-0">
                        <div class="col-lg-12 pe-lg-2">
                            <div class="card-header">
                                <h3 class="mb-0">البيانات الشخصية</h3>
                            </div>
                            <form class="row g-3 " method="post" action="{{route('admin.profile_update')}}">
                                @csrf
                                <div class="col-lg-6">
                                    <label class="form-label" for="name">الاسم</label>
                                    <input class="form-control" id="name" name="name" value="{{$user->name}}"
                                           type="text"/>
                                </div>
                                @error('name')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="email">البريد الاكتروني</label>
                                    <input class="form-control" id="email" name="email" value="{{$user->email}}"
                                           type="text"/>
                                </div>
                                @error('email')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-6">
                                    <label class="form-label" for="password">كلمة المرور</label>
                                    <input class="form-control" id="password" name="password"
                                           value="{{old('password')}}" type="password"/>
                                </div>
                                @error('password')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-6">
                                    <label class="form-label" for="password_confirmation">تأكيد كلمة المرور</label>
                                    <input class="form-control" id="password_confirmation" name="password_confirmation"
                                           value="{{old('password_confirmation')}}" type="password"/>
                                </div>
                                @error('password_confirmation')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12 d-flex ">
                                    <button class="btn btn-primary col-6 col-sm-4 mx-auto" type="submit">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection