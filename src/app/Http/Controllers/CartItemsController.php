<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Validator;

/**
 * Class CartItemsController
 * @package App\Http\Controllers
 */
class CartItemsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update()
    {
        $validator = Validator::make(request()->all(), [
            'cart_id'     => ['required', 'integer', 'min:1'],
            'cartitem_id' => ['required', 'integer', 'min:1'],
            'quantity'    => ['required', 'integer']
        ]);

        if (!$validator->passes())
            return response()->json(['error' => $validator->errors()->all()], 400);

        /** @var Cart $cart */
        $cart = Cart::findPending(request('cart_id'));

        if (empty($cart))
            return response()->json(['error' => "Cart not found"], 404);

        /** @var CartItem $cartitem */
        $cartitem = $cart->cart_items()->find(request('cartitem_id'));

        if (empty($cartitem))
            return response()->json(['error' => "Item not found"], 404);

        if (request('quantity') == 0)
        {
            $cartitem->delete();
            return response()->json(
                $cart->cart_items->count() == 0 ? "empty" : "deleted",
                200
            );
        }

        $cartitem->quantity = request('quantity');
        $cartitem->save();

        return response()->json(
            [
                'item_id'    => $cartitem->id,
                'quantity'   => $cartitem->quantity,
                'list_price' => number_format($cartitem->product->price, 2),
                'sale_price' => number_format($cartitem->price, 2),
                'ext_price'  => number_format($cartitem->price * $cartitem->quantity, 2),
            ],
            200
        );
    }

    /**
     * @param CartItem $cartitem
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(CartItem $cartitem)
    {
        if ($cartitem->cart->status != 'N')
        {
            flash()->error("Cart not found")->important();
            return redirect('/cart');
        }

        $cartitem->delete();

        return redirect('/cart');
    }
}
