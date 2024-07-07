@extends('layouts.front.app')

@section('title')
    تسجيل
@endsection
@push('css')

@endpush
@section('content')

    <div class="container">
        <div class="row flex-center py-3">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-8 col-xxl-6">
                <div class="card">
                    <div class="card-body p-4 p-sm-4">
                        <div class="row flex-between-center mb-2">
                            <h2 class="text-center ">تسجيل </h2>
                        </div>
                        <form action="{{route('student.register')}}" id="form-register" class="row" method="post">
                            @csrf
                            <div class="col-md-6 col-12 mb-3">
                                <label for="name">الاسم الثلاثي بالعربي <code>*</code></label>
                                <input class="form-control" name="name" required value="{{old('name')}}" type="text"
                                       placeholder=""/>

                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="name_en">الاسم  الثلاثي بالانجليزي</label>
                                <input class="form-control" name="name_en" value="{{old('name_en')}}" type="text"
                                       placeholder=""/>
                                @error('name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <span class="text-center pb-3">ملاحظة : الاسم المدخل سوف يتم اعتماده في شهادة الدورة</span>

                            <div class="col-md-6 col-12 mb-3">
                                <label for="email">البريد الالكتروني<code>*</code></label>
                                <input class="form-control" name="email" required type="email" value="{{old('email')}}"
                                       placeholder=""/>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="phone">رقم الهاتف</label>
                                <input class="form-control" name="phone" type="text" value="{{old('phone')}}"
                                       placeholder=""/>
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="password">كلمة المرور<code>*</code></label>
                                <input class="form-control" name="password" required type="password"
                                       placeholder="*******"/>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="password_confirmation">تأكيد كلمة المرور<code>*</code></label>
                                <input class="form-control" name="password_confirmation" required type="password"
                                       placeholder="*******"/>
                                @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="id_number">رقم الهوية</label>
                                <input class="form-control" name="id_number" type="text" value="{{old('id_number')}}"
                                       placeholder="1312321314"/>
                                @error('id_number')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12 mb-3">
                                <label for="nationality">الجنسية بالعربي</label>
                                <input class="form-control" name="nationality" type="text"
                                       value="{{old('nationality')}}"
                                       placeholder="سعودي"/>
                                @error('nationality')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12 mb-3">
                                <label for="nationality_en">الجنسية بالانجليزي</label>
                                <input class="form-control" name="nationality_en" type="text"
                                       value="{{old('nationality_en')}}" placeholder="saudi"/>
                                @error('nationality_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="">
                                <button class="btn btn-outline-primary d-block w-100 fs-2 mt-3 g-recaptcha"
                                        data-sitekey="6LcJ8l8fAAAAAHTyly4rcZRvW0BQbBsGvhqJSzsc"
                                        data-callback='onSubmit'
                                        data-action='submit'>
                                    تسجيل!
                                </button>
                            </div>
                        </form>
                    </div>

                    <hr class="m-0">

                    <div class=" my-4">
                        <p class="text-center m-0">في حال كان لديك حساب <a href="{{route('login')}}"> تسجيل
                                دخول </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("form-register").submit();
        }
    </script>
@endpush