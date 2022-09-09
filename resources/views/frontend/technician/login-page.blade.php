
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log In &middot;</title>
        <link rel="shortcut icon" href="">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
        <link rel="stylesheet" href="{{ asset('frontend-assets/dashboard/css/vendor.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend-assets/dashboard/css/elephant.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend-assets/dashboard/css/login-2.min.css') }}">
    </head>
    <body>
    <div class="login">
        <div class="login-body">
            <a class="login-brand" href="{{ url('tech/login') }}">
                <img class="img-responsive" src="{{asset('frontend-assets/static-images/header/search1.png')}}" alt="">
            </a>
            <div class="login-form">
                @if(session()->has('loginError'))
                    <div class="alert alert-danger">{{ session('loginError') }}</div>
                @endif
                <form data-toggle="validator" class="login-form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control"  name="email" autocomplete="off" data-msg-required="Please enter your username / email." required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" minlength="6"  data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-control-primary custom-checkbox">
                            <input class="custom-control-input" type="checkbox" checked="checked">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-label">Keep me signed in</span>
                        </label>
                        <span aria-hidden="true"> · </span>
                        <a href="{{ url('admin/forget/passowrd') }}">Forgot password?</a>
                    </div>
                    <button class="btn btn-primary btn-block btn-log-in" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin-assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/elephant.min.js') }}"></script>
    <script>
    </script>
</body>
</html>
