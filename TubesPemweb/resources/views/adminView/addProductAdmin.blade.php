<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>ADMIN</title>
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
                    <input type="text" class="border p-2 w-full">
                </td>
            </tr>
            <tr>
                <td class="py-2">
                    <label class="text-sm">Description</label>
                </td>
                <td class="py-2">
                    <textarea class="border p-2 w-full"></textarea>
                </td>
            </tr>

            <tr>
                <td class="py-2">
                    <label class="text-sm">Product Variants</label>
                </td>

                {{ dump($colors) }}

                <td class="py-2">
                    <label class="text-sm font-bold">Discussion</label>
                    <div id="discussion-container">
                        <div id="discussions">
                            <div class="discussion bg-white border rounded p-4 mb-4">

                                Variant 1.

                                <select class="border p-2 w-full" name="color[]"
                                    placeholder="Please fill before adding Sizes" style="height: 100px;">
                                    <option value="" disabled selected>Select Color</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->color_name }}">
                                            {{ $color->color_name }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="button" id="addAction" class="addAction btn btn-outline-primary p-2"
                                    value="Add Action" data-discussion-index="${discussionIndex}">
                                    <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i
                                            class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Tambah Action
                                </button>

                                <div class="actions">
                                    Available Size:
                                    <table class="w-full border-collapse border border-gray-300 p-2">
                                        <tr>
                                            <th class="p-2">Size:</th>
                                            <th class="p-2">Price:</th>
                                            <th class="p-2">Stock:</th>
                                            <th class="p-2">Date Added::</th>

                                        </tr>
                                        <tr>


                                            <td class="p-2">
                                                <select class="border p-2" id="categoriesOption" name="size[0][]"
                                                    id="size_0">
                                                    <option value="" disabled selected>Select Size</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">
                                                            {{ $size->size_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            <td class="p-2">
                                                <input type="number" name="price[0][]" id="price_0"
                                                    placeholder="Price" class="border p-2 w-full">
                                            </td>
                                            <td class="p-2">
                                                <input type="number" name="stock[0][]" id="stock_0"
                                                    placeholder="Stock" class="border p-2 w-full">
                                            </td>
                                            <td class="p-2">
                                                <input type="date" name="dateAdded[0][]" id="dateAdded_0"
                                                    placeholder="Date Added" class="border p-2 w-full">
                                            </td>

                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <button id="addDiscussion" value="Add Discussion" type="button"
                            class="btn btn-outline-primary float-right btn-sm add-action p-2">
                            <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i
                                    class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Tambah Item Diskusi
                        </button>
                    </div>


                    <script>
                        // kirim data sizes dan colors
                        var sizes = @json($sizes);
                        var colors = @json($colors);
                    </script>

                    <script src="{{ asset('js/addVariant.js') }}"></script>


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
