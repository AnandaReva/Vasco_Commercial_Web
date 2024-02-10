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
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $product_name }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Color</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $colorName }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Size</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $sizeName }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Quantity</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $qty }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Items Price</th>
            @php
                $item_price = $total_price - $deliveryCost;
            @endphp
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $item_price }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Delivery Cost</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $deliveryCost }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Total Price</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><strong>{{ $total_price }}</strong></td>
        </tr>
    </table>

    <h3>Delivery Detail</h3>

    <table style="width:100%; border-collapse: collapse; margin-top: 20px;">
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Provider</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $provider }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Destination Address</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $Address }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Recipient Name</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $recipient }}</td>
        </tr>
        <tr>
            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">ETD</th>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $etdDate }}</td>
        </tr>
    </table>

    <img src="{{ $message->embed(public_path($productImageUrl)) }}" style="max-width: 400px; margin-top: 20px;">

</body>

</html>
