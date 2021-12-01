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

            <span> با شماره تلفن خود حساب ایجاد کنید</span>
            <input value="{{ old('name') }}" name="name" type="text" placeholder="نام" />
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input value="{{ old('phone_number') }}" name="phone_number" id="dir-tel" type="tel" placeholder="شماره تلفن" />
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input value="{{ old('password') }}" name="password" type="password" placeholder="رمز عبور" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input value="{{ old('name') }}" name="name" type="text" placeholder="کد معرف " />
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <div id="resend-code">
            <input value="{{ old('name') }}" name="name" type="text" placeholder="کد تایید شماره تلفن " style="border-radius:0px 5px 5px 0px;"/>
                <div class="reload-icon-div"><i class="fa fa-refresh fa-lg reload-icon" aria-hidden="true"></i></div>
              </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror
            
            <button class="ozviat-button" id="" type="submit">عضویت</button>
        </form>
    </div>
    <!-- end sing up form -->
    <!-- start sing in form -->
    <div class="form-container sign-in-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1>ورود</h1>
            <span>با حساب خود وارد شوید</span>
            <input value="{{ old('phone_number') }}" name="phone_number" type="text" placeholder="نام یا شماره تلفن" />
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input value="{{ old('password') }}" name="password" type="password" placeholder="رمز عبور" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <a href="#" id="btnmodal">رمز عبور خود را فراموش کرده ام !</a>
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

    <div id="modal-kharidd" class="modal-kharid">


        <!-- Modal content -->
        <div class="modal-kharid-content">
        <div class="modal-header">
                <span class="close">&times;</span>
                <p class="modal-text-header">فراهوش رمز عبور</p>
        </div>         
                <form id="forgot-password" action="">

<!-- One "tab" for each step in the form: -->
<div class="tab">شماره تلفن که قبلا ثبت نام کردید رو وارد کنید :
  <p><input type="tel" placeholder="... شماره تلفن " oninput="this.className = ''"></p>
</div>

<div class="tab">کد ارسال شده به شماره تلفن رو وارد کنید :
  <p><input placeholder="... کد ارسالی " oninput="this.className = ''"></p>
  

</div>

<div class="tab">رمز عبور جدید بسازید :
  <p><input placeholder="رمز عبور جدید" oninput="this.className = ''"></p>
  <p><input placeholder="رمز عبور جدید" oninput="this.className = ''"></p>
</div>
<div class="tab">
<i class="fa fa-check fa-check-class" aria-hidden="true"></i>
<p class="successfull4">رمز عبور شما با موفقیت تغییر کرد.</p>
</div>
<div>
  <div style="float:right;">
    <button type="button" id="prevBtn" class="backtotel" onclick="nextPrev(-1)">تغییر شماره تلفن</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">تایید</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>
    </div>

    <div id="modal-kharidd" class="modal-kharid">

<!-- Modal content -->
<div class="modal-kharid-content">
<div class="modal-header">
        <span class="close">&times;</span>
</div>         
        <form id="forgot-password" action="">

<!-- One "tab" for each step in the form: -->
<div class="tab">شماره تلفن که قبلا ثبت نام کردید رو وارد کنید :
<p><input placeholder="شماره تلفن ..." oninput="this.className = ''"></p>
</div>

<div class="tab">کد ارسال شده به شماره تلفن رو وارد کنید :
<p><input placeholder="کد ارسالی ..." oninput="this.className = ''"></p>
</div>

<div class="tab">رمز عبور جدید بسازید :
<p><input placeholder="رمز عبور جدید" oninput="this.className = ''"></p>
<p><input placeholder="رمز عبور جدید" oninput="this.className = ''"></p>
</div>
<div class="tab">
<i class="fa fa-check fa-check-class" aria-hidden="true"></i>
<p class="successfull4">رمز عبور شما با موفقیت تغییر کرد.</p>
</div>
<div>
<div style="float:right;">
<button type="button" id="prevBtn" class="backtotel" onclick="nextPrev(-1)">تغییر شماره تلفن</button>
<button type="button" id="nextBtn" onclick="nextPrev(1)">تایید</button>
</div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
</div>

</form>
</div>

<script  src="{{ asset('assets/js/auth.js') }}"></script>

</body>
</html>
