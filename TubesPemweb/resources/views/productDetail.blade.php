@extends('layouts.layout')

@section('title', 'Product Details')

@section('content')

    <h1>{{ $product->product_name }}</h1>

    @foreach ($productVariants as $variant)
      {{$variant->availableSizes}}
    @endforeach


    <form action="" method="post">
        @csrf

        <label for="selected_color">Select Color</label>
        <br>
        @foreach ($productVariants as $variant)
            @if ($loop->first || $variant->color->color_name != $productVariants[$loop->index - 1]->color->color_name)
                <label>
                    <input type="radio" name="selected_color" value="{{ $variant->color_name }}">
                    {{ $variant->color->color_name }}
                </label>
                <br>
            @endif
        @endforeach

        <div id="size-options" style="display: none;">
            <label for="selected_size">Select Size</label>
            <br>
            @foreach ($productVariants as $variant)
                <div class="size-option" data-color="{{ $variant->color_name }}">
                    @foreach ($variant->availableSizes as $availableSize)
                        <label>
                            <input type="radio" name="selected_size" value="{{ $availableSize->size->size_name }}">
                            {{ $availableSize->size->size_name }}
                        </label>
                        <br>
                    @endforeach
                </div>
            @endforeach
        </div>

        <h3 id="selected-price">Price</h3>

        <label for="qty">Qty</label>
        <input type="number" name="qty" id="qty" min="1" max="10">

        <button type="submit">Submit</button>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('input[name="selected_color"]').change(function() {
                    console.log('Color changed');
                    var selectedColor = $(this).val();
                    console.log('Selected color:', selectedColor);
                    $('.size-option').hide();
                    $('.size-option[data-color="' + selectedColor + '"]').show();
                    $('#size-options').show();
                });
            });
        </script>

    </form>








    <br>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attribute</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</td>
                <td class="px-6 py-3 text-left">{{ $product->description }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</td>
                <td class="px-6 py-3 text-left"></td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</td>
                <td class="px-6 py-3 text-left"></td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</td>
                <td class="px-6 py-3 text-left"></td>
            </tr>
        </tbody>
    </table>




    <h2> Buy Now </h2>
    {{-- <form action="{{ route('product.buy', ['idProduct' => $product->id]) }}" method="POST"> --}}


@endsection
