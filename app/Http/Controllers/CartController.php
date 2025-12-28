<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function add(Menu $menu)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $item = $cart->items()->where('menu_id', $menu->id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'menu_id' => $menu->id,
                'price' => $menu->price,
                'quantity' => 1
            ]);
        }

        return back()->with('success', 'Added to cart');
    }

    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->with('items.menu')
            ->first();

        return view('restaurants.cart', compact('cart'));
    }

    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();
        return back();
    }
}
