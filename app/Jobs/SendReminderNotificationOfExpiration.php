<?php

namespace App\Jobs;

use App\Http\Controllers\EmailGatewayController;
use App\Http\Controllers\SMSGatewayController;
use App\Models\UserOrder;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendReminderNotificationOfExpiration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $orders = UserOrder::with(['plan', 'user'])->where('status', 1)->where('expired_at', '<', Carbon::now()->addDays(7))->get();
        Log::alert('Send Reminder Notification Of Expiration | ' . json_encode($orders, JSON_PRETTY_PRINT));

        foreach ($orders as $order) {
            if (!empty($order->user->mobile_number) && !empty($order->user->name)) {
                $diff_days = Carbon::now()->diffInDays($order->expired_at);
                (new SMSGatewayController)->sendSMS([$order->user->mobile_number], 'Hello, ' . $order->user->name . '. Your subscription to UPVIEW is expiring in ' . $diff_days . ' days. Visit upview.in and renew to continue enjoying our services.', 'plan_expiring_in');
                (new EmailGatewayController)->sendMailWithDefault($order->user->email, ['user_name' => $order->user->name, 'remaining_days' => $diff_days], 'plan_expiring_in');
            }
        }
    }
}
