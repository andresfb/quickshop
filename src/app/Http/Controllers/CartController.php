<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Product;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends BaseCartController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var Cart $cart */
        $cart = null;
        if (session()->has(self::CART_KEY))
            $cart = Cart::findPending(session(self::CART_KEY));

        return view('cart.view', compact('cart'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Product $product)
    {
        /** @var Product $product */
        if ($product->stock < 1)
        {
            flash()->error("Sorry '{$product->title}' is out of Stock")
                ->important();
            return redirect('/');
        }

        $cartid = session()->has(self::CART_KEY) ? session(self::CART_KEY) : 0;

        /** @var Cart $cart */
        $cart = Cart::findPendingOrNew($cartid);

        session()->put(self::CART_KEY, $cart->id);

        /** @var CartItem $cartitem */
        $cartitem = $cart->cart_items()
            ->firstOrCreate(['product_id' => $product->id]);
        $cartitem->quantity += 1;
        $cartitem->price = $product->price;
        $cartitem->save();

        return redirect('/cart');
    }

    /**
     * @param Cart $cart
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        session()->remove(self::CART_KEY);

        return redirect('/cart');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTotals(int $id)
    {
        if (empty($id))
            return response()->json(['error' => "Cart Id Missing"], 400);

        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart))
            return response()->json(['error' => "Cart not found"], 404);

        return response()->json(
            [
                'subtotal' => number_format($cart->subtotal, 2),
                'shipping' => number_format($cart->shipping, 2),
                'tax'      => number_format($cart->tax, 2),
                'discount' => number_format($cart->discount, 2),
                'total'    => number_format($cart->total, 2),
            ],
            200
        );
    }

    public function notyet()
    {
        abort(404);
    }
}
