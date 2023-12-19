@extends('layouts.layout')

@section('title', 'Product Details')

@section('content')

    <h1 class="">{{ $product->product_name }}</h1>


    <form action="{{ route('product.order', ['idProduct' => $product->id]) }}" method="POST">

        <h2> Buy Now </h2>
        @csrf

        <label for="selected_color">Select Color</label>
        <br>

        <div class="flex">
            @foreach ($productVariants as $variant)
                @if ($loop->first || $variant->color->color_name != $productVariants[$loop->index - 1]->color->color_name)
                    <label class="mr-2">
                        <input type="radio" name="selected_color" value="{{ $variant->color_id }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        {{ $variant->color->color_name }}
                    </label>
                @endif
            @endforeach
        </div>

        <label for="selected_size">Available Size:</label>

        <div class="flex" id="sizes-container">
            @foreach ($productVariants as $variant)
                @if ($loop->first || $variant->color->color_name != $productVariants[$loop->index - 1]->color->color_name)
                    @foreach ($variant->availableSizes as $availableSize)
                        <div class="ml-4 mt-2 size-container" data-color-id="{{ $variant->color_id }}"
                            style="display: none;">
                            <input type="radio" name="size_name" value="{{ $availableSize->size->size_name }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" required>
                            {{ $availableSize->size->size_name }}
                            {{--   {{ $availableSize->price }}
                            {{ $availableSize->stock }}  --}}{{-- Tampilin data ini Pada tabel --}}
                            <br>
                            <!-- Hidden input for price -->
                            <input type="hidden" name="price" value="{{ $availableSize->price }}">
                            <!-- Hidden input for stock -->
                            <input type="hidden" name="stock" value="{{ $availableSize->stock }}">
                            <br>



                        </div>
                    @endforeach
                @endif
            @endforeach

        </div>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('input[name="selected_color"]').change(function() {
                    var selectedColorId = $(this).val();
                    $('.size-container').hide();
                    $('.size-container[data-color-id="' + selectedColorId + '"]').show();
                });
            });
        </script>


        <script>
            console.log(priceSize);
        </script>


        <label for="qty">Qty</label>
        <input type="number" name="qty" id="qty" min="1" required> {{-- max = stock --}}
        <br>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
            type="submit">Order</button>


    </form>








    <br>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <strong>Product Details</strong>
        </thead>
        <tbody>

            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</td>
                <td class="px-6 py-3 text-left">{{ $product->description }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</td>
                <td class="px-6 py-3 text-left"></td> {{-- Tampilin data price disini --}}
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





    {{-- <form action="{{ route('product.buy', ['idProduct' => $product->id]) }}" method="POST"> --}}


@endsection
