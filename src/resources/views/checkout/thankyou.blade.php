@extends('layouts.default')

@section('title', 'Order Placed')

@section('content')

    <div class="row">

        <div class="jumbotron">

            <h1 class="display-5">Thank you for your Order</h1>

            <p class="lead">Your details are</p>

            <hr class="my-4">

            <div class="row">

                <div class="col-4">

                    <h6>First Name:</h6>
                    {{ $cart->firstname }}

                </div>

                <div class="col-4">

                    <h6>Last Name:</h6>
                    {{ $cart->lastname }}

                </div>

                <div class="col-4">

                    <h6>Email:</h6>
                    {{ $cart->email }}

                </div>

            </div>

            <hr class="my-3">

            @include('partials.checkoutitems')

        </div>

    </div>
@stop