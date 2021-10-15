<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $questions = Question::where('user_id', auth()->user()->id)->get();
        return view('index')->with(compact('questions'));
    }
}
