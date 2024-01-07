<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
</head>
<body>
    <h2>Order Receipt</h2>

    <table style="width:100%; border-collapse: collapse; margin-top: 20px;">
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Product Name</th>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Color</th>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Size</th>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Quantity</th>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Total Price</th>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Status</th>
        </tr>
        <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $product_name }}</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $colorName }}</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $sizeName }}</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $qty }}</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $total_price }}</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $status }}</td>
        </tr>
    </table>


    <img src="{{ $message->embed(public_path($productImageUrl)) }}" style="max-width: 100%; margin-top: 20px;">


</body>
</html>
