@extends('layouts.admin.app')
@section('title')
    تعديل التخصص
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
                                <h3 class="mb-0">تعديل التخصص</h3>
                            </div>
                            <form class="row g-3 " method="post" action="{{route('admin.categories.update',$category)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-6">
                                    <label class="form-label" for="title">اسم التخصص</label>
                                    <input class="form-control" id="title" name="title" value="{{$category->title}}"
                                           type="text"/>
                                </div>
                                @error('title')
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