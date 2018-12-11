@if (isset($products))
    <table class="table table-hover my-5">
        <thead>
        <tr>
            <td><h5>Category</h5></td>
            <td><h5>Item Code</h5></td>
            <td><h5>Title</h5></td>
            <td><h5>Price</h5></td>
            <td>&nbsp;</td>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->item_code }}</td>
                    <td>
                        {{ $product->title }}
                        @if (!empty($product->description))
                            <br>
                            <small>
                                {!! nl2br(str_limit($product->description, $limit = 150, $end = '...')) !!}
                            </small>
                        @endif
                    </td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>
                        @if ($product->stock > 0)
                            <a href="/cart/add/{{ $product->id }}" class="btn btn-sm btn-primary" title="Add to Cart"><i class="fas fa-cart-arrow-down"></i></a>
                        @else
                            <button class="btn btn-sm btn-secondary disabled" title="Out of Stock"><i class="fas fa-ban"></i></button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif