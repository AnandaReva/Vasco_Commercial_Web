<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN</title>
</head>

<body>

    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">ADMIN</h1>
    </div>
    <hr>

   
    <form method='get' action=' {{ route('catalogAdmin.show') }}'>
        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
            BACK
        </button>
    </form>

    <h1 class="">PRODUCT DETAIL</h1>







    <br>

    {{--   @dd($productVariants) --}}
    <h2 class="">{{ $product->product_name }}</h2>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 border-b">Variant ID</th>
                <th class="px-6 py-3 bg-gray-50 border-b">Color</th>
                <th class="px-6 py-3 bg-gray-50 border-b">Image</th>
                <th class="px-6 py-3 bg-gray-50 border-b">Available Sizes</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($productVariants as $variant)
                <tr>
                    <td class="px-6 py-4 text-center border-b">{{ $variant->id }}</td>
                    <td class="px-6 py-4 text-center border-b">{{ $variant->color->color_name }}</td>
                    <td class="px-6 py-4 text-center border-b">
                        @foreach ($variant->productFiles as $file)
                            <img src="{{ asset($file->url) }}" style="max-width: 45px;" alt="Product Image">
                        @endforeach
                    </td>


                    <td class="px-6 py-4 text-center border-b">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Size</th>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Price</th>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variant->availableSizes as $availableSize)
                                    <tr>
                                        <td class="px-6 py-4 text-center border-b">
                                            {{ $availableSize->size->size_name }}</td>
                                        <td class="px-6 py-4 text-center border-b">Rp. {{ $availableSize->price }},-
                                        </td>
                                        <td class="px-6 py-4 text-center border-b">{{ $availableSize->stock }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>







</body>

</html>
