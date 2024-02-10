<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    {{-- -------------------- SIDE BAR ------------------- --}}
    <div class="flex grid grid-cols-3 gap-4">
        <section class="ml-10">

            <a href="{{ route('landing') }}">
                <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4 mb-14 mt-2">
                    BACK HOME
                </button>
            </a>

            <section class="w-1/2 row-span-2 bg-cover bg-no-repeat bg-right justify-end items-start">

                <div class="items-center space-x-4">
                    {{-- Searching --}}
                    <form method="get" action="">
                        <div class="flex">
                            <input name="search" type="search" wire:model='search' placeholder="Search product..."
                                class="p-2 border rounded">
                            <button type="submit"
                                class="bg-gray-200 text-black px-4 py-2 rounded hover:bg-gray-300">Search</button>
                        </div>
                    </form>

                    {{-- <div>
                        <button type="button"
                            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Categories
                            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="">
                            <form class="form-horizontal" action="{{ route('catalog.show') }}" method="get">
                                @foreach ($categoryList as $category)
                                <div class="">
                                    
                                    <button value="{{ $category->id }}">{{ $category->category_name }} </button>
                                </div>
                                @endforeach
                                
                            </form>
                        </div>
                    </div> --}}
                    {{-- <button type="submit" value="{{ $category->id }}" name="searchCategorySubmit"
                    class="">{{ $category->category_name }}</button> --}}

                    <form class="form-horizontal" action="{{ route('catalog.show') }}" method="get">
                        <select class="form-control" id="categoriesOption" name="categoriesOption">
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categoryList as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}


                                </option>
                            @endforeach
                        </select>
                        <button type="submit" value="searchCategory" name="searchCategorySubmit"
                            class="btn btn-primary">View
                            Category</button>
                    </form>



                </div>

            </section>
        </section>

        <section class="flex-col col-span-2 w-full">
            <div class="text-start">
                <h1 class="font-normal">Product Catalog</h1>
                <h5 class="font-normal">featured</h5>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($productsList as $product)
                    <div class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('product.show', ['idProduct' => $product->id]) }}">


                            {{-- Loop through variants --}}
                            @foreach ($product->variants as $variant)
                                {{-- Check if variant has productFiles --}}
                                @if ($variant->productFiles->isNotEmpty())
                                    {{-- Mengambil satu file pertama dari koleksi --}}
                                    @foreach ($variant->productFiles as $file)
                                        @if ($loop->parent->first)
                                            <img src="{{ asset($file->url) }}" style="max-width: 200px;"
                                                alt="Product Image">
                                        @endif
                                    @break
                                @endforeach
                            @endif
                        @endforeach
                        {{ $product->product_name }}
                    </a>
                </div>
            @endforeach
        </div>


        <div class="mt-4">
            {{--    {{ $productsList->links() }} --}}
            {{ $productsList->links('pagination::bootstrap-5') }}
        </div>
    </section>
</div>
{{-- -------------------- END OF SIDE BAR ------------------- --}}
</body>
</html>