<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>BUcet</title>
    <style>


    </style>


</head>

@php
    $certificate = \App\Models\Certificate::where('student_id',$id)->first();
    $course = \App\Models\Course::where('id',$course_id)->first();
@endphp


<body style="position: relative; text-align: center; ">

<img src="{{ asset('/img/franchise_industry.png') }}" style="height:100%; width:100%;" alt="" class="">
<div style="position: absolute; text-align: center; top:42%; ">

    <table style="width:100%; margin-right:100px; margin-left:100px;">

        <tr>
            <td style="text-align:center; font-size:55px; line-height: 1.4; ">
                {{$register->student->name}}
            </td>
        </tr>

    </table>
</div>

<div style="position: absolute; text-align: center; top:80%; ">

    <table style="width:100%; margin-right:100px; margin-left:100px;">

        <tr>
            <td style="text-align:center; font-size:27px;   line-height: 1.4;">


                <p style="font-size:16px; ">
                    <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(125)->generate('https://bucert.com/certificate/'.$register->confirm_certificate)) }} "><br>

                </p>


            </td>

        </tr>

    </table>
</div>
</body>
</html>
