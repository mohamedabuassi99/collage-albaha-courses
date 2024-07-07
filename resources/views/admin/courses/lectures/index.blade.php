@extends('layouts.admin.app')
@section('title')
    قسم المحاضرات (Zoom)
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row ">
                <header class="">
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
                    <h2 class="text-center" data-anchor="data-anchor">
                        قسم المحاضرات (Zoom)
                    </h2>
                    <button class="btn btn-falcon-danger mt-3" type="button" data-bs-toggle="modal"
                            data-bs-target="#add-lecture">اضافة محاضرة
                    </button>
                    <div class="modal fade" id="add-lecture" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('admin.course.lectures.store',$course)}}" method="post">

                                    <div class="modal-body p-0">
                                        @csrf
                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                            <h4 class="mb-1" id="modalExampleDemoLabel"> إضافة محاضرة </h4>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="topic">عنوان المحاضر :</label>
                                                <input type="text" class="form-control" name="topic" id="topic">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="start_at">تاريخ وموعد
                                                    المحاضرة</label>
                                                <input class="form-control datetimepicker" value="{{old('start_at')}}"
                                                       data-options='{"enableTime":true,"dateFormat":"Y-m-d H:i","disableMobile":true}'
                                                       name="start_at" id="start_at" type="datetime-local"/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="duration">مدة المحاضرة
                                                    بالدقائق:</label>
                                                <input type="text" class="form-control" name="duration" id="duration">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء
                                        </button>
                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </header>
                <div class="card-body d-flex justify-content-center align-items-center gap-5">
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>تاريخ المحاضرة</th>
                            <th>مدة المحاضرة</th>
                            <th>رابط الدخول</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($course->lectures as $lecture)
                            <tr class="{{\Carbon\Carbon::today()->toDateString() == \Carbon\Carbon::parse($lecture->start_at)->toDateString() ? 'text-success':' '}}">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$lecture->topic}}</td>
                                <td>{{\Carbon\Carbon::create($lecture->start_at)->translatedFormat('l j F Y - h:i a')}}</td>
                                <td>{{$lecture->duration}} د</td>
                                <td>
                                    <a href="{{$lecture->start_url}}" target="_blank" class="btn btn-link">start
                                        zoom</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.course.lectures.destroy',$lecture)}}"
                                       class="btn btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">لا يوجد محاضرات لهذه الدورة</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection