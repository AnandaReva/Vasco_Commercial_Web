<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Vasco</title>
</head>

<body>
    <div class="w-full">
        <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest product</p>
    </div>
    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
    </div>
    <hr>

    <div class=" mb-20 h-screen bg-cover bg-center bg-[url('/public/img/pic2.jpg')]">
        <div class="grid grid-cols-2 gap-4">
            <section class="flex">
                <div class="w-full h-40 my-80 items-center justify-center align-center">
                    <h2 class="text-center mx-auto text-white text-4xl pb-3">
                        Your Cozy Era
                    </h2>
                    <div class="pb-3">
                        <h4 class="w-full text-center mx-auto text-white text-lg">
                            Get peak comfy-chic
                        </h4>
                        <h4 class="w-full text-center mx-auto text-white text-lg">
                            with new winter essentials.
                        </h4>
                    </div>
                    <button class="flex items-center bg-white mx-auto rounded-md px-10 py-2 text-sm font-semibold">
                        SHOP NOW
                    </button>
                </div>
            </section>
            <section></section>
        </div>
    </div>

    <div class="w-full mx-auto mb-20">
        <h2 class="font-semibold text-2xl text-center mb-8">Shop by Category</h3>
            <div class="grid grid-cols-6 gap 4">
                <div>
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/shirt.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Shirts</p>
                </div>
                <div>
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/sweater.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Sweaters</p>
                </div>
                <div>
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/denim.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Denims</p>
                </div>
                <div>
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/tees.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Tees</p>
                </div>
                <div>
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/pants.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Pants</p>
                </div>
                <div>
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/outerWear.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Outerwears</p>
                </div>
            </div>
    </div>

    <div class="mb-24 grid grid-cols-3 gap-2">
        <div class="h-screen bg-cover bg-center bg-[url('/public/product_resources/Misc/newArrival.jpeg')]">
            <div class="w-full h-40 my-80 items-center justify-center align-center">
                <h2 class="text-center mx-auto text-white text-4xl pb-10">
                    New Arrivals
                </h2>
                <button class=" flex items-center bg-white mx-auto px-10 py-2 text-sm">
                    SHOP THE LATEST
                </button>
            </div>
        </div>

        <div class="h-screen bg-cover bg-center bg-[url('/public/product_resources/Misc/bestSeller.png')]">
            <div class="w-full h-40 my-80 items-center justify-center align-center">
                <h2 class="text-center mx-auto text-white text-4xl pb-10">
                    Best-Sellers
                </h2>
                <button class=" flex items-center bg-white mx-auto px-10 py-2 text-sm">
                    SHOP YOUR FAVORITES
                </button>
            </div>
        </div>

        <div class="h-screen bg-cover bg-center bg-[url('/public/product_resources/Misc/holiday.png')]">
            <div class="w-full h-40 my-80 items-center justify-center align-center">
                <h2 class="text-center mx-auto text-white text-4xl pb-10">
                    The Holiday Outfit
                </h2>
                <button class=" flex items-center bg-white mx-auto px-10 py-2 text-sm">
                    SHOP OCCASION
                </button>
            </div>
        </div>
    </div>

    <div class="w-full mx-auto mb-20">
        <h2 class="font-semibold text-2xl text-center">Vasco's Favorites</h3>
            <h2 class="text-xl text-center mb-8">Beautifully functional, purposefully designed, passionately crafted, and loved by Vasco.</h3>
                <h1>Shop by Category</h1>
                <table>
                    <thead>
                        <tr>
                            @foreach ($categories as $category)
                            <th>
                                <a href="{{ route('category.show', ['idCategory' => $category->id]) }}">
                                    {{ $category->category_name }}
                                </a>
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                </table>
    </div>

    <div class="w-full mx-auto mb-20">
        <h2 class="font-semibold text-2xl text-center">Vasco Uncensored</h3>
            <h2 class="text-xl text-center mb-8">What they say about Vasco's wardrobe</h3>
                <div class="grid grid-cols-2 gap-4">
                    <section>
                        <table>
                            <thead>
                                <tr>
                                    @foreach ($categories as $category)
                                    <th>
                                        <a href="{{ route('category.show', ['idCategory' => $category->id]) }}">
                                            {{ $category->category_name }}
                                        </a>
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                        </table>
                    </section>

                    <section>

                    </section>
                </div>

    </div>


</body>

</html>