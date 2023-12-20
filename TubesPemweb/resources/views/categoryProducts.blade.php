@extends('layouts.layout')

@section('title', 'Product List')

@section('content')
    
    <h1>Product List</h1>

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
@endsection