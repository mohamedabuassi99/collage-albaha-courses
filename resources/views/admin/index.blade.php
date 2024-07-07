@extends('layouts.admin.app')
@section('title')
        لوحة التحكم
@endsection

@section('content')

    <div class="row g-0">
        <div class="col-md-6 col-xxl-3 mb-3 pe-md-2">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <div class="bg-holder bg-card"
                         style="background-image:url({{asset('/admin/assets/img/icons/spot-illustrations/corner-5.png')}});"></div>
                    <h5 class="mb-0 mt-2 d-flex align-items-center">
                        جميع المدربين/المديرين
                    </h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row">
                        <div class="col">
                            <p class="font-sans-serif lh-1 mb-1 fs-4">{{\App\Models\User::count()}}</p>
                        </div>
                        <div class="col-auto ps-0">
                            <div class="echart-bar-weekly-sales h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2 pe-xxl-2">
            <div class="card h-md-100">
                <div class="bg-holder bg-card"
                     style="background-image:url({{asset('/admin/assets/img/icons/spot-illustrations/corner-3.png')}});"></div>
                <div class="card-header pb-0">
                    <h5 class="mb-0 mt-2">عدد الدورات</h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row justify-content-between">
                        <div class="col-auto align-self-end">
                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">{{\App\Models\Course::count()}}</div>

                        </div>
                        <div class="col-auto ps-0 mt-n4">
                            <div class="echart-default-total-order"
                                 data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","week 6","week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                 data-echart-responsive="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2 pe-xxl-2">
            <div class="card h-md-100">
                <div class="bg-holder bg-card"
                     style="background-image:url({{asset('/admin/assets/img/icons/spot-illustrations/corner-1.png')}});"></div>
                <div class="card-header pb-0">
                    <h5 class="mb-0 mt-2">عدد الطلاب</h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row justify-content-between">
                        <div class="col-auto align-self-end">
                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">{{\App\Models\Student::count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2 pe-xxl-2">
            <div class="card h-md-100">
                <div class="bg-holder bg-card"
                     style="background-image:url({{asset('/admin/assets/img/icons/spot-illustrations/corner-2.png')}});"></div>
                <div class="card-header pb-0">
                    <h5 class="mb-0 mt-2">عدد المشتركين</h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row justify-content-between">
                        <div class="col-auto align-self-end">
                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">{{\App\Models\SubscriberNotice::count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2">--}}
{{--            <div class="card h-md-100">--}}
{{--                <div class="card-header d-flex flex-between-center pb-0">--}}
{{--                    <h6 class="mb-0">Weather</h6>--}}
{{--                    <div class="dropdown font-sans-serif btn-reveal-trigger">--}}
{{--                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"--}}
{{--                                type="button" id="dropdown-weather-update" data-bs-toggle="dropdown"--}}
{{--                                data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span--}}
{{--                                    class="fas fa-ellipsis-h fs--2"></span></button>--}}
{{--                        <div class="dropdown-menu dropdown-menu-end border py-2"--}}
{{--                             aria-labelledby="dropdown-weather-update"><a class="dropdown-item" href="#!">View</a><a--}}
{{--                                    class="dropdown-item" href="#!">Export</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item text-danger" href="#!">Remove</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body pt-2">--}}
{{--                    <div class="row g-0 h-100 align-items-center">--}}
{{--                        <div class="col">--}}
{{--                            <div class="d-flex align-items-center"><img class="me-3"--}}
{{--                                                                        src="assets/img/icons/weather-icon.png" alt=""--}}
{{--                                                                        height="60"/>--}}
{{--                                <div>--}}
{{--                                    <h6 class="mb-2">New York City</h6>--}}
{{--                                    <div class="fs--2 fw-semi-bold">--}}
{{--                                        <div class="text-warning">Sunny</div>--}}
{{--                                        Precipitation: 50%--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto text-center ps-2">--}}
{{--                            <div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;</div>--}}
{{--                            <div class="fs--1 text-800">32&deg; / 25&deg;</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection