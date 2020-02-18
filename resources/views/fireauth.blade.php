<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Firebase Auth</title>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-auth.js"></script>

    <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCULg44mnQGIifoM0MViO9ImQrF0AWqYEc",
        authDomain: "ontrash-e9655.firebaseapp.com",
        databaseURL: "https://ontrash-e9655.firebaseio.com",
        projectId: "ontrash-e9655",
        storageBucket: "ontrash-e9655.appspot.com",
        messagingSenderId: "583603586215",
        appId: "1:583603586215:web:f25ede93da070821c4c782"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    var provider = new firebase.auth.GoogleAuthProvider();
    provider.addScope('https://www.googleapis.com/auth/userinfo.profile');
    provider.addScope('https://www.googleapis.com/auth/user.birthday.read');
    provider.addScope('https://www.googleapis.com/auth/user.addresses.read');

    document.onload = getRedirectResult();
    
    function getRedirectResult() { 
        firebase.auth().getRedirectResult().then(function(result) {
            if (result.credential) {
                var token = result.credential.accessToken;
            }
            var user = result.user;
            var token = user.getIdToken();
            console.log(token);
            // createUser(user);
        }).catch(function(error) {
            var errorCode = error.code;
            var errorMessage = error.message;
            var email = error.email;
            var credential = error.credential;
            console.log("error");
        });
    }

    function createUser(user, jwt) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://sesampah.local/api/me", true);
        xhr.setRequestHeader('Authorization', 'Bearer ' + jwt);
        xhr.setRequestHeader('Accept', 'application/json')
        xhr.addEventListener('error', handleRequestError);
        xhr.send();
    }

    function handleRequestError(e) {
        console.log(e);
    }

    function login() {
        firebase.auth().signInWithRedirect(provider);
    }

    function logout() {
        firebase.auth().signOut().then(function() {
            console.log("Signed out successfully!");
        }).catch(function(error) {
            // An error happened.
        });
    }

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is signed in.
            var token = user.getIdToken(true);
            // console.log(token);
            // ...
            firebase.auth().currentUser.getIdToken(/* forceRefresh */ true).then(function(idToken) {
                // Send token to your backend via HTTPS
                // ...
                createUser(user, idToken);
                }).catch(function(error) {
                // Handle error
            });
        } else {
            // User is signed out.
            // ...
        }
    });

    

    </script>
</head>

<body>
    <button onclick="login()">Login</button>
    <button onclick="logout()">Logout</button>
</body>
</html>