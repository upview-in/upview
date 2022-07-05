<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Support\Facades\Http;

class SMSGatewayController extends Controller
{
    public function sendSMS(array $numbers, string $message, string $template)
    {
        foreach ($numbers as $number) {
            $url = config('sms.endpoint') . '/' . config('sms.sender') . '/' . $number . '/' . urlencode($message) . '/TXT?apikey=' . config('sms.api_key') . '&dlttempid=' . config('sms.template_ids.' . $template);

            $smsLog = new SmsLog();
            $smsLog->sms_data = array_merge(['url' => $url], func_get_args());
            $smsLog->is_sended = false;
            $smsLog->save();

            $gateway_response = Http::get($url);

            $smsLog->gateway_response = $gateway_response->body();
            $smsLog->is_sended = true;
            $smsLog->save();
        }
    }
}
