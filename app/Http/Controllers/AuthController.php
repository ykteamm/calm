<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SmsVerifyRequest;
use App\Models\User;
use App\Services\AuthService;
use App\Services\SmsService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected AuthService $authService;
    protected UserService $userService;
    protected SmsService $smsService;

    public function __construct(
        AuthService $service,
        UserService $userService,
        SmsService $smsService)
    {
        $this->authService = $service;
        $this->userService = $userService;
        $this->smsService = $smsService;
    }

    public function register(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->validated();

        $phone = preg_replace('/[^0-9]/', '', $data['phone']);
        $data['phone'] = $phone;

        $user_exists = User::where('phone', $data['phone'])->first();

        if($user_exists)
        {
            if ($user_exists->sms_verif_code_expires_at == null) {
                User::find($user_exists->id)->delete();
            }

        }

        if ($this->userService->existsByColumn('phone', $phone = $data['phone'])) {
            return back()->with('error', 'Phone already exists');
        }
        $data['password'] = Hash::make($data['password']);
        $data['sms_verif_code_expires_at'] = now()->addHours(10);
        $sms_verif_code = rand(100000, 999999);
        $data['sms_verif_code'] = $sms_verif_code;
        try {
            $this->userService->createWithThrow($data);
            return view('auth.login');

//            $message = "Sizning parol $sms_verif_code";
//            $response = $this->smsService->sendSms("+".$data['phone'], $message);
//            if ($response->ok()) {
//                Session::put('phone', $data['phone']);
//                Session::put('sms_verif_code', $sms_verif_code);
//                return redirect(route('auth.sms-verify-view'));
//            } else {
//                return back()->with('error', json_encode($response->body()));
//            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function login(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();

        $phone = preg_replace('/[^0-9]/', '', $data['phone']);
        $data['phone'] = $phone;

        if ($user = $this->userService->find(['phone' => $data['phone']])) {
            if (Hash::check($data['password'], $user->password)) {
                $this->doneTests($user);
                Auth::login($user);
                if($user->type == UserTypeEnum::ADMIN) {
                    return redirect('/');
                } else if ($user->type == UserTypeEnum::MEDITATOR) {
                    return redirect('/');
                }
            } else {
                return back()->with('error', 'Password incorrect');
            }
        }
        else return back()->with('error', 'Phone incorrect');
    }

    public function logout()
    {
        if(Auth::user()) {
            Auth::logout();
            return redirect('/');
        } else {
            return redirect('auth/login');
        }
    }

    protected function doneTests($user)
    {
        if(($variants = Session::get('variants')) && $user) {
            foreach (explode(',', $variants) as $id) {
                if(!$user->uservariants()->where('variant_id', $id)->exists()) {
                    $user->uservariants()->create([
                        'variant_id' => $id
                    ]);
                }
            }
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function smsVerifyView()
    {
        return view('auth.sms-verify');
    }

    public function forgotPasswordView()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(ForgotPasswordRequest $forgotPasswordRequest)
    {
        $data = $forgotPasswordRequest->validated();
        if ($user = $this->userService->find(['phone' => $data['phone']])) {
            $new_password = rand(100000, 999999);
            $message = "Ok $new_password";
            $response = $this->smsService->sendSms("+998".$data['phone'], $message);
            if ($response->ok()) {
                $user->password = Hash::make($new_password);
                $user->save();
                return redirect('/');
            } else {
                return back()->with('error', json_encode($response->body()));
            }
        } else {
            return back()->with('error', 'User not found with phone');
        }
    }

    public function changePasswordView()
    {
        return view('auth.change-password');
    }

    public function changePassword(ChangePasswordRequest $changePasswordRequest)
    {
        $data = $changePasswordRequest->validated();
        $user = auth()->user();
        if (Hash::check($data['old_password'], $user->password)) {
            $user->password = Hash::make($data['new_password']);
            $user->save();
            return redirect('/');
        } else {
            return back()->with('error', 'Old password incorrect');
        }
    }

    public function smsVerify(SmsVerifyRequest $smsVerifyRequest)
    {
        $data = $smsVerifyRequest->validated();
        $phone = Session::get('phone');
        if ($user = $this->userService->find(['phone' => $phone])) {
            if ($user->sms_verif_code == $data['sms_verif_code']) {
                if (strtotime($user->sms_verif_code_expires_at) < strtotime(now())) {
                    return back()->with('error', 'Verification code is expired');
                } else {
                    $user->sms_verif_code_verified_at = now();
                    $user->save();
                    return redirect(route('auth.login-view'));
                }
            } else {
                return back()->with('error', 'Verification code is incorrect');
            }
        } else return back()->with('error', 'User not found');
    }
}
