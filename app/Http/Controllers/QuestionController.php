<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\QuestionStoreRequest;
use App\Models\Question;
use App\Services\TelegramBot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionStoreRequest $request)
    {
        $data = $request->validated();

//        if (auth()->user()->stars < config('custom.per_question_star')){
//            HelperController::flash('error', 'ستاره کافی برای ارسال سوال وجود ندارد.');
//            return redirect()->back();
//        }


        $file = HelperController::uploadFile($data['file'],'uploads/files');
        $data['file'] = $file;

        if(isset($data['need_support']))
            $data['need_support'] = true;

        $data['user_id'] = auth()->user()->id;

        Auth::user()->decrement('stars', (int)config('custom.per_question_star'));

        $question = Question::create($data);

        try {
            $file = url('uploads/files/'.$question->file);
            $class =\App\Http\Controllers\HelperController::getClass($question->class);
            $date = \Morilog\Jalali\Jalalian::fromDateTime($question->created_at)->format('Y/m/d H:i');
            $msg = "❗️سوال جدید ثبت شد: \n";
            $msg .= "پایه: ". "{$class}" ." \n";
            $msg .= "تاریخ: ". "{$date}" ." \n";
            $msg .= "فایل سوال: " . "<a href='{$file}'>دانلود</a>";
            $msg .= "\n ➖➖➖";
            $telegramBot = new TelegramBot();
            $telegramBot->sendMessageToChannel($msg);
        }catch (\Exception $e){}

        HelperController::flash('success', 'سوال شما با موفقیت ارسال شد.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
