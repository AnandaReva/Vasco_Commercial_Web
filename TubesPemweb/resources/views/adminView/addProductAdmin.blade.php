<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN</title>
</head>

<body>

    <hr>
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>

    <h1 class="">INSERT NEW PRODUCT</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <label>Choose Category</label>
                </td>
                <td>
                    <select class="form-control" id="categoriesOption" name="categoriesOption">
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
                <td>
                    <label>Product Name</label>
                </td>
                <td>
                    <input type="text" class="border">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Description</label>
                </td>
                <td>
                    <input type="textarea" class="border">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Product variants</label>
                </td>
                <td>
                    <input type="" class="border">
                </td>
            </tr>





        </table>

    </form>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
