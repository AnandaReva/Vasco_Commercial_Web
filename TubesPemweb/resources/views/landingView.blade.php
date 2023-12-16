@extends('layouts.layout')

@section('title', 'Landing Page')

@section('content')
    <h1>Ini Landing View</h1>
    
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
@endsection
