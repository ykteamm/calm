<?php

namespace App\Services;

use App\Services\BaseService;
use Illuminate\Support\Facades\Http;

class SmsService extends BaseService
{
    public function getToken()
    {
        $response = Http::post('notify.eskiz.uz/api/auth/login', [
            'email' => "mubashirov2002@gmail.com",
            'password' => 'PM4g0AWXQxRg0cQ2h4Rmn7Ysoi7IuzyMyJ76GuJa'
        ]);
        return $response['data']['token'];
    }
    
    public function sendSms($phone, $msg)
    {
        return Http::withToken($this->getToken())->post('notify.eskiz.uz/api/message/sms/send', [
            'mobile_phone' => $phone,
            'message' => $msg,
            'from' => '4546',
            'callback_url' => "http://0000.uz/test.php"
        ]);
    }
}
