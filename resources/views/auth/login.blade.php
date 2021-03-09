<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin Login</title>

  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control {{$errors->has('email') ? ' is-invalid' : '' }}"
                                value="{{ old('email') }}" placeholder="Email address" autofocus="autofocus" required="required">
                        @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        <label for="email">Email address</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control {{$errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Password" required="required">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        <label for="password">Password</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="d-block small mt-3" href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

  <script src="{{ asset('js/jquery-1.10.2.min.js') }}" ></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" ></script>

</body>
</html>
