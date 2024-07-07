<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>BUcet</title>
    <!--<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>-->
    <link href='https://fonts.googleapis.com/css?family=Almarai' rel='stylesheet'>


    <style>


        td {
            height: 35px;
            text-align: center;
        }
    </style>
</head>
<body style="position: relative; text-align: center;  font-family: 'Lateef';">

<img src="{{ asset('/img/new_cert.jpeg') }}" alt="" class="">
<div style="position: absolute; text-align: center; top:30%; ">

    <table style="width:100%; margin-right:50px; margin-left:50px;">
        <tr>

            <!--<td colspan="6" style=" font-size:45px;"> <b>شهادة إتمام دورة </b></td>-->
        </tr>
        <tr>
            <!--<td colspan="6" style="color:#6b6b86; font-size:26px; padding-top:-20px;">CERTIFICATE OF COMPLETION</td>-->

        </tr>
        <tr>
            <td colspan="3" style="color:#222; font-size:26px; text-align:left; ">Institute of Consulting Studies and
                Services at Al Baha University
            </td>


            <td colspan="3" style="color:#222; font-size:26px; text-align:right; "> يشهد معهد الدراسات والخدمات
                الاستشارية بجامعة الباحة
            </td>
        </tr>
        <tr>
            <td colspan="3" style=" font-size:26px; text-align:left;">Represented in the Experience
                House: {{@$register->course->instructor_en}} </td>

            <td colspan="3" style=" font-size:26px; text-align:right;">ممثلا في بيت
                الخبرة: {{@$register->course->instructor}} </td>
        </tr>
        <tr>
            <td colspan="2" style="color:#222; font-size:26px; width:385px; text-align:left;">The Apprentice <span
                        style="color:#2261a9;">{{$register->student->name_en}}</span></td>


            <td rowspan="7" colspan="2" style="text-align:center; padding-top:200px; padding-left:30px;">
                <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(75)->generate('https://bucert.com/certificate/'.$register->confirm_certificate)) }} "><br>
                <p style=" font-size:15px; margin-top:5px;">هذه الشهادة معتمدة إلكترونيا
                    <br>
                    <span>{{date('Y', strtotime($register->course->to))}}/{{$register->confirm_certificate}}</span>
                </p>
            </td>


            <td colspan="2" style="color:#222; font-size:26px; width:385px; text-align:right;">بأن المتدرب <span
                        style="color:#2261a9;">{{$register->student->name}}</span></td>
        </tr>

        <tr>
            <td colspan="2" style="color:#222; font-size:26px; text-align:left;">I.D.
                No: {{$register->student->id_number}}</td>

            <td colspan="2" style="color:#222; font-size:26px; text-align:right;">رقم
                الهوية: {{$register->student->id_number}}</td>

        </tr>

        <tr>
            <td colspan="2" style="color:#222; font-size:26px; text-align:left;">
                Nationality: {{$register->student->nationality_en}}</td>

            <td colspan="2" style="color:#222; font-size:26px; text-align:right;">
                الجنسية: {{$register->student->nationality}}</td>

        </tr>
        <tr>
            <td colspan="2" style=" font-size:26px; text-align:left;">complete a course: <span
                        style="color:#2261a9;">{{$register->course->name_en}} </span></td>

            <td colspan="2" style=" font-size:26px; text-align:right;">قد اتم دورة: <span
                        style="color:#2261a9;">{{$register->course->name}} </span></td>
        </tr>

        <tr>
            <td colspan="2" style="color:#222; font-size:26px; text-align:left;">period from the <span
                        style=" font-size:26px;">
       {{ date('d/m/Y', strtotime($register->course->from))}}
       </span>
                to
                <span style=" font-size:26px;">
           {{ date('d/m/Y', strtotime($register->course->to))}}
       </span>
            </td>
            <td colspan="2" style="color:#222; font-size:26px; text-align:right;">من الفترة <span
                        style=" font-size:26px;">
       {{ date('d/m/Y', strtotime($register->course->from))}}
       </span>
                إلى
                <span style=" font-size:26px;">
           {{ date('d/m/Y', strtotime($register->course->to))}}
       </span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="color:#222; font-size:26px; text-align:left;">AS <span
                        style=" font-size:26px;"> {{$register->course->hours}} </span> training hours
            </td>

            <td colspan="2" style="color:#222; font-size:26px; text-align:right;">بواقع <span
                        style=" font-size:26px;"> {{$register->course->hours}}</span> ساعة تدريبية
            </td>
        </tr>

        <tr>
            <td colspan="2" style="color:#222; font-size:26px;  text-align:left;"> We wish him good luck and success
            </td>

            <td colspan="2" style="color:#222; font-size:26px;  text-align:right;">مع تمنياتنا له بالتوفيق والنجاح</td>
        </tr>

        <tr>
            <td></td>
            <td></td>

            <td></td>
            <td></td>
        </tr>

    </table>

</div>

</body>
</html>
