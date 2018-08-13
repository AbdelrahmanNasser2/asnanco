<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Asnanco</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @include('header')
            
             <div class="content">
                <div class="title m-b-md">
                    Asnanco
                </div>

                <div class="links">

                    <a href="{{url('Patients')}}" style="font-size: 18px;">قسم المرضى</a>
                    

                    @if(session('role') == 1)
                        <a href="{{url('Purchases')}}" style="font-size: 18px;">المشتريات</a>
                    @elseif (session('role') == 2)
                        <a href="{{url('Purchases/create')}}" style="font-size: 18px;">المشتريات</a>
                    @endif


                    @if(session('role') == 1)
                        <a href="{{url('RepairDevices')}}" style="font-size: 18px;">صيانة الاجهزه</a>
                    @elseif (session('role') == 2)
                        <a href="{{url('RepairDevices/create')}}" style="font-size: 18px;">صيانة الاجهزه</a>
                    @endif
                    
                    
                    @if(session('role') == 1)
                        <a href="{{url('Salary')}}" style="font-size: 18px;">المرتبات</a>
                    @endif


                    <a href="{{url('Lab')}}" style="font-size: 18px;">المعامل</a>
                    

                    @if(session('role') == 1)
                        <a href="{{url('Admin')}}" style="font-size: 18px;">وحده التحكم</a>
                    @endif
                </div>
                <br><br><br>
                 @if($message = Session::get('success'))
                <div class="container">
                    <div class="alert alert-success" style="text-align:right;">
                        <p>{{$message}}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
