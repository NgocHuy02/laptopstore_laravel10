<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        // if cart is empty then this is the first product
        if (!isset($cart[$id])) {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        } else {
            // if cart not empty then check if this product exist then increment quantity
            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        return view('cart', ['cartItems' => session('cart')]);
    }

    // public function removeFromCart($id)
    // {
    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$id])) {
    //         unset($cart[$id]);
    //         session()->put('cart', $cart);
    //     }

    //     return redirect()->back()->with('success', 'Product removed successfully');
    // }

    // public function updateCart(Request $request, $id)
    // {
    //     $cart = session()->get('cart');
    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity'] = $request->quantity;
    //         session()->put('cart', $cart);
    //     }
    //     return redirect()->back()->with('success', 'Cart updated.');
    // }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return response()->json(['success' => true]);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return response()->json(['success' => true]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
