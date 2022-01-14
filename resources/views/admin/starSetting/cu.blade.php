@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">تنظیمات ستاره</h4>
                    <p class="card-title-desc"></p>
                    <form class="needs-validation" novalidate method="POST" action="{{ route('starSetting.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="star_price">قیمت خرید هر ستاره</label>
                                    <input name="star_price" value="{{ $starSetting->star_price ?? '' }}" type="number" min="1000" class="form-control" id="star_price" placeholder="" required>
                                    <div class="invalid-feedback">
                                        مقدار وارد شده معتبر نیست
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="default_stars">ستاره پیش فرض</label>
                                    <input name="default_stars" value="{{ $starSetting->default_stars ?? '' }}" type="number" min="0" class="form-control" id="default_stars" placeholder="" required>
                                    <div class="invalid-feedback">
                                        مقدار وارد شده معتبر نیست
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="per_question_star">ستاره ارسال سوال</label>
                                    <input name="per_question_star" value="{{ $starSetting->per_question_star ?? '' }}" type="number" min="0" class="form-control" id="per_question_star" placeholder="" required>
                                    <div class="invalid-feedback">
                                        مقدار وارد شده معتبر نیست
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="per_support_star">ستاره سوال دارای پشتیبانی</label>
                                    <input name="per_support_star" value="{{ $starSetting->per_support_star ?? '' }}" type="number" min="0" class="form-control" id="per_support_star" placeholder="" required>
                                    <div class="invalid-feedback">
                                        مقدار وارد شده معتبر نیست
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="per_answer_star">ستاره حل سوال</label>
                                    <input name="per_answer_star" value="{{ $starSetting->per_answer_star ?? '' }}" type="number" min="0" class="form-control" id="per_answer_star" placeholder="" required>
                                    <div class="invalid-feedback">
                                        مقدار وارد شده معتبر نیست
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="give_gift_star_on_register">ستاره هدیه توسط کد دعوت</label>
                                    <input name="give_gift_star_on_register" value="{{ $starSetting->give_gift_star_on_register ?? '' }}" type="number" min="0" class="form-control" id="give_gift_star_on_register" placeholder="" required>
                                    <div class="invalid-feedback">
                                        مقدار وارد شده معتبر نیست
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">ثبت فرم</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection


@section('my_js')
    <script>
        $(document).ready(function () {

            @if(Session::has('type'))
            Swal.fire({
                position: 'top-center',
                type: '{{ Session::get('type') }}',
                title: '{{ Session::get('title') }}',
                showConfirmButton: false,
                timer: 2500,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
            @endif

            $(document).on('click', 'a.confirm', function (e) {
                e.preventDefault();
                let data = this;
                Swal.fire({
                    title: 'آیا مطمئنید؟',
                    text: "این عمل قابل بازگشت نخواهد بود!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'تایید',
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    cancelButtonText: 'انصراف',
                    buttonsStyling: false,
                }).then(function (result) {
                    if (result.value) {
                        let url = $(data).attr('href')

                        if ($(data).hasClass('dl')) {
                            $("#deleteForm").attr('action', url).submit();
                        } else {
                            window.location.href = url;
                        }

                    }
                });
            });
        });
    </script>
@endsection
