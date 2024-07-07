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

<img src="{{ asset('/img/mogeza.jpg') }}" alt="" class="">
<div style="position: absolute; text-align: center; top:22%; ">
    <table style="width:100%; margin-right:100px; margin-left:100px;">
        <tr>
            <td style="color:#222; font-size:55px;  height:350px; padding-left:80px;  font-family:Lateef; ">{{$register->student->name}}</td>
        </tr>
    </table>
</div>

</body>
</html>

