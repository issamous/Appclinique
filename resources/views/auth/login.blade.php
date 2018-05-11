<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Login</title>

   
  

    <link  href="{{ asset('assets/css/animate.css') }}"   rel="stylesheet">


       <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}"   rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('assets/css/mdb.min.css') }}"  rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('assets/css/style.css') }}"   rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"></h1>

            </div>
            <h3>Welcome to Backoffice</h3>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                <div class="form-group">
          
                    <input id="email" type="email" class="form-control" name="email" placeholder="Username"  value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                </div>
                <div class="form-group">
                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>


     <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"   ></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}" ></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}" ></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}" ></script>

</body>

</html>
