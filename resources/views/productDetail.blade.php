<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Vasco</title>
</head>

<body>

    @if (Session::get('email') != null)
        <span class="block sm:inline">
            <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Welcome:
                <span>{{ Session::get('username') }}</span>
            </p>
        </span>

        <a href="{{ route('logout') }}">
            <p>Logout</p>
        </a>
    @else
        <a href="{{ route('register') }}">
            <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest
                product</p>
        </a>
    @endif
    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
    </div>
    <hr>
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
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
                        @foreach ($variant->productFiles as $productFile)
                            @if ($productFile->product_variant_id == $variant->id)
                                {{--  @dd($productFile->url) --}}
                                <img src="{{ asset($productFile->url) }}" class="w-20 h-20"
                                    alt="{{ $productFile->file_name }}">
                            @else
                            @endif
                        @endforeach
                    </label>
                @endif
            @endforeach
        </div>




        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function() {
                // Hide the "Available Size" label initially
                $('label[for="selected_size"]').hide();

                // Hide the "Qty" input initially
                $('label[for="qty"]').hide();
                $('#qty').hide();

                // Hide the "Order" button initially
                $('button.order-button').hide();

                $('input[name="selected_color"]').change(function() {
                    var selectedColorId = $(this).val();
                    $('.size-container').hide();
                    $('.size-container[data-color-id="' + selectedColorId + '"]').show();

                    // Hide the label, "Qty" input, and "Order" button when changing color
                    $('label[for="selected_size"]').hide();
                    $('label[for="qty"]').hide();
                    $('#qty').hide();
                    $('button.order-button').hide();
                });

                // Add change event for size selection
                $('input[name="size_name"]').change(function() {
                    // Show the "Available Size" label when a size is selected
                    $('label[for="selected_size"]').show();

                    // Show the "Qty" input when both color and size are selected
                    if ($('input[name="selected_color"]:checked').length > 0 && $(
                            'input[name="size_name"]:checked').length > 0) {
                        // Fetch the stock value from the currently selected size
                        var selectedStock = $('input[name="size_name"]:checked').closest('.size-container')
                            .find('input[name="stock"]').val();

                        // Update the max attribute of the "Qty" input
                        $('#qty').attr('max', selectedStock);

                        $('label[for="qty"]').show();
                        $('#qty').show();
                        $('button.order-button').show();
                    } else {
                        // Hide the "Qty" input and "Order" button if size is not selected
                        $('label[for="qty"]').hide();
                        $('#qty').hide();
                        $('button.order-button').hide();
                    }
                });
            });
        </script>

        <label for="selected_size">Available Size:</label>

        <div class="flex" id="sizes-container">
            @foreach ($productVariants as $variant)
                @if ($loop->first || $variant->color->color_name != $productVariants[$loop->index - 1]->color->color_name)
                    @foreach ($variant->availableSizes as $availableSize)
                        <div class="ml-4 mt-2 size-container" data-color-id="{{ $variant->color_id }}"
                            style="display: none;">
                            <input type="radio" name="size_name"
                                value=" {{ $availableSize->size->size_name }},{{ $availableSize->price }},{{ $availableSize->stock }},{{ $availableSize->product_variant_id }}, {{ $availableSize->id }},"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" required>

                            {{ $availableSize->size->size_name }}
                            {{ $availableSize->price }}
                            {{ $availableSize->stock }}
                            {{-- Tampilin data ini Pada tabel --}}
                            <br>

                            {{--      <!-- Hidden input -->
                            <input type="hidden" name="price" value="{{ $availableSize->price }}">
                            {{ $availableSize->price }}
                            <input type="hidden" name="stock" value="{{ $availableSize->stock }}"> --}}


                            <br>



                        </div>
                    @endforeach
                @endif
            @endforeach

        </div>







        <label for="qty">Qty</label>
        <input type="number" name="qty" id="qty" min="1" required>

        `
        <br>





        @if (Session::get('email') == null)
            <p> Login to Get Product </p>
        @else
            <button type="submit"
                class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4 order-button">
                Order
            </button>
        @endif










    </form>

    <br>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <strong>Product Details</strong>
        </thead>
        <tbody>

            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description
                </td>
                <td class="px-6 py-3 text-left">{{ $product->description }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</td>
                <td class="px-6 py-3 text-left">Tampilin data price disini pk js</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</td>
                <td class="px-6 py-3 text-left"> Tampilin data stock disini</td>
            </tr>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</td>
                <td class="px-6 py-3 text-left"> - </td>
            </tr>
        </tbody>
    </table>





    {{-- <form action="{{ route('product.buy', ['idProduct' => $product->id]) }}" method="POST"> --}}

</body>

</html>
