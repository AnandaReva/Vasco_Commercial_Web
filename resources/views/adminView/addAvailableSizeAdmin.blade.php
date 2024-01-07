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

    <h1 class="text-2xl font-bold mt-4">AVAILABLE SIZES</h1>


    {{-- @dump($sizes, $idVariants, $idProduct) --}}






    <form action="{{ route('availableSizeAdmin.store', ['idProduct' => $idProduct, 'idVariants' => implode(',', $idVariants)]) }}" method="post">
        @foreach ($idVariants as $idVariant)
            <h2>Variant ID: <strong>{{ $idVariant }}</strong></h2>
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="py-2">Size</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Stock</th>
                    </tr>
                </thead>
                <tbody id="sizeInput{{ $idVariant }}" class="bg-white divide-y divide-gray-200">
                    <tr id="templateRow" style="display: none;">
                        <td class="py-2">
                            <label class="text-sm">Choose Size 1</label>
                        </td>
                        <td class="py-2">
                            <select class="border p-2 rounded-md" name="sizeOption[{{ $idVariant }}][]">
                                <option value="" disabled selected>Select Size</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">
                                        {{ $size->size_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="border p-2 rounded-md" type="number" name="price[{{ $idVariant }}]" placeholder="Price" ">
                        </td>
                        <td>
                            <input class="border p-2 rounded-md" type="number" name="stock[{{ $idVariant }}]" placeholder="Stock">
                        </td>
                    </tr>
                </tbody>
            </table>
    
            <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4"
                    id="{{ $idVariant }}" type="button" onClick="addSize('{{ $idVariant }}')">Add Sizes</button>
        @endforeach
    
        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4"
                type="submit">Submit</button>
    </form>
    


    <br>

    <script src="{{ asset('js/addVariantAndSize.js') }}"></script>



    <script>
        var sizes = @json($sizes);
    </script>



    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
