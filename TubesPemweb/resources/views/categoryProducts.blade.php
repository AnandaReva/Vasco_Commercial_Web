<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
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
    <a href="{{ route('home')}}">
        <button class="bg-black text-white hover:bg-gray-700 hover:text-white rounded py-2 px-4">
            BACK HOME
        </button>
    </a>
    <h1>Product List</h1>
    <div class="grid grid-cols-2">
        <section class="w-1/2 row-span-2 bg-cover bg-no-repeat bg-right justify-end items-start">
            <input type="search" wire:model='search' placeholder="Search..." class="p-2 border rounded">
        </section>

        <section class="flex-col w-full">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                    </tr>
                </thead>

                <tbody>


                    @foreach ($categoryProducts as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('product.show', ['idProduct' => $product->id]) }}">
                                {{ $product->product_name }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

</body>

</html>