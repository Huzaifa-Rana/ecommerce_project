<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all(); // get all products
        return view('shop.index', compact('products'));
    }


    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);

        // Check if product already exists in cart
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);

        // Return a success message
        return back()->with('success', 'Product added to cart successfully!');
    }
}