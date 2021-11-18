@extends('layouts.app')

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
@section('subHeader')
    <div class="right">
        <a href="#" id="btnmodal" class="neon-button">Security Room</a>
        <div class="tedad-setare"><i class="fas fa-star" style="color:f8d64e"></i>{{ auth()->user()->stars ?? 'ERR' }}</div>
    </div>
@endsection

@section('content')
    <div class="tabs">
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
                        <th>دانلود</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                        <tr ALIGN="CENTER">
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td><i class="fa fa-check fa-check-class changetoteacher" data-question-id="{{ $question->id ?? 'ERR' }}" aria-hidden="true"></i></td>
                            <td><a href=""><i class="fa fa-download" aria-hidden="true"></i></a></td>
                        </tr>
                  
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
                        <th>دانلود</th>
                        <th>انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                        <tr ALIGN="CENTER">
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td><a href=""><i class="fa fa-download" aria-hidden="true"></i></a></td>
                            <td><i class="fa fa-check fa-check-class apply-soal" data-question-id="{{ $question->id ?? 'ERR' }}" aria-hidden="true"></i></td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modalButton')
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
@endsection
@section('js')
<script>
let submit = document.querySelectorAll('.apply-soal');
for (var i = 0; i < submit.length; i++) {
  submit[i].addEventListener('click', function(event) {
   Swal.fire({
     title: 'آیا اطمینان دارید ؟',
     text: "سوال را تایید میکنید ؟",
     icon: 'question',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'بله, قابل تایید است',
     cancelButtonText: 'بیخیال  شدم',


   }).then((result) => {
     if (result.isConfirmed) {
       Swal.fire( 
         'حله',
         '🙂سوال لیست شد',
         'success',
         
       )
     }
   })
   
 });
}

let submit1 = document.querySelectorAll('.changetoteacher');
for (var i = 0; i < submit.length; i++) {
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
       Swal.fire( 
         'حله',
         '🙂نام" به استاد تبدیل شد"',
         'success',
         
       )
     }
   })
   
 });
}
    </script>
    @endsection