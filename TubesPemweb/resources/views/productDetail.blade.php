@extends('layouts.layout')

@section('title', 'Product Details')

@section('content')

    <h1>{{ $product->product_name }}</h1>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attribute</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color</td>
                <td class="px-6 py-3 text-left">{{ $product->color }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</td>
                <td class="px-6 py-3 text-left">{{ $product->description }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</td>
                <td class="px-6 py-3 text-left">{{ $product->price }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</td>
                <td class="px-6 py-3 text-left">{{ $product->stock }}</td>
            </tr>
        </tbody>
    </table>


    <h2> Buy Now </h2>
    {{-- <form action="{{ route('product.buy', ['idProduct' => $product->id]) }}" method="POST"> --}}
    <form method="POST">
        @csrf
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->stock }}" value="1">
        <br>
        <label for="quantity">Size</label><label for="size">Size</label>
        <select name="size" id="size">
          
        </select>
        <input type="number" name="size" id="size" min="1" max="{{ $product->size }}" value="1">
        <br>
        <button type="submit">Buy</button>
    </form>

@endsection
