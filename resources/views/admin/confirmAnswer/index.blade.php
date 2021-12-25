@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">کاربران</h4>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تاریخ</th>
                            <th>وضعیت</th>
                            <th>پایه</th>
                            <th>دانلود سوال</th>
                            <th>دانلود جواب</th>
                            <th>انتخاب</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($questions as $key=>$question)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($question->created_at)->format('Y/m/d') ?? 'ERR' }}</td>
                                <td>{!! \App\Http\Controllers\HelperController::getCurrentStatus($question->status) ?? 'ERR' !!}</td>
                                <td>{{ \App\Http\Controllers\HelperController::getClass($question->class) ?? 'ERR' }}</td>
                                <td><a href="{{ url('uploads/files/'.$question->file ?? "") }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                <td><a href="{{ url('uploads/answer/'.$question->answer->file ?? "") }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon confirm"
                                       href="{{ route('approved.by.admin', ['question' => $question->id]) }}" title="ادمین">
                                        <i class="bx bx-check mr-1" style="color: gray"></i></a>
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
