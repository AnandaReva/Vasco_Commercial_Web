<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Vasco</title>
</head>

<body>

    {{-- ----  headbar and back button ------ --}}
    @if (session('status') == 'berhasil')
        <div class="alert alert-success text-center" role="alert">
            <h4>{{ session('message') }}</h4>
        </div>
    @endif

    @if (Session::get('email') != null)
        <p class="w-full text-center py-2 bg-gray-900 text-white">
            <span class="flex ml-6 items-center justify-center sm:justify-between">
                <span id="welcoming" class=""><span>Welcome, <span
                            class="font-semibold">{{ Session::get('username') }}</span></span></span>

                <span class="flex items-center sm:justify-end font-semibold mr-6 underline" id="logout">
                    <a class="" href="{{ route('logout') }}"> logout </a>
                </span>

            </span>
        </p>
    @else
        <a href="{{ route('register') }}">
            <p class="w-full mx-auto text-center py-2 bg-gray-900 underline text-white">Log in here to get the latest
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
    {{-- ------ End of headbar  -------- --}}

    <form action="{{ route('product.order', ['idProduct' => $product->id]) }}" method="POST">

        <main class="flex grid grid-cols-3 gap-4">

            {{-- gambar besar dari cataloge --}}
            <section id="productPhotos" class="col-span-2 ">
                <div>
                    @foreach ($productVariants as $variant)
                        @foreach ($variant->productFiles as $productFile)
                            @if ($productFile->product_variant_id == $variant->id)
                                {{--  @dd($productFile->url) --}}
                                <img src="{{ asset($productFile->url) }}" class="h-fit katalog"
                                    name="{{ $variant->color_id }}" alt="{{ $productFile->file_name }}">
                            @else
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </section>

            {{-- mostly description --}}
            <section id="productDescriptions" class="">
                <div class="flex text-2xl font-normal">
                    <h1 class="flex pr-10">{{ $product->product_name }}</h1>
                    <h1 class="flex">$123</h1>
                </div>
                <div class="flex w-full">
                    @foreach ($productVariants as $variant)
                        @if ($loop->first || $variant->color->color_name != $productVariants[$loop->index - 1]->color->color_name)
                            <input type="radio" name="selected_color" value="{{ $variant->color_id }}" class=""
                                {{-- class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" --}} style="width: 25px; height: 25px;" />
                            <label for="" class="px-2 font-semibold inline">
                                {{ $variant->color->color_name }}
                            </label>
                        @endif
                    @endforeach
                </div>

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
                                    {{-- {{ $availableSize->price }}
                                    {{ $availableSize->stock }} --}}

                                    {{-- Tampilin data ini Pada tabel --}}
                                    <br>

                                    {{--      <!-- Hidden input -->
                                    <input type="hidden" name="price" value="{{ $availableSize->price }}">
                                    {{ $availableSize->price }}
                                    <input type="hidden" name="stock" value="{{ $availableSize->stock }}"> --}}
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <div>
                    <label for="selected_size">Available Size:</label>
                    <label for="qty">Qty</label>
                    <input type="number" name="qty" id="qty" min="1" required>
                </div>

                @if (Session::get('email') != null)
                    <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded mt-4 py-2 px-4 w-2/3">
                        BUY NOW
                        @csrf
                    </button>
                @else
                    <button class="bg-black text-white disabled hover:bg-gray-700 hover:text-white rounded mt-4 py-2 px-4 w-2/3">
                        Log in to get product
                    </button>
                @endif
                <hr class="my-6 w-2/3">
                <div class="w-2/3">
                    {{ $product->description }}
                </div>
            </section>
        </main>

        <br>

        <div class="flex">

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

        <br>

        {{-- @if (Session::get('email') == null)
            <p> Login to Get Product </p>
        @else
            <button type="submit"
                class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4 order-button">
                Order
            </button>
        @endif --}}

    </form>

    <br>
    {{-- <table class="min-w-full divide-y divide-gray-200">
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
    </table> --}}

    {{-- <form action="{{ route('product.buy', ['idProduct' => $product->id]) }}" method="POST"> --}}

    <script>
        // ==== script buat nampilin katalog mana yang diperlihatkan ==== //

        const images = document.querySelectorAll('.katalog')
        const selections = document.querySelectorAll('input[name="selected_color"]')

        images.forEach(image => {
            image.classList.add('hidden');
            console.log(image)
        });
        selections[0].checked = true;
        images[0].classList.remove('hidden')

        console.log(images)
        console.log(selections)

        selections.forEach(function(selection) {
            selection.addEventListener('change', function() {
                images.forEach(image => {
                    image.classList.add('hidden');
                    console.log(image)
                });
                var selectedColor = document.querySelector('input[name="selected_color"]:checked').value;
                document.querySelector('.katalog[name="' + selectedColor + '"]').classList.toggle("hidden")
                console.log("Selected color:", selectedColor);
                // if (document.querySelector('input[name="selected_color"]:checked').value == document.querySelectorAll('.katalog')) {
                //     console.log("prank")
                // }
            });
        });
    </script>
</body>

</html>
