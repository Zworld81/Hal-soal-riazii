<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Trez\RayganSms\Facades\RayganSms;

class AuthSmsController extends Controller
{
    public function sendVerificationCode(Request $request)
    {
        $user = User::where('phone_number',$request->phoneNumber)->first();
        if (!empty($request->sMethod)){
            if ($request->sMethod == 'register') {
                if (!empty($user)){
                    return response()->json([
                        'status' => false,
                        'result' => 'این شماره در سیستم وجود دارد.'
                    ]);
                }
            }
            if ($request->sMethod == 'forgot') {
                if (empty($user)){
                    return response()->json([
                        'status' => false,
                        'result' => 'این شماره در سیستم وجود ندارد.'
                    ]);
                }
            }
        }

        if (Session::has('verification') && Session::get('verification')['phoneNumber'] == $request->phoneNumber){
            if (Carbon::now()->timestamp - Session::get('verification')['timestamp'] < 30){
                return response()->json([
                    'status' => false,
                    'result' => 'حداقل 30 ثانیه بین هر ارسال باید صبرکنید.'
                ]);
            }
        }


        $code = rand(1000,5000);
        RayganSms::sendAuthCode($request->phoneNumber, 'سلام، کدتایید شما:'.$code, false);
        Session::put('verification', ['code' => $code, 'timestamp' => Carbon::now()->timestamp, 'phoneNumber' => $request->phoneNumber]);
        return response()->json([
            'status' => true,
            'result' => 'کد تأیید با موفقیت ارسال شد.'
        ]);
    }

    public function checkVerificationCode(Request $request)
    {
        if (Session::has('verification') && Session::get('verification')['code'] == $request->code){
            return response()->json([
                'status' => true,
                'result' => 'جهت تغییر رمز خود اقدام کنید.'
            ]);
        }
        return response()->json([
            'status' => false,
            'result' => 'خطا رمزیکبار مصرف نادرست.'
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = User::where('phone_number', Session::get('verification')['phoneNumber'])->first();
        if (!empty($user)){
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }
        return response()->json([
            'result' => 'رمز عبور تغییر کرد.'
        ]);
    }
}
