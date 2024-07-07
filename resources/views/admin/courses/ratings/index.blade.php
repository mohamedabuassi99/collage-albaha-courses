@extends('layouts.admin.app')
@section('title')
    تقييمات دورة {{$course->name??$course->name_en}}
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-3.png')}});background-size: cover;"></div>
        <div class="card-body position-relative">
            <header>
                <h3 class="text-center">
                    تقييمات دورة {{$course->name??$course->name_en}}
                </h3>
            </header>
            <main class="row">
                <div class="card-body d-md-flex justify-content-center align-items-center gap-5">
                    <div class="col-12 col-md-5 border border-secondary rounded-3 d-flex justify-content-around align-items-center gap-4 p-3">
                        <div class="w-100">
                            <ul class="list-unstyled m-0 ">
                                <li class="mb-2">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <span>1</span>
                                        <div class="progress w-100 " style="height:15px">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width:{{($course->ratings()->where('value',1)->count()/$course->ratings()->count()) * 100}}%;"
                                                 aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100">{{$course->ratings()->where('value',1)->count()}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <span>2</span>
                                        <div class="progress w-100" style="height:15px">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width:{{($course->ratings()->where('value',2)->count()/$course->ratings()->count()) * 100}}%;"
                                                 aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100">{{$course->ratings()->where('value',2)->count()}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <span>3</span>
                                        <div class="progress w-100" style="height:15px">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width:{{($course->ratings()->where('value',3)->count()/$course->ratings()->count()) * 100}}%;"
                                                 aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100">{{$course->ratings()->where('value',3)->count()}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    {{--                                            @dd($course->ratings()->where('value',4)->count())--}}
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <span>4</span>
                                        <div class="progress w-100" style="height:15px">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width:{{($course->ratings()->where('value',4)->count()/$course->ratings()->count()) * 100}}%;"
                                                 aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100">{{$course->ratings()->where('value',4)->count()}}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <span>5</span>
                                        <div class="progress w-100" style="height:15px">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width:{{($course->ratings()->where('value',5)->count()/$course->ratings()->count()) * 100}}%;"
                                                 aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100">{{$course->ratings()->where('value',5)->count()}}</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div>
                            <header>التقييمات</header>
                            <main class="d-flex align-items-center justify-content-center fs-1 my-3 bg-soft-secondary rounded-circle "
                                  style="width: 100px;height: 100px;">
                                5/{{(float)$course->ratings()->avg('value')}}
                                {{--                                        {{(float)$course->ratings()->sum('value')+3/($course->ratings()->count()+1)*5}}--}}
                            </main>
                            <footer class="fs--1">
                                عدد التقييمات: {{$course->ratings()->count()}}
                            </footer>
                        </div>
                    </div>
                </div>
                @foreach($course->ratings() as $rating)
                    <div class="col-12 border-bottom mb-3">
                        <div>
                            <header>

                                <div class="d-flex gap-3">
                                    <h4>
                                        {{$rating->registration->student->name??$rating->registration->student->name_en}}
                                    </h4>
                                    <div>
                                        @for($x=1;$x<=5;$x++)
                                            @if($x<=$rating->value)
                                                <svg width="25" xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 47.94 47.94"
                                                     style="enable-background:new 0 0 47.94 47.94;"
                                                     xml:space="preserve">
<path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
</svg>
                                            @else
                                                <svg width="25" xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 47.94 47.94"
                                                     style="enable-background:new 0 0 47.94 47.94;"
                                                     xml:space="preserve">
<path style="fill:#716a62;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
</svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div>
                                    <p>{{$rating->description }}</p>
                                </div>
                            </header>
                        </div>
                    </div>
                @endforeach
            </main>
        </div>
    </div>
@endsection