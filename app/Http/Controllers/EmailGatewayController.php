<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailGatewayController extends Controller
{
    public function sendMailWithDefault(string $to, array $data, string $template, bool $from_api = false)
    {
        $this->sendEmail(config('email.display_name'), config('email.from_email_address'), [$to], $data, $template, $from_api);
    }

    public function sendEmail(string $display_name, string $from_email_address, array $to_email_addresses, array $data, string $template, bool $from_api = false)
    {
        if ($from_api) {
            $this->sendMailAPI($display_name, $from_email_address, $to_email_addresses, $data, $template);
            return;
        }

        $this->sendMailSMTP($display_name, $from_email_address, $to_email_addresses, $data, $template);
    }

    private function sendMailSMTP(string $display_name, string $from_email_address, array $to_email_addresses, array $data, string $template)
    {
        $template = config('email.templates.' . $template);
        if (empty($template)) {
            Log::info('Given template not found!');

            return;
        }

        Mail::send($template['template'], $data, function ($message) use ($template, $display_name, $from_email_address, $to_email_addresses) {
            $message->to($to_email_addresses);
            $message->from($from_email_address, $display_name);
            $message->subject($template['subject']);
        });
    }

    private function sendMailAPI(string $display_name, string $from_email_address, array $to_email_addresses, array $data, string $template)
    {
        $template = config('email.templates.' . $template);
        if (empty($template)) {
            Log::info('Given ' . $template . ' Template not found!');

            return;
        }

        foreach ($to_email_addresses as $to_email_address) {
            $url = config('email.endpoint') . '/single';
            $postData = [
                'recipient' => [
                    'to' => $to_email_address,
                ],
                'senderFrom' => [
                    'email' => $from_email_address,
                    'displayName' => $display_name,
                ],
                'replyTo' => [
                    'email' => $from_email_address,
                    'displayName' => $display_name,
                ],
                'subject' => $template['subject'],
                'emailBody' => view($template['template'])->with('data', $data)->render(),
                // 'webHookUrl' => 'string'
                // TODO: add code to accept hook response
            ];

            $emailLog = new EmailLog();
            $emailLog->email_data = array_merge(['url' => $url], func_get_args());
            $emailLog->is_sended = false;
            $emailLog->save();

            $gateway_response = Http::withHeaders([
                'Authorization' => config('email.api_key'),
            ])->post($url, $postData);

            $emailLog->gateway_response = $gateway_response->body();
            $emailLog->is_sended = true;
            $emailLog->save();
        }
    }

    private function getTemplate(string $template, array $data): string
    {
        return 'test';
    }
}
