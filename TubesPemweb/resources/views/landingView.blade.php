<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/css/app.css')

</head>

<body>

    <h1>Products</h1>

    <table class="tables">
        <tr>
            <th>Shirts</th>
            <th>Denims</th>
            <th>T-Shirts</th>
            <th>Pants</th>
            <th>Sweaters</th>
            <th>Outwears</th>
        </tr>
        <tr>
            <td>
                @foreach ($products as $product)
                    @if ($product->category_name == 'Shirts')
                        <div>
                            <h2>{{ $product->pruduct_name }}</h2>

                            <br>
                        </div>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($products as $product)
                    @if ($product->category_name == 'Denims')
                        <div>
                            <h2>{{ $product->pruduct_name }}</h2>

                            <br>
                        </div>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($products as $product)
                    @if ($product->category_name == 'T-Shirts')
                        <div>
                            <h2>{{ $product->pruduct_name }}</h2>

                            <br>
                        </div>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($products as $product)
                    @if ($product->category_name == 'Pants')
                        <div>
                            <h2>{{ $product->pruduct_name }}</h2>

                            <br>
                        </div>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($products as $product)
                    @if ($product->category_name == 'Sweaters')
                        <div>
                            <h2>{{ $product->pruduct_name }}</h2>

                            <br>
                        </div>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($products as $product)
                    @if ($product->category_name == 'Outwears')
                        <div>
                            <h2>{{ $product->pruduct_name }}</h2>

                            <br>
                        </div>
                    @endif
                @endforeach
            </td>
        </tr>

    </table>




</body>

</html>
