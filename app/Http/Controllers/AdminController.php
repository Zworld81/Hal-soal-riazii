<?php

namespace App\Http\Controllers;

use App\Models\PayToUser;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin');
    }
    public function index()
    {
        $users = User::get();
        return view('admin.userManagement.index')->with(compact('users'));
    }

    public function confirmAnswer()
    {
        $questions = Question::where('status',0)->get();
        return view('admin.confirmAnswer.index')->with(compact('questions'));
    }
    public function approved(Request $request)
    {
        $question = Question::find($request->question);
        $question->update(['status' => 1]);

        HelperController::flash('success', 'سوال مورد نظر تایید شد🙂 ');
        return redirect()->route('confirm.answer');
    }

    public function payment()
    {
        $users = User::where('stars', ">", 0)->get();
        return view('admin.payment.index')->with(compact('users'));
    }

    public function payToUser(Request $request)
    {
        $user = User::find($request->user);
        PayToUser::create([
            'admin_id' => auth()->user()->id,
            'user_id' => $request->user,
            'old_stars' => $user->stars
        ]);
        $user->update([
            'stars' => 0
        ]);
        HelperController::flash('success', 'درخواست با موفقیت اجراشد🙂 ');
        return redirect()->route('payment.index');
    }

    public function payedConfirm()
    {
        $payToUser = PayToUser::get();
        return view('admin.payedConfirm.index')->with(compact('payToUser'));
    }
}
