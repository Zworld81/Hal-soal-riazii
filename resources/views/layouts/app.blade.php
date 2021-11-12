<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/style/main.css') }}">
    <link href="{{ asset('assets/fonts/fontawsome 5/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('assets/teacher/style/main.css') }}">

    <title>@yield('page_title')</title>
</head>
<body>
<div class="container">
    <header>
        <div class="left">
            <div class="dropdown-header">
                <button class="dropbtn ">حساب کاربری<i class="fas fa-user"></i></button>
                <div class="dropdown-content">
                    <a href="#">ویرایش حساب کاربری</a>
                    <a href="#">تغییر رمز عبور</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <img src="{{ asset('assets/img/notification-message-4673.svg') }}" alt="Notifications">
        </div>
        <div class="center">
            <img src="{{ asset('assets/img/frahosh-logo.png') }}" alt="Frahosh/فراهوش">
        </div>
        <div class="right">
            <a href="#" id="btnmodal" class="neon-button">افزایش ستاره</a>
            <div class="tedad-setare"><i class="fas fa-star" style="color:f8d64e"></i>{{ auth()->user()->stars ?? 'ERR' }}</div>
        </div>
    </header>
    @yield('content')
</div>
<div id="modal-kharidd" class="modal-kharid">

    <!-- Modal content -->
    <div class="modal-kharid-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <p class="modal-text-header">دریافت ستاره</p>
        </div>
        <div class="modal-row">
            <div class="modal-left"></div>
            <div class="modal-right"></div>
        </div>

    </div>

</div>
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script src="{{ asset('assets/js/tabs.js') }}"></script>

<script src="{{ asset('assets/teacher/js/tabs.js') }}"></script>
<script>
    @if(Session::has('type'))
        Swal.fire({
            position: 'top-center',
            type: '{{ Session::get('type') }}',
            title: '{{ Session::get('title') }}',
            text: '{{ Session::get('text') }}',
            showConfirmButton: true,
            confirmButtonClass: 'btn btn-primary',
            confirmButtonText: 'متوجه شدم',
            buttonsStyling: false,
        });
    @endif
</script>

@yield('js')
</body>
</html>


