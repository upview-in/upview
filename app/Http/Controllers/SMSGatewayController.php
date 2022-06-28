<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Support\Facades\Http;

class SMSGatewayController extends Controller
{
    public function sendSMS(array $data)
    {
        $smsLog = new SmsLog();
        $smsLog->sms_data = $data;
        $smsLog->is_sended = false;
        $smsLog->save();

        $gateway_response = Http::asForm()->acceptJson()->post(config('sms.endpoint'), [
            'apikey' => config('sms.api_key'),
            'sender' => '',
            'numbers' => '',
            'message' => '',
            'messagetype' => ''
        ]);

        $smsLog->gateway_response = $gateway_response->body();
        $smsLog->is_sended = true;
        $smsLog->save();
    }
}
