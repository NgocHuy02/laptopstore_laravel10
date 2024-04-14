<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'payment' => 'required'
        ]);

        $cart = session('cart');
        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();
        try {
            $order = new Order([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'payment' => $request->payment,
                'address' => $request->address,
                'phone' => $request->phone
            ]);
            $order->save();

            foreach ($cart as $id => $details) {
                $order->orderDetails()->create([
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
            }

            session()->forget('cart');
            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Order placed successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error placing order: ' . $e->getMessage());
        }
    }


    public function index()
    {
        $orders = Order::with('orderDetails')->orderBy('id', 'DESC')->get();

        return view('orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
