@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">کاربران</h4>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>شماره</th>
                            <th>سطح</th>
                            <th>سوال ها</th>
                            <th>پاسخ ها</th>
                            <th>ستاره</th>
                            <th>کد ملی</th>
                            <th>ایمیل</th>
                            <th>شهر</th>
                            <th>تاریخ تولد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name ?? '' }}</td>
                                <td>{{ $user->phone_number ?? '' }}</td>
                                <td>{{  \App\Http\Controllers\HelperController::getCurrentLevel($user->level) ?? 'ERR' }}</td>
                                <td>{{ \App\Models\Question::where('user_id', $user->id)->count() ?? '0' }}</td>
                                <td>{{ \App\Models\Question::where('teacher_id', $user->id)->count() ?? '0' }}</td>
                                <td>{{ $user->stars ?? '' }}</td>
                                <td>{{ $user->natural_code ?? '' }}</td>
                                <td>{{ $user->email ?? '' }}</td>
                                <td>{{ $user->city ?? '' }}</td>
                                <td>{{ $user->birthday ?? '' }}</td>
                                <td>
                                    @can('changeLevelToAdmin')
                                        <a class="btn btn-sm btn-clean btn-icon confirm"
                                           href="{{ route('change.level', ['level' => 0, 'user' => $user->id]) }}"
                                           title="تبدیل به ادمین">
                                            <i class="bx bx-user mr-1" style="color: gray"></i></a>@endcan
                                    @can('changeLevelToTeacher')
                                        <a class="btn btn-sm btn-clean btn-icon confirm"
                                           href="{{ route('change.level', ['level' => 2, 'user' => $user->id]) }}"
                                           title="تبدیل به معلم">
                                            <i class="bx bx-user-voice mr-1" style="color: gray"></i></a>@endcan
                                    @can('changeLevelToUser')
                                        <a class="btn btn-sm btn-clean btn-icon confirm"
                                           href="{{ route('change.level', ['level' => 1, 'user' => $user->id]) }}"
                                           title="تبدیل به کاربر">
                                            <i class="bx bx-male mr-1" style="color: gray"></i></a>@endcan
                                    @can('editPermission')
                                        <a class="btn btn-sm btn-clean btn-icon"
                                           href="{{ route('user.management.edit', ['user' => $user->id]) }}"
                                           title="ویرایش سطح دسترسی">
                                            <i class="bx bx-edit mr-1" style="color: gray"></i></a>@endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <form id="deleteForm" style="display: none" action="" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@endsection

@section('init')
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
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
