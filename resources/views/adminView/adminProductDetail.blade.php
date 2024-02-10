<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN</title>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">ADMIN</h1>
    </div>
    <hr>


    <form method='get' action=' {{ route('catalogAdmin.show') }}'>
        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
            BACK
        </button>
    </form>

    <h1 class=" p-3 text-5xl font-semibold">PRODUCT DETAIL</h1>







    <br>

    {{--   @dd($productVariants) --}}
    <h2 class="p-3 text-3xl font-semi">Product Name: <span
            class="p-3 text-3xl font-semibold">{{ $product->product_name }}</span></h2>
    <h2 class="p-3 text-3xl font-semi">Product Description: <span
            class="p-3 text-3xl font-semibold">{{ $product->description }}</span></h2>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 border-b">Variant ID</th>
                <th class="px-6 py-3 bg-gray-50 border-b">Color</th>
                <th class="px-6 py-3 bg-gray-50 border-b">Image</th>
                <th class="px-6 py-3 bg-gray-50 border-b">Action</th>
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

                        <div class="flex justify-center space-x-4">

                            {{-- Edit Variant --}}
                            <form
                                action="{{ route('variantAdmin.edit', ['idProduct' => $product->id, 'idVariant' => $variant->id]) }}">
                                <button class="text-red-500 hover:underline">
                                    <i class="fas fa-pencil-alt text-lg" style="color: blue;"></i>
                                </button>
                            </form>


                            {{-- Delete variant --}}
                            <button
                                onclick="confirmDelete('{{ route('variantAdmin.destroy', ['idProduct' => $product->id, 'idVariant' => $variant->id]) }}')"
                                class="text-red-500 hover:underline">
                                <i class="fas fa-trash-alt text-lg" style="color: red;"></i>
                            </button>

                            <script>
                                function confirmDelete(deleteUrl) {
                                    var confirmation = confirm(
                                        "Are you sure you want to delete this variant? Entire available sizes will be deleted as well."
                                    );

                                    if (confirmation) {

                                        window.location.href = deleteUrl;
                                    }
                                }
                            </script>
                        </div>


                    </td>


                    <td class="px-6 py-4 text-center border-b">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Size</th>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Price</th>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Stock</th>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Weight</th>
                                    <th class="px-6 py-3 bg-gray-50 border-b">Action</th>
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
                                        <td class="px-6 py-4 text-center border-b">{{ $availableSize->weight }} gr.
                                        </td>
                                        <td class="px-6 py-4 text-center border-b">

                                            <div class="flex justify-center space-x-4">

                                                {{-- Edit Available Size --}}
                                                <form
                                                    action="{{ route('availableSizeAdmin.edit', ['idProduct' => $product->id, 'idVariant' => $variant->id, 'idAvailableSize' => $availableSize->id ]) }}">
                                                    <button class="text-red-500 hover:underline">
                                                        <i class="fas fa-pencil-alt text-lg" style="color: blue;"></i>
                                                    </button>
                                                </form>


                                                {{-- Delete Available Size --}}
                                                <button
                                                    onclick="confirmDeleteAvailableSize('{{ route('availableSizeAdmin.destroy', ['idProduct' => $product->id, 'idVariant' => $variant->id, 'idAvailableSize' => $availableSize->id]) }}')"
                                                    class="text-red-500 hover:underline">
                                                    <i class="fas fa-trash-alt text-lg" style="color: red;"></i>
                                                </button>

                                                <script>
                                                    function confirmDeleteAvailableSize(deleteUrl) {
                                                        var confirmation = confirm(
                                                            "Are you sure you want to delete this size? "
                                                        );

                                                        if (confirmation) {

                                                            window.location.href = deleteUrl;
                                                        }
                                                    }
                                                </script>
                                            </div>


                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                        <form method="get"
                            action="{{ route('availableSizeAdmin.insert', ['idProduct' => $product->id, 'idVariants' => $variant->id]) }}">
                            <button class="btn btn-outline-primary float-left btn-sm add-action">
                                <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i
                                        class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Add Available Size
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>



    <form method="get" action="{{ route('variantAdmin.insert', ['idProduct' => $product->id]) }}">
        <button class="btn btn-outline-primary float-left btn-sm add-action">
            <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i
                    class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Add Variants
        </button>
    </form>








</body>

</html>
