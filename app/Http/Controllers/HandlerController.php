<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function promptToTeacher(Request $request)
    {
        User::find($request->id)->update([
            'level' => 2
        ]);
    }
}
