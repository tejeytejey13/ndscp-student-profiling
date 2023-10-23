<?php
session_start();
 require('assets/component/header.php');
 require('assets/component/topnavbar.php');
 require('assets/component/sidebar.php');

 if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];

    $select = "SELECT * FROM users WHERE id = $id";
    $query = mysqli_query($conn, $select);
    if($query){
        $data = mysqli_fetch_assoc($query);

        if($data){
            $id = $data['id'];
            $name = $data['fname'].' '.$data['mname'].' '.$data['lname'];
            $profile = $data['profile'];
            $username = $data['username'];
            $course = $data['course'];
            $password = $data['password'];
            $title = $data['title'];
            $role = $data['role'];
        }
    }
}
?>
<link rel="stylesheet" href="css/updateprofiles.css?ver=2.0">
<style>
.avatar-settings img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
}
</style>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-settings">
                    <div class="left-container">
                        <div class="avatar-settings">
                            <?php 
                                    if($profile != ""){
                                        $profile_show = "../profiles/".$profile;
                                    } else {
                                        $profile_show = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
                                }
                            ?>
                            <img src="<?php echo $profile_show ?>" alt="">
                        </div>
                        <div class="details">
                            <h5>Name : <?php echo $name ?></h5>
                            <h5>Username : <?php echo $username ?></h5>
                            <h5>Title: <?php echo $title ?> </h5>
                            <h5>Role: <?php echo $role ?> </h5>
                        </div>
                    </div>

                    <div class="right-container">
                        <form action="../db-conn/update-profile.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="userid" value="<?php echo $id?>">

                            <div class="form-group-settings">
                                <div class="row">
                                    <input type="file" name="profile" value="../profiles/.<?php echo $profile ?>">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="lname">Last name</label>
                                        <input type="text" name="lastname" class="form-control-login"
                                            value="<?php echo $data['lname'] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="fname">First name</label>
                                        <input type="text" name="firstname" class="form-control-login"
                                            value="<?php echo $data['fname'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="mname">Middle name</label>
                                        <input type="text" name="midname" class="form-control-login"
                                            value="<?php echo $data['mname'] ?>">
                                    </div>

                                    <div class="col">
                                        <label for="">Course</label>
                                        <input type="text" name="Course" class="form-control-login"
                                            value="<?php echo $course ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control-login"
                                            value="<?php echo $username ?>">
                                    </div>

                                    <div class="col">
                                        <label for="contact">Password</label>
                                        <input type="password" name="password" class="form-control-login"
                                            value="<?php echo $password ?>">
                                    </div>

                                </div>


                                <div class="button-settings">
                                    <button type="submit" class="btn btn-primary" id="save-button"
                                        name="update">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </main>
        </div>
    </div>
<?php  require('assets/component/script.php'); ?>   

</body>