@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">تنظیمات سطح دسترسی</h4>
                    <p class="card-title-desc">کاربر: {{ $user->name ?? '' }}</p>
                    <form class="needs-validation" novalidate method="POST" action="{{ route('user.management.update') }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}" required>
                        <div class="form-group row mb-0">
                            <label class="col-md-2 col-form-label">انتخاب سطح دسترسی</label>
                            <div class="col-md-10">
                                <select name="role" class="custom-select" required>
                                    @foreach(\Spatie\Permission\Models\Role::get() as $role)
                                        <option value="{{ $role->id ?? '' }}">{{ $role->name ?? '' }}</option>
                                    @endforeach
                                </select>
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
