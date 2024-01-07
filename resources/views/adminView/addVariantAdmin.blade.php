<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN ADD VARIANT</title>
</head>

<body class="bg-gray-100">

    <hr class="my-4">
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>

    <h1 class="text-2xl font-bold mt-4">INSERT VARIANTS</h1>

    <h2>Product Name: <strong> {{ $product->product_name }} </strong> </h2>
    <h2>Product Description: <strong> {{ $product->description }} </strong> </h2>
    <h2>Product Category: <strong> {{ $categoryName }} </strong> </h2>

    <form action="{{ route('variantAdmin.store', ['idProduct' => $product->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="categoryName" value="{{ $categoryName }}">
        <table>
            <thead>
                <tr>
                    <th class="py-2">Variant Value</th>
                </tr>
            </thead>
            <tbody id="variantInput" class="bg-white divide-y divide-gray-200">
                <!-- Baris awal untuk kategori warna -->
                <tr>
                    <td class="py-2">
                        <label class="text-sm">Choose Color 1</label>
                    </td>
                    <td class="py-2">
                        <select class="border p-2 rounded-md" name="colorOption[1]">
                            <option value="" disabled selected>Select Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">
                                    {{ $color->color_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="py-2">
                        <input type="file"  name="file[1]" accept="image/*" />
                    </td>
                </tr>
            </tbody>
        </table>

        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4" type="button"
            onClick="addVariant()">Add More Variant</button>


        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4"
            type="submit">Continue add Available Sizes</button>

        <script src="{{ asset('js/addVariantAndSize.js') }}"></script>

    </form>

    <script>
        var colors = @json($colors);
    </script>



    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
