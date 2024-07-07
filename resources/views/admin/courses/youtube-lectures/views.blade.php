@extends('layouts.admin.app')
@section('title')
{{$video->title}}
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-1.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class=" position-relative py-4">
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
                        <a href="https://www.youtube.com/watch?v={{$video->video_id}}" target="_blank">{{$video->title}}</a>
                    </h2>
                    <p class="text-center">
                        عدد المشاهدات للمحاضرة {{$video->views->count()}}
                    </p>
                </header>
                <div class="table-responsive ">
                    <table class="table table-striped  align-middle text-center">
                        <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الاكتروني</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($video->views as $view)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$view->student->name}}</td>
                                <td>{{$view->student->email}}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">لا يوجد مشاهدات لهذه المحاضرة</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection