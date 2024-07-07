<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>BUcet</title>
    <style>


    </style>


</head>
<body style="position: relative; text-align: center; ">

<img src="{{ asset('/img/certificate.jpeg') }}" alt="" class="">
<div style="position: absolute; text-align: center; top:10%; ">

    <table style="width:100%; margin-right:100px; margin-left:100px;">
        <tr>
            <td colspan="3" style="text-align:right; font-size:24px; margin-left:-40px;">
            </td>
        </tr>
        <tr>
            <td></td>
            <th style="text-align:center; font-size:33px; height:35px; color:#ccbc84;">
                <h3>شهـــــادة إتمـــــام دورة تــطويريــة إلكترونيــة</h3>
            </th>
            <td style="text-align:center; font-size:22px;">المملكة العربية السعودية <br>
                وزارة التعليم <br>
                كلية الباحة الاهلية <br>
            </td>
        </tr>
        <tr>
            <td height="390px" colspan="3" style="text-align:center; font-size:27px;   line-height: 1.4;">

                <p><b>هـــــــذه الشهـــــــــادة تــــــؤكـــــــــــــد إتمـــــــــــــــــام

                        <br>
                        {{$register->student->name}} <br>
                        {{$register->student->nationality}} الجنسيـــــــــة بــــــمــوجـــــب الهــــويــــــة
                        رقــــــــم: {{$register->student->id_number}} </b></p>
                <p><b>
                        دورة: {{$register->course->name}}
                    </b>
                </p>
                <p><b>
                        عـــــــــدد الســاعـــــــات التــــــــدريــبـــــــــة ({{$register->course->hours}})
                        وعــــدد الأيـــــــام ({{$register->course->days}})
                    </b>
                </p>
                <p><b>
                        خــــــــلال الفتـــــرة مـــــن {{ date('Y/m/d', strtotime($register->course->from))}}
                        إلى {{ date('Y/m/d', strtotime($register->course->to))}}
                    </b>
                </p>
                <p><b>
                        مــــــع تـــمنيـــــاتنـــــا بـــــدوام التـــــوفيـــــق والســـــداد
                    </b>
                </p>

                <p style="font-size:16px;">
                    <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(80)->generate('https://bucert.com/certificate/'.$register->confirm_certificate)) }} "><br>
                    الشهادة معتمدة ولا تحتاج إلى توقيع أو ختم
                </p>
            </td>

        </tr>

        <tr>
            <td style="font-size:23px;  text-align:center;"><b>بيت الخبرة</b></td>
            <td rowspan="2" style="text-align:center;">

            </td>
            <td style=" text-align:center; font-size:23px;"><b>تاريخ الشهادة</b></td>
        </tr>
        <tr>
            <td style="font-size:23px; text-align:center;"><b>{{$register->course->instructor}}</b></td>
            <td style=" text-align:center; font-size:23px;"><b>{{$register->course->to}}</b></td>
        </tr>
    </table>

</div>

</body>
</html>
