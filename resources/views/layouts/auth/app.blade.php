<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود/ثبت نام فراهوش</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link type="text/css" href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>
<body>
<div class="container" id="container">
    <!-- start sing up form -->
    <div class="form-container sign-up-container">
        <form action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf
            <h1>ایجاد حساب</h1>

            <span> با شماره تلفن خود حساب ایجاد کنید</span>
            <input value="{{ old('full_name') }}" name="full_name" type="text" placeholder="نام"/>
            @error('full_name')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input class="register-phone-number" value="{{ old('phone_number') }}" name="phone_number" id="dir-tel" type="tel"
                   placeholder="شماره تلفن"/>
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input value="{{ old('password') }}" name="password" type="password" placeholder="رمز عبور"/>
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input value="{{ old('referral_code_used') }}" name="referral_code_used" type="text" placeholder="کد معرف "/>
            @error('referral_code_used')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <div id="resend-code">
                <input value="{{ old('verification_code') }}" name="verification_code" type="text" placeholder="کد تایید شماره تلفن "
                       style="border-radius:0px 5px 5px 0px;"/>
                <div class="reload-icon-div send-verification-code-again"><i class="fa fa-refresh fa-lg reload-icon" aria-hidden="true"></i></div>
            </div>
            @error('verification_code')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <button class="ozviat-button" id="register-verify" data-submit-state="0" type="submit">ارسال کد تایید</button>
        </form>
    </div>
    <!-- end sing up form -->
    <!-- start sing in form -->
    <div class="form-container sign-in-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1>ورود</h1>
            <span>با حساب خود وارد شوید</span>
            <input required value="{{ old('phone_number') }}" name="phone_number" type="text" placeholder="نام یا شماره تلفن"/>
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                    <strong class="error-message">{{ $message }}</strong>
                </span>
            @enderror

            <input value="{{ old('password') }}" name="password" type="password" placeholder="رمز عبور"/>
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
                <p><input  id="register-phone-number-input" type="tel" placeholder="... شماره تلفن " oninput="this.className = ''"></p>
                <button type="button" id="nextBtn" class="register-phone-number">تایید</button>
            </div>

            <div class="tab">کد ارسال شده به شماره تلفن رو وارد کنید :
                <p><input id="check-code-input" placeholder="کد ارسالی ... " oninput="this.className = ''">
                    <span class="msg-error" style="font-size: 13px; color: red"></span>
                </p>
                <button type="button" id="nextBtn" class="check-code">تایید</button>
                <button type="button" id="prevBtn" class="backtotel" onclick="nextPrev(-1)">تغییر شماره تلفن
                </button>
            </div>

            <div class="tab">رمز عبور جدید بسازید :
                <p><input placeholder="رمز عبور جدید" id="pw-field" oninput="this.className = ''"></p>
                <button type="button" id="nextBtn" class="new-pw" onclick="nextPrev(1)">تایید</button>
            </div>
            <div class="tab">
                <i class="fa fa-check fa-check-class" style="font-size:110px;" aria-hidden="true"></i>
                <p class="successfull4">.رمز عبور شما با موفقیت تغییر کرد</p>
                <button type="button" id="nextBtn" class="test2" onclick="nextPrev(1)">تایید</button>
            </div>
            <div>
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
</div>


<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/auth.js') }}"></script>
<script>

    $('.send-verification-code-again').click(function () {
         sendVerificationCode($('.register-phone-number').val());
    });

    $('#register-verify').click(function (e) {
        if ($(this).attr('data-submit-state') == 0){
            e.preventDefault();
            sendVerificationCode($('.register-phone-number').val());
            $(this).attr('data-submit-state', 1)
            $(this).text('عضویت');
        }
    });


    function sendVerificationCode(phoneNumber) {
        $.ajax({
            type: 'POST',
            url: '{{ route('send.verification.code') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "phoneNumber" :phoneNumber
            },
            success: function (data) {
                Swal.fire({
                    icon: 'warning',
                    title: data['result'],
                    confirmButtonText: 'تایید',
                });
            if (data['status'] == true){
                $('#register-verify').attr('data-submit-state', 1)
                $('#register-verify').text('عضویت');
            }else {
                $('#register-verify').attr('data-submit-state', 0)
                $('#register-verify').text('ارسال کد تایید');
            }
            },
            error: function (reject) {

            }
        });
    }


    $('.register-phone-number').click(function () {
        sendVerificationCodeFP($('#register-phone-number-input').val())
    });
    function sendVerificationCodeFP(phoneNumber) {
        $.ajax({
            type: 'POST',
            url: '{{ route('send.verification.code') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "phoneNumber" :phoneNumber
            },
            success: function (data) {
                if (data['status'] == true){
                    nextPrev(1)
                }else {
                    Swal.fire({
                        icon: 'warning',
                        title: data['result'],
                        confirmButtonText: 'تایید',
                    });
                }
            },
            error: function (reject) {

            }
        });
    }

    $('.check-code').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('check.verification.code') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "code" :$('#check-code-input').val()
            },
            success: function (data) {
                nextPrev(1)
                if (data['status']){
                    nextPrev(1)
                }else {
                    $('.msg-error').html(data['result'])
                }
            },
            error: function (reject) {
                console.log(reject)
            }
        });
    })

    $('.new-pw').click(function (e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('change.password') }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "password" :$('#pw-field').val()
            },
            success: function (data) {
                nextPrev(1)
            },
            error: function (reject) {

            }
        });
    })

</script>
</body>
</html>
