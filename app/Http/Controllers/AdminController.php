<?php

namespace App\Http\Controllers;

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
        $question = Question::find($request->id);
        $question->update(['status' => 3]);

        return response()->json([
            'title' => 'حله',
            'content' => '🙂 سوال مورد نظر تایید شد ',
            'status' => 'success'
        ]);
    }
}
