@extends('layouts.admin.app')

@section('title', 'حل سوالات ریاضی - فراهوش')
@section('css')
    <style>
    .fa-check-class{
        color: rgb(93, 211, 46);
        }
    .fa-check-class:hover{
          text-shadow: 3px 3px 20px rgb(0, 255, 0),
          -2px 1px 30px rgb(1, 255, 1);
          transition: all .2s ease-in-out;
          transform: scale(1.3);
      }
      .recive-main{
        padding-top: 60px;
      }
      .send-main{
        padding-top: 60px;
      }
    </style>
@endsection
@section('subHeader')
    <div class="right">
        <a href="#" id="btnmodal" class="neon-button">Security Room</a>
        <div class="tedad-setare"><i class="fas fa-star" style="color:f8d64e"></i>{{ auth()->user()->stars ?? 'ERR' }}</div>
    </div>
@endsection

@section('content')
{{--
    <div class="tabs-dasti">
        <button class="tablink" onclick="openPage('recive', this, '#3d7bfa')">اطلاعات کاربران</button>
        <button class="tablink" onclick="openPage('send', this, '#3d7bfa')" id="defaultOpen">تایید سوال</button>

        <div id="recive" class="tabcontent">
            <div class="recive-main">
                <table class="recive-table">
                    <thead>
                    <tr ALIGN="CENTER">
                        <th>#</th>
                        <th>نام</th>
                        <th>شماره تلفن</th>
                        <th>نقش</th>
                        <th>ارسال سوال</th>
                        <th>ارسال جواب</th>
                        <th>استاد شود ؟</th>
--}}{{--                        <th>دانلود</th>--}}{{--
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $key=>$user)
                        <tr ALIGN="CENTER">
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name ?? 'ERR' }}</td>
                            <td>{{ $user->phone_number ?? 'ERR' }}</td>
                            <td>{{  \App\Http\Controllers\HelperController::getCurrentLevel($user->level) ?? 'ERR' }}</td>
                            <td>{{ \App\Models\Question::where('user_id', $user->id)->count() ?? '0' }}</td>
                            <td>{{ \App\Models\Question::where('teacher_id', $user->id)->count() ?? '0' }}</td>
                            <td><i class="fa fa-check fa-check-class changetoteacher" data-user-id="{{ $user->id ?? 'ERR' }}" aria-hidden="true"></i></td>
--}}{{--                            <td><a href=""><i class="fa fa-download" aria-hidden="true"></i></a></td>--}}{{--
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div id="send" class="tabcontent">
            <div class="send-main">
            <table class="recive-table">
                    <thead>
                    <tr ALIGN="CENTER">
                        <th>#</th>
                        <th>تاریخ</th>
                        <th>وضعیت</th>
                        <th>پایه</th>
                        <th>دانلود</th>
                        <th>انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($questions as $key=>$question)
                        <tr ALIGN="CENTER">
                            <td>{{ ++$key }}</td>
                            <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($question->created_at)->format('Y/m/d') ?? 'ERR' }}</td>
                            <td>{!! \App\Http\Controllers\HelperController::getCurrentStatus($question->status) ?? 'ERR' !!}</td>
                            <td>{{ \App\Http\Controllers\HelperController::getClass($question->class) ?? 'ERR' }}</td>
                            <td><a href="{{ url($question->file ?? "") }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                            <td><i class="fa fa-check fa-check-class apply-soal" data-question-id="{{ $question->id ?? 'ERR' }}" aria-hidden="true"></i></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    --}}

<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-sm font-size-20 mr-3">
                                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                                <i class="mdi mdi-tag-plus-outline"></i>
                                            </span>
                    </div>
                    <div class="media-body">
                        <div class="font-size-16 mt-2">سفارشات جدید</div>
                    </div>
                </div>
                <h4 class="mt-3 mb-0 primary-font">1,368</h4>
                <div class="row mb-n1">
                    <div class="col-7">
                        <p class="mb-0"><span class="text-success mr-2"> 0.28% <i class="mdi mdi-arrow-up"></i> </span></p>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="avatar-sm font-size-20 mr-3">
                                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                                <i class="mdi mdi-account-multiple-outline"></i>
                                            </span>
                    </div>
                    <div class="media-body">
                        <div class="font-size-16 mt-2">کاربران جدید</div>

                    </div>
                </div>
                <h4 class="mt-3 mb-0 primary-font">2,456</h4>
                <div class="row mb-n1">
                    <div class="col-7">
                        <p class="mb-0"><span class="text-success mr-2"> 0.16% <i class="mdi mdi-arrow-up"></i> </span></p>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">گزارش فروش ها</h4>

                <div id="line-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">درآمد</h4>

                <div id="column-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">تجزیه و تحلیل فروش ها</h4>

                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div id="donut-chart" class="apex-charts"></div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="py-3">
                                        <p class="mb-0 text-truncate"><i class="mdi mdi-circle text-primary mr-1"></i> آنلاین</p>
                                        <h5 class="primary-font">2,652</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-3">
                                        <p class="mb-0 text-truncate"><i class="mdi mdi-circle text-success mr-1"></i> آفلاین</p>
                                        <h5 class="primary-font">2,284</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-3">
                                        <p class="mb-0 text-truncate"><i class="mdi mdi-circle text-warning mr-1"></i> بازاریابی</p>
                                        <h5 class="primary-font">1,753</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">فروش ماهانه</h4>

                <div id="scatter-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="text-white-50">
                    <h5 class="text-white">2400+ کاربر جدید</h5>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و</p>
                    <div>
                        <a href="#" class="btn btn-outline-success btn-sm">مشاهده بیشتر</a>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-8">
                        <div class="mt-3">
                            <img src="assets/images/widget-img.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3 pb-1">نمای کلی</h4>

                <div>
                    <div class="pb-3 border-bottom">
                        <div class="row align-items-center my-n1">
                            <div class="col-8">
                                <p class="mb-0">بازدیدکنندگان جدید</p>
                                <h4 class="mb-0 primary-font">3,524</h4>
                            </div>
                            <div class="col-4">
                                <div class="text-right">
                                    <div>
                                        2.06 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <div class="progress-bar" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 border-bottom">
                        <div class="row align-items-center my-n1">
                            <div class="col-8">
                                <p class="mb-0">مشاهده محصول</p>
                                <h4 class="mb-0 primary-font">2,465</h4>
                            </div>
                            <div class="col-4">
                                <div class="text-right">
                                    <div>
                                        0.37 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="row align-items-center my-n1">
                            <div class="col-8">
                                <p class="mb-0">درآمد</p>
                                <h4 class="mb-0 primary-font">4,653</h4>
                            </div>
                            <div class="col-4">
                                <div class="text-right">
                                    <div>
                                        2.18 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                    </div>
                                    <div class="progress progress-sm mt-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">نقد و بررسی ها</h4>
                <div class="mb-4">
                    <h5 class="mt-n2 primary-font"><span class="text-primary">500</span>+ مشتری راضی</h5>
                </div>
                <div class="mb-3">
                    <i class="fas fa-quote-right h4 text-primary"></i>
                </div>
                <div id="reviewExampleControls" class="carousel slide review-carousel" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از</p>
                                <div class="media mt-4 pt-1">
                                    <div class="avatar-sm mr-3">
                                                            <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                    ج
                                                                </span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-size-16 mt-n2 mb-0 primary-font">استیو جابز</h5>
                                        <p class="mb-2">بنیان گذار شرکت اپل</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از</p>
                                <div class="media mt-4 pt-1">
                                    <div class="avatar-sm mr-3">
                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-size-16 mt-n2 mb-0 primary-font">تونی استارک</h5>
                                        <p class="mb-2">طراح وب</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از</p>
                                <div class="media mt-4 pt-1">
                                    <div class="avatar-sm mr-3">
                                                            <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                    س
                                                                </span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-size-16 mt-n2 mb-0 primary-font">بیل گیتس</h5>
                                        <p class="mb-2">رئیس مایکروسافت</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#reviewExampleControls" role="button" data-slide="prev">
                        <i class="mdi mdi-chevron-right carousel-control-icon"></i>
                    </a>
                    <a class="carousel-control-next" href="#reviewExampleControls" role="button" data-slide="next">
                        <i class="mdi mdi-chevron-left carousel-control-icon"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">درآمد بر اساس منطقه</h4>

                <div class="row">
                    <div class="col-sm-6">
                        <div id="usa-vectormap" style="height: 230px"></div>
                    </div>

                    <div class="col-sm-5 ml-auto">
                        <div class="mt-4 mt-sm-0">
                            <p>در آمد ماه اخیر</p>

                            <div class="media py-3">
                                <div class="media-body">
                                    <p class="mb-1">تهران</p>
                                    <h5 class="mb-0 primary-font">2,256 تومان</h5>
                                </div>
                                <div>
                                    2.52 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                </div>
                            </div>
                            <div class="media py-3 border-top">
                                <div class="media-body">
                                    <p class="mb-1">تبریز</p>
                                    <h5 class="mb-0 primary-font">1,853 تومان</h5>
                                </div>
                                <div>
                                    1.26 % <i class="mdi mdi-arrow-up text-success ml-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">صندوق ورودی</h4>

                <ul class="inbox-wid list-unstyled">
                    <li class="inbox-list-item">
                        <a href="#">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="font-size-16 mb-0 mt-n1 primary-font">پائول</h5>
                                    <p class="text-truncate mb-0">لورم ایپسوم متن ساختگی با</p>
                                </div>
                                <div class="font-size-12 ml-2">
                                    05 دقیقه
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="inbox-list-item">
                        <a href="#">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="font-size-16 mb-0 mt-n1 primary-font">ماری</h5>
                                    <p class="text-truncate mb-0">لورم ایپسوم متن ساختگی</p>
                                </div>
                                <div class="font-size-12 ml-2">
                                    12 دقیقه
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="inbox-list-item">
                        <a href="#">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="font-size-16 mb-0 mt-n1 primary-font">سلینا</h5>
                                    <p class="text-truncate mb-0">لورم ایپسوم متن ساختگی</p>
                                </div>
                                <div class="font-size-12 ml-2">
                                    18 دقیقه
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="inbox-list-item">
                        <a href="#">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="font-size-16 mb-0 mt-n1 primary-font">استیو</h5>
                                    <p class="text-truncate mb-0">لورم ایپسوم متن ساختگی با تولید</p>
                                </div>
                                <div class="font-size-12 ml-2">
                                    2 ساعت پیش
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="text-center">
                    <a href="#" class="btn btn-primary btn-sm">بارگذاری بیشتر</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">آخرین تراکنش ها</h4>

                <div class="table-responsive">
                    <table class="table table-centered">
                        <thead>
                        <tr>
                            <th scope="col">تاریخ</th>
                            <th scope="col">شناسه</th>
                            <th scope="col">نام صورتحساب</th>
                            <th scope="col">مقدار</th>
                            <th scope="col" colspan="2">وضعیت پرداخت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1399/01/15</td>
                            <td>
                                <a href="#" class="text-body font-weight-medium">#SK1235</a>
                            </td>
                            <td>تونی استارک</td>
                            <td>125 تومان</td>
                            <td><span class="badge badge-soft-success font-size-12">پرداخت شده</span></td>
                            <td><a href="#" class="btn btn-primary btn-sm">مشاهده</a></td>
                        </tr>
                        <tr>
                            <td>1399/01/16</td>
                            <td>
                                <a href="#" class="text-body font-weight-medium">#SK1236</a>
                            </td>
                            <td>روبرتو کارلوس</td>
                            <td>118 تومان</td>
                            <td><span class="badge badge-soft-danger font-size-12">شارژ شده</span></td>
                            <td><a href="#" class="btn btn-primary btn-sm">مشاهده</a></td>
                        </tr>
                        <tr>
                            <td>1399/01/17</td>
                            <td>
                                <a href="#" class="text-body font-weight-medium">#SK1237</a>
                            </td>
                            <td>استیو راجرز</td>
                            <td>115 تومان</td>
                            <td><span class="badge badge-soft-success font-size-12">پرداخت شده</span></td>
                            <td><a href="#" class="btn btn-primary btn-sm">مشاهده</a></td>
                        </tr>
                        <tr>
                            <td>1399/01/18</td>
                            <td>
                                <a href="#" class="text-body font-weight-medium">#SK1238</a>
                            </td>
                            <td>اولیور کوئین</td>
                            <td>121 تومان</td>
                            <td><span class="badge badge-soft-warning font-size-12">بازپرداخت</span></td>
                            <td><a href="#" class="btn btn-primary btn-sm">مشاهده</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <ul class="pagination pagination-rounded justify-content-center mb-0">
                        <li class="page-item">
                            <a class="page-link" href="#">قبلی</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('init')
    <script src="assets/js/pages/dashboard.init.js"></script>
    <!-- Datatable init js -->
@endsection
@section('modalButton')
    <div id="modal-kharidd" class="modal-kharid">

        <!-- Modal content -->
        <div class="modal-kharid-content">
            <div class="modal-header-handi">
                <span class="close">&times;</span>
                <p class="modal-text-header">دریافت ستاره</p>
            </div>
            <div class="modal-row">
                <div class="modal-left"></div>
                <div class="modal-right"></div>
            </div>

        </div>

    </div>
@endsection
@section('js')
<script>
    let applySoal = document.querySelectorAll('.apply-soal');
    for (var i = 0; i < applySoal.length; i++) {
        applySoal[i].addEventListener('click', function(event) {

            Swal.fire({
                title: 'آیا اطمینان دارید ؟',
                text: "قابل بازگشت نیست",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله, تایید میکنم',
                cancelButtonText: 'بیخیال  شدم',

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('approved.by.admin') }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id" :$(this).attr('data-question-id')
                        },
                        success: function (data) {
                            $(this).parent().parent().hide();
                            const name = document.querySelector(".row2");
                            name.style.display = "block";

                            Swal.fire(data['title'],data['content'],data['status']);

                        },
                        error: function (reject) {
                            Swal.fire(data['title'],reject['content'],rejectdata['status'])
                        }
                    });
                    //$('#recive-table1').parents('div.dataTables_wrapper').first().hide();


                }
            })

        });
    }

let submit1 = document.querySelectorAll('.changetoteacher');
for (var i = 0; i < submit1.length; i++) {
  submit1[i].addEventListener('click', function(event) {
   Swal.fire({
     title: 'آیا اطمینان دارید ؟',
     text: "دستری استاد میدهید به کاربر 'نام' ؟",
     icon: 'question',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'بله , دسترسی استاد میدهم',
     cancelButtonText: 'بیخیال  شدم',


   }).then((result) => {
     if (result.isConfirmed) {
         $.ajax({
             type: 'POST',
             url: '{{ route('prompt.to.teacher') }}',
             data: {
                 "_token": "{{ csrf_token() }}",
                 "id" :$(this).attr('data-user-id')
             },
             success: function (data) {
                 Swal.fire(
                     'حله',
                     '🙂نام" به استاد تبدیل شد"',
                     'success',

                 )
                 //Swal.fire(data['title'],data['content'],data['status']);

             },
             error: function (reject) {
                 //Swal.fire(data['title'],reject['content'],rejectdata['status'])
             }
         });
     }
   })

 });
}
    </script>
    @endsection
