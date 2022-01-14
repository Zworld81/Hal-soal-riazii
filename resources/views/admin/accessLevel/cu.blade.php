@extends('layouts.admin.app')

@section('content')
    <form  class="needs-validation" novalidate method="POST" action="@if(!empty($role)) {{ route('accessLevel.update', ['accessLevel' => request()->route('accessLevel')]) }} @else {{ route('accessLevel.store') }} @endif">
        @csrf
        @if(!empty($role))
            @method('PATCH')
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">نام</label>
                    <input name="name" value="{{ $role->name ?? '' }}" type="text" class="form-control" id="name" placeholder="" required>
                    <div class="invalid-feedback">
                        مقدار وارد شده معتبر نیست
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mt-4 mt-lg-0">
                    <h5 class="font-size-14 mb-4 primary-font">انتخاب سطح دسترسی</h5>

                    @foreach($listOfPermission as $key => $lof)
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" name="{{ $lof['location'] }}" class="custom-control-input"
                                   id="{{ $key }}" @if(isset($rpNames)) @if(in_array($lof['location'], $rpNames)) {{ ' checked ' }} @endif @endif>
                            <label class="custom-control-label" for="{{ $key }}">{{ $lof['name'] }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-primary" type="submit">ثبت فرم</button>
        </div>
    </form>
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
