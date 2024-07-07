@extends('layouts.front.app')

@section('title')
    اثبات شهادة  {{$registration->student->name}}
@endsection
@push('css')

@endpush
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-header text-center fs-4">
                    الشهادة موثوقة <i class="fa fa-check text-success"></i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle w-md-75 mx-auto w-100">
                            <tr>
                                <th>اسم الطالب</th>
                                <td>{{$registration->student->name??' - '}}</td>
                                <td>{{$registration->student->name_en??' - '}}</td>
                                <th>student name</th>
                            </tr>
                            <tr>
                                <th>اسم المدرس</th>
                                <td>{{$registration->course->instructor??' - '}}</td>
                                <td>{{$registration->course->instructor_en??' - '}}</td>
                                <th>instructor name</th>
                            </tr>
                            <tr>
                                <th>اسم الدورة</th>
                                <td>{{$registration->course->name??' - '}}</td>
                                <td>{{$registration->course->name_en??' - '}}</td>
                                <th>course name</th>
                            </tr>
                            <tr>
                                <th>تاريخ البداية</th>
                                <td>{{$registration->course->from??' - '}}</td>
                                <th>تاريخ النهاية</th>
                                <td>{{$registration->course->to??' - '}}</td>
                            </tr>
                            <tr>
                                <th>عدد الايام</th>
                                <td>{{$registration->course->days??' - '}}</td>
                                <th>عدد الساعات</th>
                                <td>{{$registration->course->hours??' - '}}</td>
                            </tr>
                            <tr>
                                <th>تاريخ اصدار الشهادة</th>
                                <td>{{$registration->course->publishdate ??' - '}}</td>
                                <th>رقم الشهادة</th>
                                <td>{{$registration->id??' - '}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection