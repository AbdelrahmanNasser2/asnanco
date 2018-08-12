<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,
	initial-scale=1">
	<title>Asnanco</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	<link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:900">

</head>
<body>
@if (Session::has('username'))
    <div class="container">
    	@include('header')
    	<br/><br/><br/>
    	@yield('content')
    </div>
@else
    <div class="container">
        @include('httpAuth')
    </div>
@endif
</body>
</html>