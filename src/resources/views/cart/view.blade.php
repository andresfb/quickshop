@extends('layouts.default')

@section('title', 'My Cart')

@section('content')

    @if (empty($cart) || $cart->cart_items->count() == 0)

        <h3>Your Cart is Empty</h3>

    @else

        <div class="row ml-1" id="ajaxalert">

        </div>

        <div class="row ml-1">

            <div class="col-xl-8">

                <div class="row">

                    <div class="col-8">

                        <h3>My Cart</h3>

                    </div>

                    <div class="col-4">

                        <form action="/cart/{{ $cart->id }}" method="POST">

                            @method("DELETE")

                            @csrf

                            <button type="submit"
                                class="btn btn-sm btn-outline-secondary float-right">
                                Remove All
                            </button>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-sm-4 my-2">

                <a href="/cart/email"><i class="fas fa-envelope"></i> Email</a>
                <a href="/cart/print" class="ml-2"><i class="fas fa-print"></i> Print</a>

            </div>

        </div>  

        <div class="row my-4 ml-1">

            <div id="cartitems" class="col-xl-8">

                @foreach($cart->cart_items as $item)

                    @include('partials.cartitem', ['item' => $item])

                @endforeach

                <div class="row align-items-center justify-content-center">

                    <div class="alert alert-primary alert-important">

                        <span class="text-black-50">Cart ID: {{ $cart->id }}</span>

                    </div>

                </div>

            </div>

            <div class="col-xl-4">

                @include('partials.totals')

            </div>

        </div>

    @endif

@stop

@section('pagejs')

    <script src="{{ asset('/js/mustache.min.js') }}"></script>

    <script>

        let $cartitems = $('#cartitems');

        $cartitems.delegate('.updateipnt', 'input', function () {

            let $form = $(this).closest('form');
            let $button = $form.find('button');
            $button.removeClass('d-none');

        });

        $cartitems.delegate('.updatebtn', 'click', function (e) {
            e.preventDefault();

            $("#success").html('loading...');

            let $alert_template = $('#cart-update-alert').html();
            let $form = $(this).closest('form');
            let $form_data = $form.serialize();


            $form.find('button').addClass('d-none');

            $.ajax({

                type : "PATCH",
                url  : $form.attr('action'),
                data : $form_data,
                error: function(data) {

                    let $info = {
                        alerttype : "alert-danger",
                        message   : "Error: " + data.responseJSON.error
                    };

                    $("#ajaxalert").html(Mustache.render($alert_template, $info));

                },
                success: function(data) {

                    if (data === "empty") {

                        location.reload();
                        return;

                    }

                    if (data === "deleted") {

                        $form.closest('.itemcard').remove();

                    }
                    else {

                        if (data.list_price > data.sale_price) {

                            $("#unitprice-" + data.item_id).html(
                                '<span class="text-muted"><del>$' + data.list_price + '</del></span><br>' + '$' + data.sale_price
                            );

                        }
                        else {

                            $("#unitprice-" + data.item_id).html("$" + data.sale_price);

                        }

                        $("#extprice-"  + data.item_id).html("$" + data.ext_price);

                    }

                    getTotals();

                    let $info = {
                        alerttype : "alert-success",
                        message   : "Cart Updated"
                    };

                    $("#ajaxalert").html(Mustache.render($alert_template, $info));

                }

            });

        });

        function getTotals() {

            @if (!empty($cart))

                let $alert_template = $('#cart-update-alert').html();

                $.ajax({
                    type : "GET",
                    url  : "/api/cart/totals/{{ $cart->id }}",
                    error: function(data) {

                        let $info = {
                            alerttype : "alert-danger",
                            message   : "Error: " + data.responseJSON.error
                        };

                        $("#ajaxalert").html(Mustache.render($alert_template, $info));

                    },
                    success : function (data) {

                        $("#subtotal").html("$" + data.subtotal);
                        $("#shipping").html("$" + data.shipping);
                        $("#tax").html("$" + data.tax);
                        $("#discount").html("$" + data.discount);
                        $("#total").html("$" + data.total);

                    }
                });

            @endif
        }

    </script>

@stop

@section('template')

    <template id="cart-update-alert">

        <div class="alert alert-dismissible @{{ alerttype }}">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>@{{ message }}</strong>

        </div>

    </template>

@stop
