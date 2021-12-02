<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $questions = Question::where('status',0)->get();
        $users = User::get();
        return view('admin')->with(compact('questions', 'users'));
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
