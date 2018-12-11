<div class="row itemcard">

    <div class="card bg-secondary mb-3 w-100">

        <div class="card-body">

            <div class="row">

                <div class="col-sm-2">

                    <div class="media">

                        <a href="/products/{{ $item->product_id }}">
                            <img src="https://picsum.photos/200/?image={{ rand(0, 1084) }}"
                                 class="img-thumbnail" alt="{{ $item->product->title }}">
                        </a>

                    </div>

                </div>

                <div class="col-sm-5">

                    <a href="/products/{{ $item->product_id }}">{{ $item->product->title }}</a>

                    <br>

                    <p>
                        <small>
                            {!! nl2br(str_limit($item->product->description, $limit = 300, $end = '...')) !!}
                        </small>
                    </p>

                </div>

                <div class="col-sm-2 text-center">

                    <form class="form-inline justify-content-center" action="/api/cartitem" method="PATCH">

                        <input type="hidden" name="cart_id" value="{{ $item->cart_id }}">

                        <input type="hidden" name="cartitem_id" value="{{ $item->id }}">

                        <input class="form-control form-control-sm col-sm-7 text-center updateipnt"
                               type="text" name="quantity" value="{{ $item->quantity }}">

                        <button class="btn btn-sm btn-link d-none updatebtn"><small>Update</small></button>

                    </form>

                </div>

                <div class="col-sm-3 text-right">

                    <h5>
                        <span id="unitprice-{{ $item->id }}">
                            @if ($item->product->price > $item->price)
                                <span class="text-muted"><del>${{ number_format($item->product->price, 2) }}</del></span><br>
                            @endif
                            ${{ number_format($item->price, 2) }}
                        </span>
                    </h5>

                </div>

            </div>

            <div class="row my-4 h-75">

                <div class="my-auto text-right">

                    <form action="/cartitem/{{ $item->id }}" method="POST">

                        @method('DELETE')

                        @csrf

                        <button class="btn btn-link" type="submit">
                            <i class="far fa-lg fa-trash-alt"></i>
                            <small class="mx-1">Remove</small>
                        </button>

                    </form>

                </div>

            </div>

            <div class="row my-1">&nbsp;</div>

        </div>

        <div class="card-footer">

            <div class="row">

                <div class="col-sm-8 text-right">
                    <h5 class="my-1">Item Total:</h5>
                </div>

                <div class="col-sm-4 text-right">

                    <h5 class="my-1">
                        <span id="extprice-{{ $item->id }}">
                            ${{ number_format(($item->price * $item->quantity), 2) }}
                        </span>
                    </h5>

                </div>

            </div>

        </div>

    </div>

</div>
