<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div class="container-login">
        <form action="db-conn/val_login.php" method="POST">

            <img src="images/NDSCP.png" alt="logo" class="logo" id="logo">
            <div class="form-group-login">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control-login">

            </div>
            <div class="form-group-login">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control-login">
            </div>
            <button class="custom-button">Login</button>
            <h4 class="sign">Don't have an account yet? <span><a href="signin.php">Sign In</a></span></h4>
        </form>

    </div>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:wght@400;500;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background: url('images/bg2.jpg') no-repeat;
    background-position: center;
    background-size: cover;
}

.container-login {
    width: 90%;
    max-width: 400px; /* Set a maximum width for the container */
    margin: 80px auto;
    padding: 20px;
    text-align: center;
}

.logo {
    height: 150px;
    width: 150px;
    margin: 0 auto 30px; /* Center the logo horizontally */
    background-color: transparent;
}

.sign {
    text-align: center;
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    padding: 10px;
    margin-top: 20px;
}

label {
    font-weight: bolder;
}

.form-control-login {
    width: 100%;
    height: 30px;
    border-radius: 10px;
    border: maroon solid;
    margin: 10px 0;
    padding: 5px;
}

.form-group-login {
    text-align: left;
}

.custom-button {
    width: 100%;
    height: 30px;
    border-radius: 10px;
    background-color: maroon;
    color: white;
    border: none;
    cursor: pointer;
    margin: 20px 0;
}

.custom-button:hover {
    background-color: darkred;
}

/* Media Queries */

@media only screen and (min-width: 768px) {
    .container-login {
        max-width: 500px;
    }

    .logo {
        margin: 0 auto 30px;
    }
}

@media only screen and (min-width: 992px) {
    .container-login {
        max-width: 600px;
    }

    .logo {
        margin: 0 auto 30px;
    }
}

</style>