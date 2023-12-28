div<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>ADMIN</title>
</head>

<body>
    <div class="w-full">
        <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest product</p>
    </div>
    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">ADMIN</h1>
    </div>
    <hr>
    <a href="{{ route('landing') }}">
        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
            BACK HOME
        </button>
    </a>
    <h1>Product Catalog</h1>
    {{--     <div class="grid grid-cols-2"> --}}
    <section class="w-1/2 bg-cover bg-no-repeat bg-right justify-end items-start">
        <div class="flex items-center space-x-4">
            {{-- Searching --}}
            <form method="get" action="">
                <input name="search" type="search" wire:model='search' placeholder="Type product..."
                    class="p-2 border rounded">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>
            </form>

            <label for="category" class="mr-2">Search by Category</label>

            <form class="form-horizontal" action="{{ route('catalog.show') }}" method="get">
                <select class="form-control" id="categoriesOption" name="categoriesOption">
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($categoryList as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" value="searchCategory" name="searchCategorySubmit" class="btn btn-primary">View
                    Category</button>
            </form>
        </div>



        <form action="{{ route('productAdmin.insert') }}" method="get">
            <button class="bg-blue-500 text-white hover:bg-blue-700 hover:text-white rounded py-2 px-4" type="submit">
                <i class="fas fa-plus"></i> Insert New Product
            </button>
        </form>



    </section>

    <section class="flex-col w-full">






        <table class="border-solid w-full ">
            <thead>
                <tr class="">
                    <th class="px-6 py-3 bg-gray-50 border-b">No.</th>
                    <th class="px-6 py-3 bg-gray-50 border-b">ID</th>
                    <th class="px-6 py-3 bg-gray-50 border-b">Product Name</th>
                    <th class="px-6 py-3 bg-gray-50 border-b">Category</th>
                    <th class="px-6 py-3 bg-gray-50 border-b">Product Image</th>
                    <th class="px-6 py-3 bg-gray-50 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $rowNumber = 1;
                @endphp
                @foreach ($productsList as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap border-b">{{ $rowNumber++ }}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"> {{ $product->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b">

                            <a href="{{ route('productAdmin.show', ['idProduct' => $product->id]) }}">
                                {{ $product->product_name }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b">

                            @foreach ($categoryList as $category)
                                @if ($category->id == $product->category_id)
                                    {{ $category->category_name }}
                                @endif
                            @endforeach
                        </td>
                        {{-- Cell for Product Image --}}
                        <td class="px-6 py-4 whitespace-nowrap border-b">
                            {{-- Loop through variants --}}
                            @foreach ($product->variants as $variant)
                                {{-- Check if variant has productFiles --}}
                                @if ($variant->productFiles->isNotEmpty())
                                    {{-- Mengambil satu file pertama dari koleksi --}}
                                    @foreach ($variant->productFiles as $file)
                                        @if ($loop->parent->first)
                                            <img src="{{ asset($file->url) }}" style="max-width: 45px;"
                                                alt="Product Image">
                                        @endif
                                    @break
                                @endforeach
                            @endif
                        @endforeach
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap border-b">
                        <div class="flex">
                            {{-- Edit action --}}
                            <div class="flex">
                                <a href="{{-- {{ route('product.edit', ['idProduct' => $product->id]) }}" class="text-blue-500 hover:underline mr-2" --}}">
                                    <i class="fas fa-pencil-alt text-lg"></i>
                                </a>
                            </div>
                            <div class="flex pl-2">
                                {{-- Delete action --}}
                                <a href="{{-- {{ route('product.destroy', ['idProduct' => $product->id]) }}" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this product?') --}}">
                                    <i class="fas fa-trash-alt text-lg" style="color: red;"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $productsList->links('pagination::bootstrap-5') }}
    </div>
</section>


{{-- </div> --}}

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>


</html>
