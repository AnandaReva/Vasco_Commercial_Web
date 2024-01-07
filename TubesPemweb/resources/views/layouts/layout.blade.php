<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App')</title>

<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-4ayZ51b/NZMZv8Y5LwiEF/ssCVnjxjMd2iQxIMZKcD5Ggjs/Ip6E2W1SR/o9d38+ICziFXQv0J1p3/6HyVyAaQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

=======
>>>>>>> 0e5a13e9456957d352780118a2d08b903bb2fbf7
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body>





    


    



    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

</body>

</html>
