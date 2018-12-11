@extends('layouts.default')

@section('title', 'checkout')

@section('content')

    <div class="row">

        <div class="col-5">

            <h3>Customer Information</h3>

        </div>

        <div class="col-7">

            <h3>Order Details</h3>

        </div>

    </div>

    <div class="row my-4">

        <div class="col-5">

            <div class="card bg-secondary w-100">

            <div class="card-body">

                <form action="/checkout/{{ $cart->id }}" method="POST">

                    @method('PATCH')

                    @csrf

                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input class="form-control" name="firstname" type="text" value="{{ $cart->firstname }}" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" name="lastname" type="text" value="{{ $cart->lastname }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="email" value="{{ $cart->email }}" required>
                    </div>

                    <br>

                    <button class="btn btn-info" type="submit">Place Order</button>

                </form>

            </div>

        </div>

        </div>

        <div class="col-7">

            <div class="card bg-secondary w-100">

                <div class="card-body">

                    @include('partials.checkoutitems')

                </div>

            </div>

        </div>

    </div>

@stop