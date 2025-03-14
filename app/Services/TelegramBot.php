<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class TelegramBot
{
    private $token;
    private $channelId;

    public function __construct()
    {
        $this->token = config('telegrambot.token');
        $this->channelId = config('telegrambot.channelId');
    }

    public function sendMessageToChannel($message)
    {
        $res = urlencode('https://api.telegram.org/bot'. $this->token .'/sendMessage?chat_id='. $this->channelId .'&text='.$message ."&parse_mode=HTML");
        return Http::get('https://ma-a.ir/bot/?url='. $res)->json();
    }
}
