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

        @if (session('status') == 'berhasil')
            <div class="alert alert-success text-center" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif

        @if (Session::get('email') != null)
            <p class="w-full text-center py-2 bg-gray-900 text-white">
                <span class="flex ml-6 items-center justify-center sm:justify-between">
                    <span id="welcoming" class=""><span>Welcome, <span
                                class="font-semibold">{{ Session::get('username') }}</span></span></span>


                    <span class="flex items-center sm:justify-end font-semibold mr-6 underline" id="logout">
                        <a class="" href="{{ route('orderHistory' , ['idLogin'=> Session::get('idLogin')]) }}"> Order History </a>
                    </span>

                    <span class="flex items-center sm:justify-end font-semibold mr-6 underline" id="logout">
                        <a class="" href="{{ route('logout') }}"> logout </a>
                    </span>

                </span>
            </p>
        @else
            <a href="{{ route('register') }}">
                <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest
                    product</p>
            </a>
        @endif

        {{-- --------------------- dump code ---------------------- --}}

        {{-- debaug --}}
        {{-- session: {{ Session::get('email') }}
        <br> {{ Session::get('idLogin') }} --}}

        {{-- ------------------------------------------------------ --}}

    </div>

    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
        {{-- Searchbar --}}
        <section class="w-1/2 row-span-2 bg-cover bg-no-repeat bg-right justify-end items-start">

            {{-- Searching --}}
            {{-- <form method="get", action="showCategoryProducts">
                <input name="search" type="search" wire:model='search' placeholder="Type product..."
                    class="p-2 border rounded">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>
            </form> --}}



        </section>
    </div>
    <hr>

    <div class=" mb-20 h-screen bg-cover bg-center bg-[url('/public/img/pic3.png')]">
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

                    <form method="GET" action="{{ route('catalog.show') }}">
                        <button type="submit"
                            class="flex items-center bg-white mx-auto rounded-md px-10 py-2 text-sm font-semibold">
                            SHOP NOW
                        </button>
                    </form>

                </div>
            </section>
            <section></section>
        </div>
    </div>



    <div class="w-full mx-auto mb-20">
        <h2 class="font-semibold text-2xl text-center mb-8">Shop by Category</h3>
            <div class="grid grid-cols-6 gap 4">
                <a href="{{ route('category.show', 1) }}">
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/shirt.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Shirts</p>
                </a>
                <a href="{{ route('category.show', 2) }}">
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/denim.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Denims</p>
                </a>
                <a href="{{ route('category.show', 3) }}">
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/tees.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Tees</p>
                </a>
                <a href="{{ route('category.show', 4) }}">
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/pants.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Pants</p>
                </a>
                <a href="{{ route('category.show', 5) }}">
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/sweater.png') }}" alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Sweaters</p>
                </a>
                <a href="{{ route('category.show', 6) }}">
                    <img class="w-auto h-auto" src="{{ asset('/product_resources/Misc/outerWear.png') }}"
                        alt="">
                    <p class="text-center font-semibold underline underline-offset-1 ">Outerwears</p>
                </a>
            </div>
    </div>

    <div class="mb-24 grid grid-cols-3 gap-2">
        <div class="h-screen bg-cover bg-center bg-[url('/public/product_resources/Misc/newArrival.jpeg')]">
            <div class="w-full h-40 my-80 items-center justify-center align-center">
                <h2 class="text-center mx-auto text-white text-4xl pb-10">
                    New Arrivals
                </h2>
                {{-- newArrivalView.show --}}
                <form method="GET" action="{{ route('newArrivalView.show') }}">
                    <button type="submit" class=" flex items-center bg-white mx-auto px-10 py-2 text-sm">
                        SHOP THE LATEST
                    </button>
                </form>
            </div>
        </div>

        <div class="h-screen bg-cover bg-center bg-[url('/public/product_resources/Misc/bestSeller.png')]">
            <div class="w-full h-40 my-80 items-center justify-center align-center">
                <h2 class="text-center mx-auto text-white text-4xl pb-10">
                    Best-Sellers
                </h2>
                
                <form method="GET" action="{{ route('bestSeller.show') }}">
                    <button type="submit" class=" flex items-center bg-white mx-auto px-10 py-2 text-sm">
                        SHOP YOUR FAVORITE
                    </button>
                </form>
            </div>
        </div>

        <div class="h-screen bg-cover bg-center bg-[url('/public/product_resources/Misc/holiday.png')]">
            <div class="w-full h-40 my-80 items-center justify-center align-center">
                <h2 class="text-center mx-auto text-white text-4xl pb-10">
                    For You
                </h2>
                <button class=" flex items-center bg-white mx-auto px-10 py-2 text-sm">
                    SHOP OCCASION
                </button>
            </div>
        </div>
    </div>

    {{-- ----------------------- VASCO'S FAVORITES  CAROUSEL--------------------- --}}
    <div class="w-full mx-auto mb-20">
        <h2 class="font-semibold text-2xl text-center">Vasco's Favorites</h2>
        <h2 class="text-xl text-center mb-8">Beautifully functional, purposefully designed, passionately crafted,
            and loved by Vasco.</h2>

        <div id="favoritesCarousel">
            <div class="flex justify-center">

                <button class="" type="button" onclick="changeImage(-1)">
                    <img src="{{ asset('/product_resources/carousel/CaretLeft.png') }}" alt="">
                </button>

                <div class="flex space-x-4">
                    <div>
                        <img id="caroAfterPrev" src="{{ asset('/product_resources/Misc/denimPants.png') }}"
                            class="carousel-image hidden d-block w-100 opacity-60" alt="...">
                    </div>
                    <div class="">
                        <img id="caroPrev" src="{{ asset('/product_resources/Misc/blueSweater.png') }}"
                            class="carousel-image d-block w-100 opacity-50 hover:opacity-100 transition ease-in duration-300" />

                    </div>
                    <div>
                        <img id="caroCurrent" src="{{ asset('/product_resources/Misc/waffleLong.png') }}"
                            class="carousel-image d-block opacity-90 w-100 hover:opacity-100 transition ease-in duration-300"
                            alt="...">
                    </div>
                    <div>
                        <img id="caroNext" src="{{ asset('/product_resources/Misc/yellowShirt.png') }}"
                            class="carousel-image ease d-block w-100 opacity-60 hover:opacity-100 transition ease-in duration-300"
                            alt="...">
                    </div>
                    <div>
                        <img id="caroAfterNext" src="{{ asset('/product_resources/Misc/denJack.png') }}"
                            class="carousel-image hidden d-block w-100 opacity-75" alt="...">
                    </div>
                </div>

                <button class="" type="button" onclick="changeImage(1)">
                    <img src="{{ asset('/product_resources/carousel/CaretRight.png') }}" alt="">
                </button>
            </div>

            <div class="flex justify-center mt-16 space-x-3">
                <button id="1" class="indexer h-2 w-2 bg-gray-500 rounded-full focus:outline-none"></button>
                <button id="2" class="indexer h-2 w-2 bg-gray-400 rounded-full focus:outline-none"></button>
                <button id="3" class="indexer h-2 w-2 bg-gray-300 rounded-full focus:outline-none"></button>
                <button id="4" class="indexer h-2 w-2 bg-gray-300 rounded-full focus:outline-none"></button>
                <button id="5" class="indexer h-2 w-2 bg-gray-300 rounded-full focus:outline-none"></button>
                <!-- Add more buttons as needed -->
            </div>
        </div>
    </div>
    {{-- ----------------------------- END OF CAROUSEL --------------------------- --}}

    <div class="w-full mx-auto mb-20">
        <h2 class="font-semibold text-2xl text-center">Vasco Uncensored</h3>
            <h2 class="text-xl text-center mb-8">What they say about Vasco's wardrobe</h3>
                <div class="grid grid-cols-2 gap-4">
                    <section>

                    </section>

                    <section>

                    </section>
                </div>

    </div>


    {{-- ---------------------------- SCRIPTS ----------------------------- --}}
    <script>
        // =============== FAVORITES CAROUSEL ================= //
        let currentImageIndex = 1; // Initial index of the current image
        function changeImage(direction) {
            // Change the current image index based on the direction (1 for next, -1 for previous)
            currentImageIndex += direction;

            // Get all carousel images
            let afterPrev = document.getElementById('caroAfterPrev');
            let prevImage = document.getElementById('caroPrev');
            let currentImage = document.getElementById('caroCurrent');
            let nextImage = document.getElementById('caroNext');
            let afterNext = document.getElementById('caroAfterNext');
            let tempImage = currentImage.src;
            console.log(direction)
            console.log(currentImage.src)

            // Ensure the currentImageIndex stays within the valid range
            if (currentImageIndex < 1) {
                currentImageIndex = 5;
            } else if (currentImageIndex > 5) {
                currentImageIndex = 1;
            }
            const images = document.querySelectorAll('.indexer')
            console.log(images)
            switch (currentImageIndex) {
                case 1:
                    images.forEach(image => {
                        image.classList.remove('bg-gray-500');
                        image.classList.remove('bg-gray-400');
                        image.classList.add('bg-gray-300');
                        console.log(image)
                    });
                    document.getElementById('1').classList.add('bg-gray-500')
                    document.getElementById('2').classList.add('bg-gray-400')
                    document.getElementById('1').classList.remove('bg-gray-300')
                    document.getElementById('2').classList.remove('bg-gray-300')
                    break;
                case 2:
                    images.forEach(image => {
                        image.classList.remove('bg-gray-500');
                        image.classList.remove('bg-gray-400');
                        image.classList.add('bg-gray-300');
                        console.log(image)
                    });
                    document.getElementById('1').classList.add('bg-gray-400')
                    document.getElementById('2').classList.add('bg-gray-500')
                    document.getElementById('3').classList.add('bg-gray-400')
                    document.getElementById('1').classList.remove('bg-gray-300')
                    document.getElementById('2').classList.remove('bg-gray-300')
                    document.getElementById('3').classList.remove('bg-gray-300')
                    break;
                case 3:
                    images.forEach(image => {
                        image.classList.remove('bg-gray-500');
                        image.classList.remove('bg-gray-400');
                        image.classList.add('bg-gray-300');
                    });
                    document.getElementById('2').classList.add('bg-gray-400')
                    document.getElementById('3').classList.add('bg-gray-500')
                    document.getElementById('4').classList.add('bg-gray-400')
                    document.getElementById('2').classList.remove('bg-gray-300')
                    document.getElementById('3').classList.remove('bg-gray-300')
                    document.getElementById('4').classList.remove('bg-gray-300')
                    break;
                case 4:
                    images.forEach(image => {
                        image.classList.remove('bg-gray-500');
                        image.classList.remove('bg-gray-400');
                        image.classList.add('bg-gray-300');
                    });
                    document.getElementById('3').classList.add('bg-gray-400')
                    document.getElementById('4').classList.add('bg-gray-500')
                    document.getElementById('5').classList.add('bg-gray-400')
                    document.getElementById('3').classList.remove('bg-gray-300')
                    document.getElementById('4').classList.remove('bg-gray-300')
                    document.getElementById('5').classList.remove('bg-gray-300')
                    break;
                case 5:
                    images.forEach(image => {
                        image.classList.remove('bg-gray-500');
                        image.classList.remove('bg-gray-400');
                        image.classList.add('bg-gray-300');
                        console.log(image)
                    });
                    document.getElementById('4').classList.add('bg-gray-400')
                    document.getElementById('5').classList.add('bg-gray-500')
                    document.getElementById('4').classList.remove('bg-gray-300')
                    document.getElementById('5').classList.remove('bg-gray-300')
                    break;
                default:
                    break;
            }

            if (direction > 0) {
                tempImage = prevImage.src;

                document.getElementById('caroPrev').src = currentImage.src;
                document.getElementById('caroCurrent').src = nextImage.src;
                document.getElementById('caroNext').src = afterNext.src;
                document.getElementById('caroAfterNext').src = afterPrev.src;
                document.getElementById('caroAfterPrev').src = tempImage;

            } else {
                tempImage = nextImage.src;

                document.getElementById('caroNext').src = currentImage.src;
                document.getElementById('caroCurrent').src = prevImage.src;
                document.getElementById('caroPrev').src = afterPrev.src;
                document.getElementById('caroAfterPrev').src = afterNext.src;
                document.getElementById('caroAfterNext').src = tempImage;

            }
        }

        function currentSlide(index) {
            // Change the current image index to the specified index
            currentImageIndex = index - 1;

            // Call changeImage function to update the carousel
            changeImage(0);
        }

        // =============== END OF CAROUSEL ================= //
    </script>
</body>

</html>
