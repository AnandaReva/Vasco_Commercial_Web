<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN EDIT AVAILABLE SIZE</title>
</head>

<body class="bg-gray-100">

    <hr class="my-4">
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>

    <h1 class="text-2xl font-bold mt-4">EDIT AVAILABLE SIZE</h1>

    {{-- Dumping variables for debugging --}}
    {{-- @dump($sizes, $idProduct, $idVariant, $variantSize) --}}

    <form action="{{ route('availableSizeAdmin.update', ['idProduct' => $idProduct, 'idVariant' => $idVariant, 'idAvailableSize' => $availableSize->id]) }}" method="post">
        @csrf
        @method('PUT')

        <h2>Variant ID: <strong>{{ $idVariant }}</strong></h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="py-2">Size (US)</th>
                    <th class="py-2">Price (IDR)</th>
                    <th class="py-2">Stock (PCS)</th>
                    <th class="py-2">Weight (gr)</th>
                </tr>
            </thead>
            <tbody id="sizeInput{{ $idVariant }}" class="bg-white divide-y divide-gray-200">
                <tr>
                    <td>{{ $availableSize->id }}</td>
                    <td class="py-2">
                        <select class="border p-2 rounded-md" name="sizeOption">
                            <option value="" disabled>Select Size</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}" {{ $availableSize->size_id == $size->id ? 'selected' : '' }}>
                                    {{ $size->size_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="border p-2 rounded-md" type="number" name="price"
                            value="{{ $availableSize->price }}" placeholder="Price">
                    </td>
                    <td>
                        <input class="border p-2 rounded-md" type="number" name="stock"
                            value="{{ $availableSize->stock }}" placeholder="Stock">
                    </td>
                    <td>
                        <input class="border p-2 rounded-md" type="number" name="weight"
                            value="{{ $availableSize->weight }}" placeholder="Weight">
                    </td>
                </tr>
            </tbody>
            
        </table>

        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4" type="submit">Submit</button>
    </form>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
