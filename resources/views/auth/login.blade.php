@extends('layouts.front.app')

@section('title')
    تسجيل الدخول
@endsection

@section('content')
    @push('css')
        {{--    <style>--}}
        {{--        .footer{--}}
        {{--            display: contents;--}}
        {{--        }--}}
        {{--    </style>--}}
    @endpush
    <div class="row flex-center  py-6">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            {{--            <div class="mx-auto text-center">--}}
            {{--                <img src="{{getLogo()}}" class="img-fluid mb-4"  alt="">--}}
            {{--            </div>--}}
            <div class="card">
                <div class="card-body p-4 p-sm-5">

                    <div class="row flex-between-center mb-2">
                        <h2 class="text-center">تسجيل الدخول</h2>
                    </div>
                    @if(session('failed'))
                        <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                            <div class="bg-danger me-3 icon-item"><span
                                        class="fas fa-times-circle text-white fs-3"></span></div>
                            <p class="mb-0 flex-1">{{session('failed')}}
                            </p>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email">البريد الالكتروني</label>
                            <input class="form-control" name="email" type="email" placeholder="ادخل البريد الاكتروني"/>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">كلمة المرور</label>
                            <input class="form-control" name="password" type="password" placeholder="ادخل كلمة المرور"/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-auto ">
                            <div class="form-check mb-0">
                                <input class="form-check-input" name="remember" type="checkbox" id="basic-checkbox"
                                       checked="checked"/>
                                <label class="form-check-label" for="basic-checkbox">تذكرني</label></div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary d-block w-100 fs-2 mt-3" type="submit" name="submit">
                                سجل دخولك!
                            </button>

                        </div>
                        <a href="{{route('student.password.request')}}" class="d-block text-center">نسيت كلمة
                            المرور؟</a>


                    </form>
                </div>

                <hr class="m-0">

                <div class=" my-4">
                    <p class="text-center m-0">في حال لم يكن لديك حساب <a href="{{route('student.register')}}">
                            تسجيل </a></p>
                </div>
            </div>
        </div>
    </div>


@endsection