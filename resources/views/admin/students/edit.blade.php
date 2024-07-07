@extends('layouts.admin.app')
@section('title')
    تعديل بيانات الطالب
@endsection
@push('css')
    <link href="{{asset('admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet"/>
@endpush
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
                                <h3 class="mb-0">تعديل بيانات الطالب</h3>
                            </div>
                            <form class="row g-3 " action="{{route('admin.students.update',$student)}}"
                                  method="post">
                                @csrf
                                <div class="col-lg-12">
                                    <label class="form-label" for="name">اسم الطالب بالعربي</label>
                                    <input class="form-control" id="name" name="name" value="{{$student->name}}"
                                           type="text" value=""/>
                                </div>
                                @error('name')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-12">
                                    <label class="form-label" for="name_en">اسم الطالب بالانجليزي</label>
                                    <input class="form-control" id="name_en" name="name_en"
                                           value="{{$student->name_en}}" type="text"
                                           value=""/>
                                </div>
                                @error('name_en')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-12">
                                    <label class="form-label" for="email">البريد الالكتروني</label>
                                    <input class="form-control" id="email" name="email" type="email"
                                           value="{{$student->email}}"/>
                                </div>
                                @error('email')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror


                                <div class="col-lg-12">
                                    <label class="form-label" for="phone">رقم الهاتف</label>
                                    <input class="form-control" id="phone" name="phone" type="text"
                                           value="{{$student->phone}}"/>
                                </div>
                                @error('phone')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-12">
                                    <label class="form-label" for="id_number">رقم الهوية</label>
                                    <input class="form-control" id="id_number" name="id_number" type="text"
                                           value="{{$student->id_number}}"/>
                                </div>
                                @error('id_number')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-12">
                                    <label class="form-label" for="nationality">الجنسية بالعربي</label>
                                    <input class="form-control" id="nationality" name="nationality"
                                           type="text" value="{{$student->nationality}}"/>
                                </div>
                                @error('nationality')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-12">
                                    <label class="form-label" for="nationality_en">الجنسية
                                        بالانجليزي</label>
                                    <input class="form-control" id="nationality_en" name="nationality_en"
                                           type="text" value="{{$student->nationality_en}}"/>
                                </div>
                                @error('nationality_en')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-12 d-flex mt-5">
                                    <button class="btn btn-primary col-6 col-sm-4 mx-auto" type="submit">
                                        حفظ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('admin/assets/js/flatpickr.js')}}"></script>

@endpush
