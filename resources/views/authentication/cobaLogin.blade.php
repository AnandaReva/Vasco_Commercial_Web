<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vasco Login</title>
</head>

<body>
    <h1>VASCO</h1>
    <h2>
        Log In
    </h2>

    <div>
        <form action="">
            <table>
                <tr>
                    <td>
                        <label for="email">Email: </label>
                    </td>
                    <td>
                        <input type="text" name="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password: </label>
                    </td>
                    <td>
                        <input type="text" name="password">
                    </td>
                </tr>
            </table>
            <button type="submit">
                login
            </button>
        </form>

        <a href="">
            <button>
                Soon to be register button
            </button>
        </a>
    </div>

    <div>
        <form action="{{ route('register') }}" method="post">
            <table>
                <tr>
                    <td>
                        <label for="email">Email: </label>
                    </td>
                    <td>
                        <input type="text" id="email" name="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password: </label>
                    </td>
                    <td>
                        <input type="text" id="password" name="password">
                    </td>
                </tr>
            </table>
            <button type="submit">
                DEV Register
            </button>
        </form>
        <button id="btnGoogle">
            LOGIN WITH GOOGLE
        </button>
    </div>

</body>

</html>