@extends('layouts.admin.app')
@section('title')
    تعديل دورة
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
                                <h3 class="mb-0">تعديل دورة</h3>
                            </div>
                            <form class="row g-3 " method="post" action="{{route('admin.course.update',$course)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-6">
                                    <label class="form-label" for="name">اسم الدورة بالعربي</label>
                                    <input class="form-control" id="name" name="name" value="{{$course->name}}"
                                           type="text"/>
                                </div>
                                @error('name')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="name_en">اسم الدورة بالانجليزي</label>
                                    <input class="form-control" id="name_en" name="name_en" value="{{$course->name_en}}"
                                           type="text"/>
                                </div>
                                @error('name_en')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-6">
                                    <label class="form-label" for="instructor">اسم المدرب بالعربي</label>
                                    <input class="form-control" id="instructor" name="instructor"
                                           value="{{$course->instructor}}" type="text"/>
                                </div>
                                @error('instructor')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="instructor_en">اسم المدرب بالانجليزي</label>
                                    <input class="form-control" id="instructor_en" name="instructor_en"
                                           value="{{$course->instructor_en}}" type="text"/>
                                </div>
                                @error('instructor_en')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-6">
                                    <label class="form-label" for="from">بداية</label>
                                    <input class="form-control datetimepicker" name="from" value="{{$course->from}}"
                                           id="from" type="text"
                                           placeholder="d/m/y" data-options='{"disableMobile":true}'/>
                                </div>
                                @error('from')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="to">نهاية</label>
                                    <input class="form-control datetimepicker" name="to" value="{{$course->to}}" id="to"
                                           type="text"
                                           placeholder="d/m/y" data-options='{"disableMobile":true}'/>
                                </div>
                                @error('to')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-6">
                                    <label class="form-label" for="hours">عدد الساعات</label>
                                    <input class="form-control numInputWrapper" name="hours" value="{{$course->hours}}"
                                           id="hours" min="0"
                                           type="text"
                                           placeholder="عدد الساعات"/>
                                </div>
                                @error('hours')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-6">
                                    <label class="form-label" for="days">عدد الايام</label>
                                    <input class="form-control numInputWrapper" name="days" value="{{$course->days}}"
                                           id="days" min="0"
                                           type="text"
                                           placeholder="عدد الايام"/>
                                </div>
                                @error('days')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="publishdate">تاريخ اصدار الشهادة</label>
                                    <input class="form-control datetimepicker" name="publishdate" value="{{$course->publishdate}}" id="publishdate"
                                           type="text"
                                           placeholder="d/m/y" data-options='{"disableMobile":true}'/>
                                </div>
                                @error('publishdate')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="cover">شعار للدورة</label>
                                    <input class="form-control numInputWrapper" name="cover" id="cover" min="0"
                                           type="file"
                                           placeholder="شعار الدورة"/>
                                </div>
                                @error('cover')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="category_id">التخصص</label>
                                    <select name="category_id" class="form-select" id="category_id">
                                        <option value="" selected disabled> اختار التخصص</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @if($course->category_id == $category->id) selected @endif>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-lg-6">
                                    <label class="form-label" for="price">السعر</label>
                                    <input class="form-control numInputWrapper" name="price" value="{{$course->price}}"
                                           id="price" min="80"
                                           type="text"
                                           required
                                           placeholder="سعر الدورة"/>
                                </div>
                                @error('price')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-6 pt-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="show"
                                               @if($course->show) checked @endif value="1" id="show"
                                               id="show"
                                               type="checkbox"/>
                                        <label class="form-check-label"
                                               for="show">عرض الدورة بمتجر الموقع</label>
                                    </div>
                                </div>
                                @error('show')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-lg-12">
                                    <label class="form-label" for="price">وصف الدورة</label>
                                    <textarea name="description" id="description"  class="form-control">{{$course->description}}</textarea>
                                </div>
                                @error('description')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror

                                <div class="col-12 d-flex ">
                                    <button class="btn btn-primary col-6 col-sm-4 mx-auto" type="submit">حفظ</button>
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