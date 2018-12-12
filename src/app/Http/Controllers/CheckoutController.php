<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CheckoutController extends BaseCartController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        /** @var Cart $cart */
        $cart = Cart::findPending(session(self::CART_KEY, 0));
        if (empty($cart))
            return redirect('/cart');

        return view('checkout.infoform', compact('cart'));
    }

    /**
     * @param Request $request
     * @param Cart $cart
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Cart $cart)
    {
        if ($cart->status != 'N')
        {
            flash()->error("Cart not found")->important();
            return back();
        }

        $validated = $request->validate([
            'firstname' => ['required', 'max:255'],
            'lastname'  => ['required', 'max:255'],
            'email'     => ['required', 'email', 'max:255']
        ]);

        $validated['status'] = 'C';

        $cart->update($validated);

        session()->remove(self::CART_KEY);

        return redirect("/thankyou/" . $cart->id);
    }

    /**
     * @param Cart $cart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function placed(Cart $cart)
    {
        return view('checkout.thankyou', compact('cart'));
    }
}
