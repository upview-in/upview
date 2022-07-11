<?php

namespace App\Jobs;

use App\Http\Controllers\EmailGatewayController;
use App\Http\Controllers\SMSGatewayController;
use App\Models\User;
use App\Models\UserOrder;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class InvalidateExpiredActiveOrders implements ShouldQueue
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
        $expired_active_orders = UserOrder::with(['plan', 'user'])->where('status', 1)->where('expired_at', '<', Carbon::now())->get();
        Log::alert('Invalidate Expired Active Orders | ' . json_encode($expired_active_orders, JSON_PRETTY_PRINT));

        foreach ($expired_active_orders as $order) {
            if (Carbon::now()->gte($order->expired_at ?? Carbon::now()->subDay())) {
                $role_ids = User::find($order->user->_id)->roles()->pluck('_id')->toArray();

                $order->status = 4;
                $order->save();

                User::find($order->user->_id)->roles()->sync(array_diff($role_ids, [$order->plan->id]));

                if (!empty($order->user->mobile_number) && !empty($order->user->name)) {
                    (new SMSGatewayController)->sendSMS([$order->user->mobile_number], 'Hello, ' . $order->user->name . ". Your subscription to UPVIEW has expired. Don't worry, you can renew the subscription and continue to enjoy our subscription.", 'plan_expired');
                    (new EmailGatewayController)->sendMailWithDefault($order->user->email, ['user_name' => $order->user->name], 'plan_expired');
                }
            }
        }
    }
}
