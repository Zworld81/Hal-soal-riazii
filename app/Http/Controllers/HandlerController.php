<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Trez\RayganSms\Facades\RayganSms;

class HandlerController extends Controller
{
    public function accept(Request $request) {
        $question = Question::findOrFail($request->id);
        $user = Auth::user();
        if (!empty(Teacher::where('teacher_id', $user->id)->first())){
            return response()->json([
               'title' => 'خطا',
               'content' => 'شما باید سوال قبلی را حل کنید',
               'status' => 'error'
            ]);
        }

        Teacher::create([
            'question_id' => $question->id,
            'teacher_id' => $user->id
        ]);


        $question->update([
            'teacher_id' => $user->id,
            'status' => 4
        ]);

        $user->update([
            'have_active_question' => true
        ]);

        return response()->json([
            'title' => 'حله',
            'content' => '🙂 سوال مورد نظر انتخاب شد ',
            'status' => 'success'
        ]);

    }

    public function changeLevel(Request $request)
    {
        User::find($request->user)->update([
            'level' => $request->level
        ]);
        HelperController::flash('success', 'عملیات با موفقیت انجام شد.');
        return redirect()->back();
    }

    public function getReferralCode(): \Illuminate\Http\JsonResponse
    {
        $user = \auth()->user();
        if (!empty($user)){
            RayganSms::sendMessage($user->phone_number,"کد دعوت شما:\n ". $user->referral_code);
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'error'
        ]);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        Auth::user()->update($data);
        HelperController::flash('success', 'موفقیت آمیز', 'اطلاعات کاربری شما با موفقیت تغییر کرد');
        return redirect()->back();
    }
}
