<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Vasco - Confirm Order</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <header class="py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-semibold text-gray-800">Vasco</h1>
                <button class="bg-gray-900 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                    BACK
                </button>
            </div>
        </header>

        <main class="mt-4">
            <h2 class="text-2xl font-semibold text-center mb-4">Confirm Payment</h2>

            <div class="bg-white rounded-lg shadow-md p-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold">Items Cost: .</h3>
                    @php
                        $item_price = $transaction->total_price - $delivery->cost;
                    @endphp
                    <p class="text-xl">Rp. {{ $item_price }},-</p>
                    <h3 class="text-xl font-semibold">Delivery Cost .</h3>:
                    <p class="text-xl">Rp. {{ $delivery->cost }},-</p>
                    <hr>
                    <h3 class="text-xl font-semibold">Total Price .</h3>:
                    <p class="text-xl font-semibold">Rp. {{ $transaction->total_price }},-</p>
                </div>

                <button id="pay-button"
                    class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold mt-4 hover:bg-blue-600">
                    Pay 
                </button>

                {{--  <pre class="mt-4 text-sm text-gray-600" id="result-json">Hasil pembayaran akan muncul di sini...</pre> --}}
            </div>
        </main>
    </div>

    {{--  @dd($transaction->id) --}}

    <script>
        var transactionId = {{ $transaction->id }};
        var deliveryId = {{ $delivery->id }};
    </script>

    {{--  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"> --}}
    <script src=" {{ asset('js/midtrans.js') }}" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $transaction->snap_token }}', {
                // Optional callbacks
                onSuccess: function(result) {
                    window.location.href = '/vasco.com/updateData/' + transactionId + '/' + deliveryId;
                },

                onPending: function(result) {
                    document.getElementById('result-json').textContent = JSON.stringify(result, null, 2);
                },
                onError: function(result) {
                    document.getElementById('result-json').textContent = JSON.stringify(result, null, 2);
                }
            });
        };
    </script>



</body>

</html>
