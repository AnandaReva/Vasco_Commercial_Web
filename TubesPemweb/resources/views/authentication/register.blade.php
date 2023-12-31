<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vasco Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-4ayZ51b/NZMZv8Y5LwiEF/ssCVnjxjMd2iQxIMZKcD5Ggjs/Ip6E2W1SR/o9d38+ICziFXQv0J1p3/6HyVyAaQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            <h1 class="text-3xl font-semibold text-center">Vasco</h1>
            <h2 class="text-xl font-semibold text-center mt-2">Register</h2>

            <form action="{{ route('register') }}" method="post" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                    <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                    <input type="text" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    DEV Register
                </button>
            </form>

            <div class="mt-4 text-center">
                <label class="block text-sm font-medium text-gray-600">Or login with</label>
                <button id="btnGoogle" class="mt-2">
                    <i class="fab fa-google text-blue-500"></i>
                </button>
            </div>
        </div>
    </div>

    <script type="module" src="{{ asset('js/firebaseLogin.js') }}"></script>

</body>

</html>
