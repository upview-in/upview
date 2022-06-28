<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;

class EmailGatewayController extends Controller
{
    public function sendEmail(array $data)
    {
        $emailLog = new EmailLog();
        $emailLog->email_data = $data;
        $emailLog->is_sended = false;
        $emailLog->save();

        $gateway_response = Http::asForm()->acceptJson()->post(config('email.endpoint'), [
            'apikey' => config('email.api_key'),
            'sender' => '',
            'numbers' => '',
            'message' => '',
            'messagetype' => ''
        ]);

        $emailLog->gateway_response = $gateway_response->body();
        $emailLog->is_sended = true;
        $emailLog->save();
    }
}
