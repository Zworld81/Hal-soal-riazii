<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Trez\RayganSms\Facades\RayganSms;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'verification_code' => ['required', 'in:'.Session::get('code')]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data): User
    {
        $us = User::create([
            'name' => $data['full_name'],
            'phone_number' => $data['phone_number'],
            'referral_code' => Str::random(5),
            'referral_code_used' => $data['referral_code_used'] ?? '',
            'password' => Hash::make($data['password']),
        ]);
        if (!empty($data['referral_code_used'])){
            $user = User::where('referral_code', $data['referral_code_used'])->first();
            if (!empty($user)){
                $user->increment('stars', config('custom.give_gift_star_on_register'));
            }
        }
        Session::forget('code');

        return $us;
    }

    /**
     * Show the application registration form.
     *
     * @return View
     */
    public function showRegistrationForm(): View
    {
        return view('auth.auth');
    }

    public function sendVerificationCode(Request $request)
    {
        $code = rand(1000,5000);
        RayganSms::sendAuthCode($request->phoneNumber, 'سلام، کدتایید شما:'.$code, false);
        Session::put('code', $code);
        return response()->json([
            'result' => 'کد تأیید با موفقیت ارسال شد.'
        ]);
    }
}
