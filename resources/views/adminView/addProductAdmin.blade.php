<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN ADD</title>
</head>

<body class="bg-gray-100">

    <hr class="my-4">
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>

    <h1 class="text-2xl font-bold mt-4">INSERT NEW PRODUCT</h1>



    <form action=" {{ route('productAdmin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="w-full mt-4">
            <tr>
                <td class="py-2">
                    <label class="text-sm">Choose Category</label>
                </td>
                <td class="py-2">
                    <select class="border p-2" id="categoriesOption" name="categoriesOption">
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categoryList as $category)
                            <option value="{{ $category->id }}">
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
                    <input name="productName" type="text" class="border p-2 w-full">
                </td>
            </tr>
            <tr>
                <td class="py-2">
                    <label class="text-sm">Description</label>
                </td>
                <td class="py-2">
                    <textarea name="description" class="border p-2 w-full"></textarea>
                </td>
            </tr>






        </table>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
    </form>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
