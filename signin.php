<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In</title>

</head>



<body>

    <div class="container-login">

        <img src="images/NDSCP.png" alt="logo" class="logo" id="logo">

        <form action="db-conn/users.php" method="POST" enctype="multipart/form-data">

            <div class="form-group-login">

                <div class="row">

                    <div class="col">

                        <label for="lname">Last name</label>

                        <input type="text" name="lname" class="form-control-login" required>

                    </div>

                    <div class="col">

                        <label for="fname">First name</label>

                        <input type="text" name="fname" class="form-control-login" required>

                    </div>

                </div>

                <div class="row">

                    <div class="col">

                        <label for="mname">Middle name</label>

                        <input type="text" name="mname" class="form-control-login">

                    </div>



                    <div class="col">

                        <label for="profile">Profile</label>

                        <input type="file" name="profile" class="form-control-login" id="profile">

                    </div>

                </div>

                <label class="form-label" for="form8Example3">Course to handle</label>



                <select class="form-control-login" name="course" id="courseDropdown" required>
                    <option value="" selected disabled>Select Course</option>
                    <option value="Department of Computing Education">Department of Computing Education</option>
                    <option value="Department of Business Education">Department of Business Education</option>
                    <option value="Department of Education">Department of Education</option>
                </select>


                <label class="form-label" for="titleDropdown">Title</label>
                <input class="form-control-login" name="title" id="titleInput" readonly>



                <div class="row">

                    <div class="col">

                        <label for="username">Username</label>

                        <input type="text" name="uname" class="form-control-login" required>

                    </div>



                    <div class="col">

                        <label for="password">Password</label>

                        <input type="password" name="password" class="form-control-login" required>

                    </div>

                </div>



                <button class="custom-button">Register</button>

                <h4 class="sign">You already have an account? <span><a href="login.php">Login</a></span></h4>

            </div>

        </form>

    </div>

</body>



</html>

<script>
document.getElementById("courseDropdown").addEventListener("change", function() {
    var courseDropdown = document.getElementById("courseDropdown");
    var titleInput = document.getElementById("titleInput");
    var selectedCourse = courseDropdown.options[courseDropdown.selectedIndex].value;
    var selectedTitle = "";

    switch (selectedCourse) {
        case "Department of Computing Education":
            selectedTitle = "MIT";
            break;
        case "Department of Business Education":
            selectedTitle = "MaEd";
            break;
        case "Department of Education":
            selectedTitle = "LPT";
            break;
    }

    titleInput.value = selectedTitle;
});
</script>


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

    max-width: 400px;
    /* Set a maximum width for the container */

    margin: 80px auto;

    padding: 20px;

    text-align: center;

}



.logo {

    height: 150px;

    width: 150px;

    margin: 0 auto 27px;
    /* Center the logo horizontally */

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

    height: 40px;

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





.row {

    display: flex;

    flex-wrap: wrap;

    margin-right: -10px;

    margin-left: -10px;

}



.col {

    flex-basis: 0;

    flex-grow: 1;

    max-width: 100%;

    padding-right: 10px;

    padding-left: 10px;

}
</style>