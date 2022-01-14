@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('accessLevel.create') }}" class="btn btn-primary mr-1 mb-1">
                        <i class="mdi mdi-plus"></i>
                        <span class="align-middle ml-25">افزودن</span>
                    </a>
                    <h4 class="card-title">سطح دسترسی</h4>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($roles as $key=>$role)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $role->name ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon"
                                       href="{{ route('accessLevel.edit', ['accessLevel' => $role->id]) }}" title="ویرایش">
                                        <i class="bx bx-edit mr-1" style="color: gray"></i></a>
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
    <script src="assets/js/pages/datatables.init.js"></script>
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
