<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vasco Register</title>
</head>

<body>
    <h1>VASCO</h1>
    <h2>
        Register
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
                    // ...
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
</body>

</html>