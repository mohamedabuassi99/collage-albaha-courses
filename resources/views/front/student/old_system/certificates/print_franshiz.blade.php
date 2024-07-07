<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>BUcet</title>
    <!--<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <style>


        td {
            height: 55px;
            text-align: center;
        }
    </style>


</head>
<body style="position: relative; text-align: center;  font-family: 'Almarai', sans-serif;">

<img src="{{ asset('/img/franshiz.jpg') }}" alt="" class="">
<div style="position: absolute; text-align: center; top:22%; ">
    <table style="width:100%; margin-right:100px; margin-left:100px;">
        <tr>
            <td style="color:#222; font-size:55px;  height:400px; padding-left:80px;  font-family:Lateef; ">{{$register->student->name}}</td>
        </tr>
        <!--<tr>-->
        <!--<td style="text-align:center; padding-top:80px; padding-left:30px; height:230px; padding-left:280px;">  -->
    <!--                  <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(90)->generate('https://bucert.com/certificate/'.$register->confirm_certificate)) }} "><br>-->
        <!--             <p style="color:#2261a9; font-size:15px; margin-top:5px; font-family:Lateef; ">هذه الشهادة معتمدة إلكترونيا </p>-->

        <!--</td>-->
        <!--</tr>  -->
    </table>
</div>
</body>
</html>

