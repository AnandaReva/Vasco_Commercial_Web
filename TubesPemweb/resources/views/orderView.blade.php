<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Vasco</title>
</head>

<<<<<<< HEAD
<body> 
=======
<body>
>>>>>>> 0e5a13e9456957d352780118a2d08b903bb2fbf7

    <div class="w-full">
        <p class="w-full mx-auto text-center py-2 bg-gray-900 text-white">Log in here to get the latest product</p>
    </div>
    <div>
        <h1 class="text-center p-3 text-5xl font-semibold">Vasco</h1>
    </div>
    <hr>
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

<<<<<<< HEAD

=======
>>>>>>> 0e5a13e9456957d352780118a2d08b903bb2fbf7
    <h1>Detail Product</h1>
    <div class="border border-gray-300 p-4">
        <table class="min-w-full">
            <thead>
                <tr>
<<<<<<< HEAD
                    <td class="py-2 px-4 border-b"> <img class="w-20 h-20" src="{{ asset($url) }}"> </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b">Product Name</td>
                    <td class="py-2 px-4 border-b">{{ $productName }} </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b"> Color</td>
                    <td class="py-2 px-4 border-b">{{ $selectedColorName }}</td>
=======
                    <td class="py-2 px-4 border-b">Product Name</td>
                    <td class="py-2 px-4 border-b">Product 1 </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b"> Color</td>
                    <td class="py-2 px-4 border-b">{{ $selectedColor }}</td>
>>>>>>> 0e5a13e9456957d352780118a2d08b903bb2fbf7
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b"> Size</td>
                    <td class="py-2 px-4 border-b">{{ $selectedSize }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b"> Price</td>
                    <td class="py-2 px-4 border-b font-normal">Rp. {{ $price }},-</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b">Qty</td>
                    <td class="py-2 px-4 border-b font-normal">{{ $qty }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b border-t font-bold">Total Price</td>
                    <td class="py-2 px-4 border-b border-t font-bold">Rp. {{ $totalPrice }},-</td>
                </tr>
            </thead>
<<<<<<< HEAD
        </table>




        <form method="post"
            action="{{ route('order.process', ['idProduct' => $idProduct, 'idVariant' => $variant_id, 'idAvailableSize' => $availableSizeId]) }}">
            @csrf
            {{-- <input type="hidden" name="product_variant_id" value="{{ $variant_id }}"> --}}
            <input type="hidden" name="qty" value="{{ $qty }}">
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            <input type="hidden" name="stock" value="{{ $stock }}">
            <input type="hidden" name="user_id" value="{{ Session::get('idLogin') }}"> 
            <input type="hidden" name="status" value="pending">

            <input type="submit" value="Buy Now" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
        </form>

        


=======
            < </table>
>>>>>>> 0e5a13e9456957d352780118a2d08b903bb2fbf7

    </div>


</body>

</html>
