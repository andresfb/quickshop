<div class="card">

    <div class="card-body">

        {{-- Subtotal --}}
        <div class="row">

            <div class="col-sm-6">

                <h4>Subtotal:</h4>

            </div>

            <div class="col-sm-6 text-right">

                <h4 id="subtotal">${{ number_format($cart->subtotal, 2) }}</h4>

            </div>

        </div>

        <br>

        {{-- Shipping --}}
        <div class="row my-sm-2">

            <div class="col-sm-6">

                <h5>Shipping:</h5>

            </div>

            <div class="col-sm-6 text-right">

                <h5 id="shipping">${{ number_format($cart->shipping, 2) }}</h5>

            </div>

        </div>

        {{-- Sales Tax --}}
        <div class="row my-sm-2">

            <div class="col-sm-6">

                <h5>Sales Tax:</h5>

            </div>

            <div class="col-sm-6 text-right">

                <h5 id="tax">${{ number_format($cart->tax, 2) }}</h5>

            </div>

        </div>

        {{-- Discount --}}
        <div class="row my-sm-2">

            <div class="col-sm-6">

                <h5>Discount:</h5>

            </div>

            <div class="col-sm-6">

                <h5 class="text-right">

                    @if ($cart->discount > 0)
                        <span id="discount" class="text-danger">${{ number_format($cart->discount, 2) }}</span>
                    @else
                        <span id="discount" class="text-danger">$0.00</span>
                    @endif

                </h5>

            </div>

        </div>

        <hr>

        {{-- Total --}}
        <div class="row">

            <div class="col-sm-5 my-sm-2">

                <h3>Total:</h3>

            </div>

            <div class="col-sm-7 my-sm-2 text-right">

                <h3 id="total">${{ number_format($cart->total, 2) }}</h3>

            </div>

        </div>

        <div class="row my-3 py-3 align-items-center justify-content-center">

            <a href="/checkout" class="btn btn-info">
                <i class="fas fa-lock fa-lg text-white mr-4"></i>
                Beging Checkout
            </a>

        </div>

    </div>

</div>
