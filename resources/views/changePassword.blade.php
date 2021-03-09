<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Dashboard</title>

  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Car Dealership</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>



  </nav>

  <div id="wrapper">

    <ul class="sidebar navbar-nav">
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf


                                <div class="form-group row">
                                    <label for="oldPassword" class="col-md-4 col-form-label text-md-right">Old Password</label>

                                    <div class="col-md-6">
                                        <input id="oldPassword" type="password" class="form-control{{ $errors->has('passwordold') ? ' is-invalid' : '' }}" name="passwordold" required autofocus>
                                        @if ($errors->has('passwordold'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('passwordold') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="newPassword" class="col-md-4 col-form-label text-md-right">New Password</label>

                                    <div class="col-md-6">
                                        <input id="newPassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Beko Car Sales 2019</span>
          </div>
        </div>
      </footer>

    </div>

</div>

<script src="{{ asset('js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('js/sb-admin.min.js') }}"></script>

</body>
</html>

