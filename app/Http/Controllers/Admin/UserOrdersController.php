<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserOrders\IndexOrderRequest;
use App\Http\Requests\Admin\UserOrders\ViewOrderRequest;
use App\Http\Requests\Admin\UserRoles\DeleteOrderRequest;
use App\Models\UserOrder;

class UserOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  IndexOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexOrderRequest $request)
    {
        $userOrders = UserOrder::search()->paginate(10);

        return view('admin.user-order.index', compact('userOrders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewOrderRequest $request
     * @param  UserOrder  $userOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ViewOrderRequest $request, UserOrder $userOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteOrderRequest $request
     * @param  UserOrder $userOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteOrderRequest $request, UserOrder $userOrder)
    {
        $userOrder->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Order (' . $userOrder->name . ') deleted successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Order (' . $userOrder->name . ') deleted successfully!');
    }
}
