@extends('layouts.front.app')

@section('title')
    الصفحة الشخصية
@endsection

@section('content')

    <div class="container-fluid px-5">
        <div class="row ">

{{--            @include('front.student.sidebar.sidebar')--}}

            <div class="col-12 col-md-6 mx-auto shadow-lg bg-light rounded-3 mt-3 p-0">
                <h3 class="text-center my-4">
                    الملف الشخصي
                </h3>

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('success_password'))
                    <div class="alert alert-success" role="alert">
                        {{session('success_password')}}
                    </div>
                @endif
                @if(session('success_phone'))
                    <div class="alert alert-success" role="alert">
                        {{session('success_phone')}}
                    </div>
                @endif

                @if(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{session('failed')}}
                    </div>
                @endif
                @if($student->wantToChange)
                    <p class="text-danger text-decoration-underline text-center h3">
                        طلب تغيير المعلومات بحاجة للاعتماد من قبل الادارة
                    </p>
                @endif

                <form action="{{route('student.profile.update')}}" method="post">
                    @csrf
                    <div class="m-3 row">
                        <label class="col-sm-2 col-form-label" for="email">البريد
                            الاكتروني</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="email"
                                   type="email"
                                   required name="email"
                                   value="{{$student->email}}"/>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span></span>
                            @if($student->wantToChange->email ?? $student->email != $student->email)
                                <span class="text-muted">تغيير الى : {{$student->wantToChange->email}}</span>
                            @endif
                            <div class="m-3 row"></div>

                        </div>

                        <label class="col-sm-2 col-form-label" for="name">الاسم بالعربي</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="name"
                                   type="text" name="name"
                                   value="{{$student->name}}"/>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if($student->wantToChange->name ?? $student->name != $student->name)
                                <span class="text-muted">تغيير الى : {{$student->wantToChange->name}}</span>
                            @endif
                            <div class="m-3 row"></div>

                        </div>

                        <label class="col-sm-2 col-form-label" for="name_en">الاسم بالانجليزي</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="name_en"
                                   type="text" name="name_en"
                                   value="{{$student->name_en}}"/>
                            @error('name_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if($student->wantToChange->name_en ?? $student->name_en != $student->name_en)
                                <span class="text-muted">تغيير الى : {{$student->wantToChange->name_en}}</span>
                            @endif
                            <div class="m-3 row"></div>

                        </div>
                        <label class="col-sm-2 col-form-label" for="phone">رقم الهاتف</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="phone"
                                   type="text" name="phone"
                                   value="{{$student->phone}}"/>
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
{{--                            @if($student->wantToChange->phone ?? $student->phone != $student->phone)--}}
{{--                                <span class="text-muted">تغيير الى : {{$student->wantToChange->phone}}</span>--}}
{{--                            @endif--}}
                            <div class="m-3 row"></div>

                        </div>
                        <label class="col-sm-2 col-form-label" for="id_number">رقم الهوية</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="id_number"
                                   type="text" name="id_number"
                                   value="{{$student->id_number}}"/>
                            @error('id_number')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if($student->wantToChange->id_number ?? $student->id_number != $student->id_number)
                                <span class="text-muted">تغيير الى : {{$student->wantToChange->id_number}}</span>
                            @endif
                            <div class="m-3 row"></div>

                        </div>


                        <label class="col-sm-2 col-form-label" for="nationality">الجنسية بالعربي</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="nationality"
                                   type="text" name="nationality"
                                   value="{{$student->nationality}}"/>
                            @error('nationality')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if($student->wantToChange->nationality ?? $student->nationality != $student->nationality)
                                <span class="text-muted">تغيير الى : {{$student->wantToChange->nationality}}</span>
                            @endif
                            <div class="m-3 row"></div>

                        </div>

                        <label class="col-sm-2 col-form-label" for="nationality_en">الجنسية بالانجليزي</label>
                        <div class="col-sm-10">
                            <input class="form-control " id="nationality_en"
                                   type="text" name="nationality_en"
                                   value="{{$student->nationality_en}}"/>
                            @error('nationality_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if($student->wantToChange->nationality_en ?? $student->nationality_en != $student->nationality_en)
                                <span class="text-muted">تغيير الى : {{$student->wantToChange->nationality_en}}</span>
                            @endif
                            <div class="m-3 row"></div>

                        </div>

                        <label class="col-sm-2 col-form-label" for="password">كلمة المرور</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="password" name="password"
                                   type="password"/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="m-2 row"></div>

                        <label class="col-sm-2 col-form-label" for="confirm_password">تأكيد كلمة المرور </label>
                        <div class="col-sm-10"><input class="form-control" id="confirm_password"
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