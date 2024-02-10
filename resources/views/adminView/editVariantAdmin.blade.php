<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN EDIT VARIANT</title>
</head>

<body class="bg-gray-100">

    <hr class="my-4">
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>

    <h1 class="text-2xl font-bold mt-4">EDIT VARIANTS</h1>

    <h2>Product Name: <strong> {{ $product->product_name }} </strong> </h2>
    <h2>Product Description: <strong> {{ $product->description }} </strong> </h2>
    <h2>Product Category: <strong> {{ $categoryName }} </strong> </h2>

    <form action="{{ route('variantAdmin.update', ['idProduct' => $product->id, 'idVariant' => $variant->id ]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="categoryName" value="{{ $categoryName }}">
        <table>
            <thead>
                <tr>
                    <th class="py-2">Variant Value</th>
                </tr>
            </thead>
            <tbody id="variantInput" class="bg-white divide-y divide-gray-200">
               
                <tr>
                    <td class="py-2">
                        <label class="text-sm">Choose Color 1</label>
                    </td>
                    <td class="py-2">
                        <select class="border p-2 rounded-md" name="colorOption[1]">
                            <option value="" disabled>Select Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}" {{ $variant->color_id == $color->id ? 'selected' : '' }}>
                                    {{ $color->color_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="py-2">
                        <input type="file" name="file[1]" accept="image/*" />
                    </td>
                    <td class="py-2">
                        @if ($variant->file)
                            <img src="{{ asset($variant->file->url) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                        @endif
                    </td>

       
                </tr>
            </tbody>
        </table>

        

        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4"
            type="submit">Update Variant</button>

        
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
