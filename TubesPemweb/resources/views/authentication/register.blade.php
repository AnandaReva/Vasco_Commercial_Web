<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vasco Login</title>
<<<<<<< HEAD
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
=======
</head>

<body>
    <h1>VASCO</h1>
    <h2>
        Login
    </h2>

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

    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js";
        import {
            GoogleAuthProvider,
            signInWithPopup,
            getAuth
        } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js"
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyDAKAAFUtlic5tTSI0GWb0THGm88X8qplY",
            authDomain: "vasco-257bd.firebaseapp.com",
            projectId: "vasco-257bd",
            storageBucket: "vasco-257bd.appspot.com",
            messagingSenderId: "941508747625",
            appId: "1:941508747625:web:12b5371f5462eed1de1df8",
            measurementId: "G-YLXXQ4S2KV"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);

        // import {
        //     GoogleAuthProvider,
        //     getAuth
        // } from "firebase/auth";

        const provider = new GoogleAuthProvider();
        const auth = getAuth();

        document.querySelector('#btnGoogle').addEventListener('click', function(e) {
            signInWithPopup(auth, provider)
                .then((result) => {
                    // This gives you a Google Access Token. You can use it to access the Google API.
                    const credential = GoogleAuthProvider.credentialFromResult(result);
                    const token = credential.accessToken;
                    // The signed-in user info.
                    const user = result.user;



                    // IdP data available using getAdditionalUserInfo(result)
                    console.log('User Info:', user.uid, user.displayName, user.email, user.photoURL);

                    const userInfo = {
                        uid: user.uid,
                        displayName: user.displayName,
                        email: user.email,
                      /*   photoURL: user.photoURL */
                    };

                    // Simpan userInfo di localStorage
                    localStorage.setItem('userInfo', JSON.stringify(userInfo));

                    // Tambahkan parameter userInfo ke URL
                    const redirectUrl = `/vasco.com?userInfo=${encodeURIComponent(JSON.stringify(userInfo))}`;
                    window.location.href = redirectUrl;


                }).catch((error) => {
                    // Handle Errors here.
                    const errorCode = error.code;
                    const errorMessage = error.message;
                    // The email of the user's account used.
                    const email = error.customData.email;
                    // The AuthCredential type that was used.
                    const credential = GoogleAuthProvider.credentialFromError(error);
                    // ...
                });
            return view('login');
        });
    </script>



    {{-- <div id="userData" data-user-info="{{ json_encode($userInfo) }}"></div> --}}
>>>>>>> 0e5a13e9456957d352780118a2d08b903bb2fbf7

</body>

</html>
