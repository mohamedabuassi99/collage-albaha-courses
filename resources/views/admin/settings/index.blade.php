@extends('layouts.admin.app')
@section('title')
    اعدادات الموقع
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
                                <h3 class="mb-0">اعدادات الموقع</h3>
                            </div>
                            <form class="row g-3 " method="post" action="{{route('admin.settings.store',$setting)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label" for="title">اسم الموقع</label>
                                    <input class="form-control" id="title" name="title" value="{{@$setting->title}}"
                                           type="text"/>
                                </div>
                                @error('title')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="logo">اللوجو الخاص بالموقع</label>
                                    <input class="form-control" id="logo" name="logo" value=""
                                           type="file"/>
                                </div>
                                @error('logo')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="logo32"> اللوجو الخاص بالعنوان(32×32)</label>
                                    <input class="form-control" id="logo32" name="logo32" value=""
                                           type="file"/>
                                </div>
                                @error('logo32')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="cover">الغلاف بصفحة الرئيسية </label>
                                    <input class="form-control" id="cover" name="cover" value=""
                                           type="file"/>
                                </div>
                                @error('cover')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="facebook">facebook</label>
                                    <input class="form-control" id="facebook" name="facebook" value="{{@$setting->facebook}}"
                                           type="url"/>
                                </div>
                                @error('facebook')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="twitter">twitter</label>
                                    <input class="form-control" id="twitter" name="twitter" value="{{@$setting->twitter}}"
                                           type="url"/>
                                </div>
                                @error('twitter')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="instagram">instagram</label>
                                    <input class="form-control" id="instagram" name="instagram" value="{{@$setting->instagram}}"
                                           type="url"/>
                                </div>
                                @error('instagram')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="linkedin">linkedin</label>
                                    <input class="form-control" id="linkedin" name="linkedin" value="{{@$setting->linkedin}}"
                                           type="url"/>
                                </div>
                                @error('linkedin')
                                <span class="alert alert-danger" role="alert">{{$message}}</span>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="youtube">youtube</label>
                                    <input class="form-control" id="youtube" name="youtube" value="{{@$setting->youtube}}"
                                           type="url"/>
                                </div>
                                @error('youtube')
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