<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود/ثبت نام فراهوش</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link type="text/css" href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

</head>
<body>
<div class="container" id="container">
    <!-- start sing up form -->
    <div class="form-container sign-up-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1>ایجاد حساب</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
            </div>
            <span>یا با شماره تلفن خود حساب ایجاد کنید</span>
            <input name="name" type="text" placeholder="نام" />
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input name="phone_number" id="dir-tel" type="tel" placeholder="شماره تلفن" />
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input name="password" type="password" placeholder="رمز عبور" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <button id="ozviat-button" type="submit">عضویت</button>
        </form>
    </div>
    <!-- end sing up form -->
    <!-- start sing in form -->
    <div class="form-container sign-in-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1>ورود</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook-f" style="color:white"></i></a>
                <a href="#" class="social"><i class="fa fa-google-plus" style="color:white"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin" style="color:white"></i></a>
            </div>
            <span>یا با حساب خود وارد شوید</span>
            <input name="phone_number" type="text" placeholder="نام یا شماره تلفن" />
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input name="password" type="password" placeholder="رمز عبور" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <a href="#">رمز عبور خود را فراموش کرده ام !</a>
            <button type="submit">ورود</button>
        </form>
    </div>
    <!-- end sing in form -->

    <div class="overlay-container">
        <div class="overlay">
            <!-- start sing in overlay -->
            <div class="overlay-panel overlay-right">
                <h1>خوش آمدید</h1>
                <p>برای ارسال سوال لطفا حساب کاربری خود را ایجاد کنید</p>
                <button class="ghost" id="signIn">ورود</button>
            </div>
            <!-- end sing in overlay -->
            <!-- start sing up overlay -->
            <div class="overlay-panel overlay-left">
                <h1>سلام، دوست خوبم</h1>
                <p>وارد حساب کاربری خود شوید و سوالات خود را بفرستید</p>
                <button class="ghost" id="signUp">عضویت</button>
            </div>
            <!-- end sing up overlay -->
        </div>
    </div>
</div>

<script  src="{{ asset('assets/js/sliderreg.js') }}"></script>

<script>

</script>
</body>
</html>
