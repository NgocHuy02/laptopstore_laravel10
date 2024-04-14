<?php

namespace App\Services;

use App\Models\OrderDetail;

class OrderService
{
    public function addOrderDetail($request, $orderId)
    {
        $orderDetail = new OrderDetail();

        $orderDetail->product_id = $request->product_id;
        $orderDetail->order_id = $orderId;
        $orderDetail->quantity = $request->quantity;
        $orderDetail->price = $request->price;

        $orderDetail->save();

        return $orderDetail;
    }
}
