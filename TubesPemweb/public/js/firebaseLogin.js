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