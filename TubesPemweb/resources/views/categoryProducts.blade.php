<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Vasco's goods</title>
</head>

<body>
    <div class="w-full">
        <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest product</p>
    </div>
    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
    </div>
    <hr>
    <a href="{{ route('landing') }}">
        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
            BACK HOME
        </button>
    </a>
    <h1>{{$categoryName}}</h1>
    {{--     <div class="grid grid-cols-2"> --}}
    <section class="w-1/2 row-span-2 bg-cover bg-no-repeat bg-right justify-end items-start">

        {{-- Searching --}}
        <form method="get", action="">
            <input name="search" type="search" wire:model='search' placeholder="Type product... " value="{{ $keyword }}"
                class="p-2 border rounded">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>
        </form>



    </section>

    {{-- @dd($categoryProducts) --}}
    <section class="flex-col w-full">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($categoryProducts as $product)
            <div class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('product.show', ['idProduct' => $product->id]) }}">
                    {{ $product->product_name }}
                </a>

                {{-- Loop through variants --}}
                @foreach ($product->variants as $variant)
                    {{-- Check if variant has productFiles --}}
                    @if ($variant->productFiles->isNotEmpty())
                        {{-- Mengambil satu file pertama dari koleksi --}}
                        @foreach ($variant->productFiles as $file)
                            @if ($loop->parent->first)
                                <img src="{{ asset($file->url) }}" style="max-width: 200px;" alt="Product Image">
                            @endif
                        @break
                    @endforeach
                @endif
            @endforeach
        </div>
    @endforeach
    </div>


    <div class="mt-4">
        {{--    {{ $productsList->links() }} --}}
        {{ $categoryProducts->links('pagination::bootstrap-5') }}
    </div>
</section>
{{-- </div> --}}

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>


</html>
