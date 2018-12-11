@foreach($cart->cart_items as $item)

    <div class="row my-4">

        <div class="col-8">

            {{ $item->product->title }}

        </div>

        <div class="col-2">

            {{ $item->quantity }}

        </div>

        <div class="col-2">

            ${{ number_format($item->price * $item->quantity, 2) }}

        </div>

    </div>

@endforeach

<hr class="my-4">

<div class="row">

    <div class="col-6">

        <h5>Subtotal</h5>

    </div>

    <div class="col-6 text-right">

        <h5>${{ number_format($cart->subtotal, 2) }}</h5>

    </div>

</div>

<div class="row">

    <div class="col-6">

        <h5>Shipping</h5>

    </div>

    <div class="col-6 text-right">

        <h5>
            @if ($cart->shipping == 0)
                <span class="text-success">FREE</span>
            @else
                ${{ number_format($cart->shipping, 2) }}
            @endif

        </h5>

    </div>

</div>

<div class="row">

    <div class="col-6">

        <h5>Tax</h5>

    </div>

    <div class="col-6 text-right">

        <h5>${{ number_format($cart->tax, 2) }}</h5>

    </div>

</div>

<div class="row">

    <div class="col-6">

        <h5>Discount</h5>

    </div>

    <div class="col-6 text-right">

        <h5 class="text-danger">${{ number_format($cart->discount, 2) }}</h5>

    </div>

</div>

<br>

<div class="row">

    <div class="col-6">

        <h4>Total</h4>

    </div>

    <div class="col-6 text-right">

        <h4>${{ number_format($cart->total, 2) }}</h4>

    </div>

</div>