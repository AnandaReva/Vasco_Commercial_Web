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

                    <span class="flex items-center sm:justify-end text-white font-semibold mr-6 underline"
                        id="logout">
                        <a class="" href="{{ route('logout') }}" class="text-white"> logout </a>
                    </span>

                </span>
            </p>
        @else
            <a href="{{ route('register') }}">
                <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest
                    product</p>
            </a>
        @endif
    </div>
    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
    </div>
    <hr class="mb-20">

    <div class="flex grid grid-cols-3 gap-4">
        <section class="ml-10">
            <a href="{{ route('landing') }}">
                <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4 mb-14 mt-2">
                    BACK HOME
                </button>
            </a>

            {{-- @dd($orderHistories) --}}

        </section>

        <section class="flex-col col-span-2 w-full">
            <div class="text-start">
                <h1 class="font-normal">Order History</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($orderHistories as $orderHistory)
                    <div class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">

                            <a href="{{ route('product.show', ['idProduct' => $orderHistory->product_id]) }}">
                                <p class="font-bold">{{ $orderHistory->productTransaction->product_name }}</p>
                            </a>



                            @php
                                $colorName = App\Models\Color::where('id', $orderHistory->productVariantTransactions->color_id)->value('color_name');

                                $sizeName = App\Models\AvailableSize::find($orderHistory->available_size_id)->size->size_name;

                            @endphp

                            <p class="font-semibold">Color: {{ $colorName }}</p>
                            <p class="font-semibold">Size: {{ $sizeName }}</p>



                            <p class="font-semibold">Quantity: {{ $orderHistory->quantity }}</p>
                            <p class="font-semibold">Total: Rp. {{ $orderHistory->total_price }}</p>
                            <p class="font-semibold">Order Date: {{ $orderHistory->created_at }}</p>
                            <p class="font-semibold">Status: {{ $orderHistory->status }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $orderHistories->links('pagination::bootstrap-5') }}
            </div>
        </section>
    </div>



</body>

<script></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>


</html>
