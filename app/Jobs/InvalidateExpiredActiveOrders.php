<?php

namespace App\Jobs;

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
        $expired_active_orders = UserOrder::with(['plan', 'user'])->where('status', 1)->whereDate('expired_at', '<', Carbon::now())->get();
        Log::alert("Invalidate Expired Active Orders | " . json_encode($expired_active_orders, JSON_PRETTY_PRINT));

        foreach ($expired_active_orders as $order) {
            if (Carbon::now()->gte($order->expired_at ?? Carbon::now()->subDay(1))) {
                $role_ids = $order->user()->roles()->pluck('_id')->toArray();

                $order->status = 4;
                $order->save();
                $order->user()->roles()->sync(array_diff($role_ids, [$order->plan->id]));
            }
        }
    }
}
