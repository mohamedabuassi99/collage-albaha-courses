@extends('layouts.admin.app')
@section('title')
    محاضرات يوتيوب
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
                        قسم المحاضرات (YouTube)
                    </h2>
                </header>

                <div>
                    <form action="{{route('admin.course.youtube_lectures.store',$course)}}" method="post">
                        @csrf
                        <div class="mx-4">
                            <div class="mb-4">
                                <label for="video_url" class="fs-1">اضافة فيديو من خلال الرابط</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text  text-danger" id="basic-addon3">https://www.youtube.com/watch?v=99ND_B5kMd4</span>
                                    <input class="form-control " name="video_url" id="video_url" type="url"
                                           aria-describedby="basic-addon3"/>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="video_id" class="fs-1">اضافة فيديو من خلال (ID) الفيديو</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text "
                                          id="basic-addon3" dir="ltr">https://www.youtube.com/watch?v=<span
                                                class="text-danger">99ND_B5kMd4</span></span>
                                    <input class="form-control " id="video_id" name="video_id" type="text"
                                           aria-describedby="basic-addon3"/>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="playlist_id" class="fs-1">اضافة فيديوهات من خلال (ID) القائمة
                                    (playlists)</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text "
                                          id="basic-addon3"
                                          dir="ltr">https://www.youtube.com/watch?v=ZJuJ9F0G02A&list=<span
                                                class="text-danger">PLTzMGnJjrsSyGvV87-ux922n2GXyeDsRo</span></span>
                                    <input class="form-control " id="playlist_id" name="playlist_id" type="text"
                                           aria-describedby="basic-addon3"/>
                                </div>
                            </div>

                            <button class="btn btn-primary ">اضافة</button>
                        </div>

                    </form>
                    <div class="text-center my-3">
                        <a href="{{route('admin.course.youtube_lectures.renumbering',$course)}}"
                           class="btn btn-falcon-warning">تصحيح الترقيم</a>
                    </div>
                </div>
                <div class="table-responsive ">
                    <table class="table table-striped  align-middle text-center">
                        <thead>
                        <tr class="bg-light">
                            <th>#</th>
                            <th>ترقيم</th>
                            <th>صورة</th>
                            <th>العنوان</th>
                            <th>اسم القناة</th>
                            <th>عدد المشاهدات</th>
                            {{--                            <th>رابط </th>--}}
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($course->videos as $video)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$video->numbering}}</td>
                                <td><img src="{{$video->thumbnails}}" class="rounded" alt=""></td>
                                <td><a href="https://www.youtube.com/watch?v={{$video->video_id}}"
                                       target="_blank">{{$video->title}}</a></td>
                                <td>{{$video->channel_title}} </td>
                                <td>{{$video->views->count()}} </td>
                                <td>
                                    <a href="{{route('admin.course.youtube_lectures.views',$video)}}"
                                       class="btn btn-outline-info">
                                        عرض المشاهدين
                                    </a>
                                    <a href="{{route('admin.course.youtube_lectures.destroy',$video)}}"
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