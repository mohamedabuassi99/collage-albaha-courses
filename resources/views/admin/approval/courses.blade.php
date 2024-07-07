@extends('layouts.admin.app')
@section('title')
    جميع الدورات الغير معتمدين
@endsection
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
             style="background-image:url({{asset('admin/assets/img/icons/spot-illustrations/corner-4.png')}});background-size: cover;"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <h3 class="text-center mt-3 mb-4">
                    جميع الدورات الغير معتمدين
                </h3>
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
                <div class="table-responsive scrollbar">
                    <table class="table table-striped text-center align-middle overflow-hidden">

                        <thead>
                        <tr class="btn-reveal-trigger">
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">اسم المدرب</th>
                            <th scope="col">عدد الايام</th>
                            <th scope="col">عدد الساعات</th>
                            <th scope="col">من</th>
                            <th scope="col">الى</th>
                            <th scope="col">التخصص</th>
                            <th scope="col">السعر</th>
                            <th scope="col">عرضها بالمتجر</th>
                            <th scope="col">عدد الطلاب</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($courses as $course)
                            <tr class="btn-reveal-trigger">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$course->name ?? $course->name_en}}</td>
                                <td>{{$course->instructor ??' - '}}</td>
                                <td>{{$course->days ??' - '}}</td>
                                <td>{{$course->hours ??' - '}}</td>
                                <td>{{$course->from ??' - '}}</td>
                                <td>{{$course->to ??' - '}}</td>
                                <td>{{$course->category->title ?? '-'}}</td>
                                <td>{{$course->price ??'-'}}</td>
                                <td>{{$course->show == 1 ? 'نعم':' لا'}}</td>
                                <td>{{$course->students->count() ?? '-'}}</td>
                                <td>
                                    <a href="{{route('admin.approval.courses.accept',$course)}}"
                                       class="btn btn-outline-success">اعتماد</a>
                                    <a href="{{route('admin.course.destroy',$course)}}"
                                       class="btn btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12">لا يوجد دورات غير معتمدين</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection