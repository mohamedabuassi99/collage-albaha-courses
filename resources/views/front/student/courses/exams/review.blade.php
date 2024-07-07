@extends('layouts.front.app')

@section('title')
    {{$exam->course->name}}
@endsection

@section('content')
    <div class="container-fluid px-5 ">
        <div class="row ">
            @include('front.student.sidebar.sidebar')
            <div class="col-12 col-lg-10 p-0 bg-200">
                <header>
                    <h3 class="text-center my-5">
                        مراجعة الاختبار
                    </h3>
                </header>

                <main>
                    @foreach($exam->questions as $question)
                        <div class="card m-3">
                            <div class="card-header d-flex justify-content-between border-2 border-bottom">
                                <p class="fs-2 text-dark mb-0">{{$question->question}}
                                </p>
                                <span>({{$question->mark}}) علامة</span>
                            </div>
                            <ul class="list-unstyled my-3 mx-4">
                                @foreach(json_decode($question->options) as $option)
                                    @if($option != null)
                                        <li class="mb-2 @if($option == @$question->all_answers[0]->answers) text-info text-decoration-underline @endif">{{$option}}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <p class="px-4 ">الاجابة الصحيحة هي:
                                <span class="fw-bolder"> {{$question->answers}}</span>
                            </p>
                        </div>
                    @endforeach
                </main>
            </div>
        </div>
    </div>
@endsection