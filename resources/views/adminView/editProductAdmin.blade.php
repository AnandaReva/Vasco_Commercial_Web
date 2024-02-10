<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN EDIT</title>
</head>

<body class="bg-gray-100">

    <hr class="my-4">
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>

    <h1 class="text-2xl font-bold mt-4">EDIT PRODUCT</h1>

    <form action="{{ route('productAdmin.update', ['idProduct' => $product->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <table class="w-full mt-4">
            <tr>
                <td class="py-2">
                    <label class="text-sm">Choose Category</label>
                </td>
                <td class="py-2">
                    <select class="border p-2" id="categoriesOption" name="categoriesOption">
                        <option value="" disabled>Select Category</option>
                        @foreach ($categoryList as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="py-2">
                    <label class="text-sm">Product Name</label>
                </td>
                <td class="py-2">
                    <input name="productName" type="text" class="border p-2 w-full" value="{{ $product->product_name }}">
                </td>
            </tr>
            <tr>
                <td class="py-2">
                    <label class="text-sm">Description</label>
                </td>
                <td class="py-2">
                    <textarea name="description" class="border p-2 w-full">{{ $product->description }}</textarea>
                </td>
            </tr>
        </table>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
