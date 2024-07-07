@extends('layouts.front.app')

@section('title')
    محاضرات يوتيوب  {{$course->name}}
@endsection
@push('css')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('admin/assets/css/youtube-file.css')}}">
@endpush
@section('content')
    <div class="container-fluid px-5 ">
        <div class="row ">
{{--            @include('front.student.sidebar.sidebar')--}}
            <div class="col-12 col-lg-12 shadow bg-white rounded-3 mt-3 p-0">
                @if(session('success'))
                    <div class="alert alert-success border-2 m-3 d-flex align-items-center" role="alert">
                        <div class="bg-success me-3 icon-item"><span
                                    class="fas fa-times-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">{{session('success')}}
                        </p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('failed'))
                    <div class="alert alert-danger border-2 m-3 d-flex align-items-center" role="alert">
                        <div class="bg-danger me-3 icon-item"><span
                                    class="fas fa-times-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">{{session('failed')}}
                        </p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4 pe-0 col-12">
                        <div class="bg-light ">
                            <p class=" p-3 mb-0">
                                <b>{{$course->name??$course->name_en}}</b>
                                <br>
                                عدد المحاضرات: {{$course->videos->count()}}
                            </p>
                            <hr class="m-0 text-secondary">
                            <div class="">
                                <ul class="list-unstyled overflow-auto  vh-100">
                                    @foreach($course->videos as $video)
                                        <li class="hover-li @if($video->video_id == @$videoInfo->id) active-li @endif">
                                            <a href="{{route('student.courses.youtube_lectures.index',[$course,$video])}}"
                                               class="">
                                                <div class="d-flex">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <div class="check-box">
                                                            <label class="mb-0 ">
                                                                <div class="border check-border">
                                                                    <input type="checkbox"
                                                                           @if(auth('student')->user()->hasWatchThisVideo($video)) checked
                                                                           @endif
                                                                           name="video_id" id="video-{{$loop->index}}"
                                                                           class="video-{{$video->video_id}}"/>
                                                                    <svg class="checkmark "
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 52 52">
                                                                        <circle class="checkmark__circle " cx="26"
                                                                                cy="26"
                                                                                r="25" fill="none"/>
                                                                        <path class="checkmark__check " fill="none"
                                                                              d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex">
                                                        <img src="{{$video->thumbnails}}" class="img-fluid" alt="">
                                                        <div class="px-1">
                                                            <small class="">{{$video->title}}</small>
                                                            <br>
                                                            <small class="d-inline-flex text-secondary">{{$video->channel_title}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <script>
                                            jQuery(document).ready(function () {
                                                jQuery('#video-{{$loop->index}}').click(function (e) {
                                                    // e.preventDefault();
                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });
                                                    jQuery.ajax({
                                                        url: "{{route('student.courses.youtube_lectures_views.store',$video)}}",
                                                        method: 'POST',
                                                        data: {
                                                            "_token": "{{ csrf_token() }}",
                                                            video_id: jQuery('#video-{{$loop->index}}').is(":checked"),
                                                        },
                                                        success: function (result) {
                                                            {{--                                                            alert(jQuery('#video-{{$loop->index}}').is(":checked"))--}}
                                                            // $('#alert').attr('class', 'alert alert-success');
                                                            // $('#alert').html('تم ارسال الرسالة بنجاح');
                                                            // $('#name').val('');
                                                            // $('#email').val('');
                                                            // $('#phone').val('');
                                                            // $('#message').val('');
                                                        },
                                                        error: function (result) {
                                                            alert(result);
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 ps-0 col-12">
                        <div class=" ">
                            {{--                                <div class="ratio ratio-16x9" id="player">--}}
                            {{--                                    <iframe src="https://www.youtube.com/embed/{{$youtubeLecture->video_id}}"--}}
                            {{--                                            allowfullscreen="allowfullscreen"--}}
                            {{--                                            title="{{$youtubeLecture->title}}"--}}
                            {{--                                    ></iframe>--}}
                            {{--                                </div>--}}
                            <div id="player"></div>

                            <div class="m-3">
                                <p class="fs-1">
                                    {{$videoInfo->snippet->title}}
                                </p>
                                <p class="fs-0">
                                    اسم القناة: {{$videoInfo->snippet->channelTitle}}
                                </p>
                                <span>{{\Carbon\Carbon::parse($videoInfo->snippet->publishedAt)->translatedFormat('l j F Y - h:i a')}}</span>
                                <div class="mt-3">
                                    <p>العلامات :</p>
                                    @foreach($videoInfo->snippet->tags as $tag)
                                        <span class="badge bg-secondary">{{$tag}}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- modal -->
                            <div class="modal fade " id="video-modal" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document"
                                     style="max-width: 500px">
                                    <div class="modal-content position-relative">
                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-0">
                                            {{--                                    <div class="rounded-top-lg py-3 ps-4 pe-6 ">--}}
                                            {{--                                        <h4 class="mb-1" id="modalExampleDemoLabel"> </h4>--}}
                                            {{--                                    </div>--}}
                                            <div class="p-4 pb-0 text-center">
                                                <p class="">
                                                    تم انتهاء الدرس بنجاح
                                                </p>
                                                <div class="icon icon--order-success svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="154px"
                                                         height="154px">
                                                        <g fill="none" stroke="#22AE73" stroke-width="2">
                                                            <circle cx="77" cy="77" r="72"
                                                                    style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                                                            <circle id="colored" fill="#22AE73" cx="77" cy="77" r="72"
                                                                    style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                                                            <polyline class="st0" stroke="#fff" stroke-width="10"
                                                                      points="43.5,77.8 63.7,97.9 112.2,49.4 "
                                                                      style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center d-flex justify-content-center align-items-center gap-5 my-3">
                                            <button class="btn btn-falcon-danger" type="button" data-bs-dismiss="modal">
                                                الغاء
                                            </button>
                                            <a class="btn btn-falcon-success"
                                               href="{{route('student.courses.youtube_lectures.index',[$course,\App\Models\YoutubeLecture::where('course_id',$course->id)->where('id','>',$youtubeLecture->id)->first()])}}">التالي </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('js')
    <script src="https://www.youtube.com/player_api"></script>
    <script>
        // create youtube player
        var player;

        function onYouTubePlayerAPIReady() {

            player = new YT.Player('player', {
                videoId: '{{$youtubeLecture->video_id}}',
                height: '600',
                width: '100%',
                playerVars: {rel: 0,},
                events: {
                    onReady: onPlayerReady,
                    onStateChange: onPlayerStateChange
                }
            });
        }

        // autoplay video
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // when video ends
        function onPlayerStateChange(event) {
            if (event.data === 0) {
                $('.video-{{@$videoInfo->id}}').prop('checked', true);
                // alert('done');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{route('student.courses.youtube_lectures_views.store',$youtubeLecture)}}",
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        video_id: "true",
                    },
                });
                document.exitFullscreen();

                setTimeout(function () {
                    $('#video-modal').modal('show')
                }, 1000);
            }
        }
    </script>
@endpush
