<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{--<link href="../../vendor/phpunit/php-code-coverage/src/Report/Html/Renderer/Template/css/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
    <link href="../../public/css/app.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="position-ref full-height">
    <div class="content">
        <div class="title m-b-md" style="font-size: 65px;">
            Address Book
        </div>

        <div class="links">
            <input type="text" id="name"  placeholder="Name">
            <input type="text" id="phone" placeholder="Address">
        </div>
    </div>
</div>
</body>
</html>
<script src="../../public/js/jquery/dist/jquery.min.js"></script>
<script src="../script/address.js"></script>