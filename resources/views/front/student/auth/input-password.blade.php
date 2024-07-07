@extends('layouts.front.app')

@section('title')
    ضبط كلمة المرور
@endsection

@section('content')

    <div class="container">
        <div class="row ">

            @include('front.student.sidebar.sidebar')

            <div class="col-12 col-lg-10 shadow-lg bg-light rounded-3 mt-3 p-0">
                <h3 class="text-center my-4">
                    الملف الشخصي
                </h3>
                <form action="{{route('student.inputPasswordSubmit')}}" method="post">
                    @csrf
                    <div class="m-3 row">
                        <label class="col-sm-2 col-form-label" for="email">البريد
                            الاكتروني</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="email"
                                   type="email"
                                   readonly
                                   value="{{auth('student')->user()->email}}"/>
                            <div class="m-3 row"></div>
                        </div>


                        <label class="col-sm-2 col-form-label" for="name">الاسم بالعربي</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="name"
                                   type="text"
                                   readonly
                                   value="{{auth('student')->user()->name}}"/>
                            <div class="m-3 row"></div>
                        </div>

                        <label class="col-sm-2 col-form-label" for="name_en">الاسم بالانجليزي</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="name_en"
                                   type="text"
                                   readonly
                                   value="{{auth('student')->user()->name_en}}"/>
                            <div class="m-3 row"></div>
                        </div>

                        <label class="col-sm-2 col-form-label" for="password">كلمة المرور</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="password" required name="password"
                                   type="password"/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="m-2 row"></div>

                        <label class="col-sm-2 col-form-label" for="confirm_password">تأكيد كلمة المرور </label>
                        <div class="col-sm-10"><input class="form-control" required id="confirm_password"
                                                      name="password_confirmation" type="password"/>
                            @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 my-4 mx-auto">
                            <input class="form-control btn btn-outline-primary"
                                   id="inputPassword" value="حفظ" type="submit"/>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection