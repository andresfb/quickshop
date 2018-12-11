@extends('layouts.default')

@section('content')
    <h3>Search our Store</h3><br>
    <form action="/search" method="GET" class="">

        <div class="form-group row">

            <div class="col-4 pl-1">
                <input class="form-control" name="title" type="text" value="{{ old('product') }}">
            </div>

            <div class="col-4 pr-1">
                <select class="form-control" name="category">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old("category") == $category->id ? "selected":"") }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="row">
            <button class="btn btn-info my-4" type="submit">Search</button>
            <a href="/" class="btn btn-outline-secondary ml-4 my-4">Reset</a>
        </div>
        
    </form>

    @if (isset($products))
        <h4 class="my-5"><b>{{ $products->count() }} Products Found</b></h4>
        @include('partials.productlist')
    @endif

@stop