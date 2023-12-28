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
    <button onclick="goBack()" class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
        BACK
    </button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <h1>Detail Product</h1>
    <div class="border border-gray-300 p-4">
        <table class="min-w-full">
            <thead>
                <tr>
                    <td class="py-2 px-4 border-b">Product Name</td>
                    <td class="py-2 px-4 border-b">Product 1 </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b"> Color</td>
                    <td class="py-2 px-4 border-b">{{ $selectedColor }}</td>
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
            < </table>

    </div>


</body>

</html>
