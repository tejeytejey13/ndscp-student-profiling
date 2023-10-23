<style>
#office {
    text-align: center;
    font-size: 30px;
    justify-content: center;
    margin: 5px;
    color: white;
}

.sidebar-avatar {
    display: flex;
    align-items: center;
}

.sidebar-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.sidebar-avatar .name {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    color: white;
}

.sidebar-avatar .job-title {
    margin: 0;
    font-size: 14px;
    color: white;
}
</style>

<?php
session_start();
include('../db-conn/config.php');

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
}

?>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
                <div class="sb-sidenav-menu sidebar">
                    <div class="nav">
                        <h1 id="office">Guidance Office</h1>

                        <div class="sidebar-avatar">
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $profile = $row['profile'];
                                    $role = $row['role'];
                                    
                                  
                                    if ($role == 'admin'){

                            ?>

                            <?php
                                  if($profile != ""){
                                    $profile_show = "../profiles/".$profile;
                                } else {
                                    $profile_show = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
                            }
                            ?>
                            <img src="<?php echo $profile_show ?>" alt="Avatar">

                            <h2 class="name"> <?php echo ucfirst($role).' , '. $fname.' '.$lname ?></h2>
                            <p class="job-title"></p>
                            <?php
                              }
                            }
                            ?>
                        </div>
                        <hr>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link " href="file.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Grade Report
                        </a>
                        <a class="nav-link " href="report.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-bell-exclamation fa-lg"></i></div>
                            Student Incident Report
                        </a>

                        <a class="nav-link " href="adviser.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user fa-lg"></i></div>
                            Department Head
                        </a>
                        <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users fa-lg"></i></div>
                            Student
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="mstudent.php">Male Student</a>
                                <a class="nav-link" href="fstudent.php">Female Student</a>
                                <a class="nav-link" href="student.php">All Student</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open-reader fa-lg"></i></i></div>
                            Course
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="bsit.php">Bachelor of Science in Information Technology</a>
                                <a class="nav-link" href="bscs.php">Bachelor of Science in Computer Science</a>
                                <a class="nav-link" href="beed.php">Bachelor of Elementary Education</a>
                                <a class="nav-link" href="bsed.php">Bachelor of Secondary Education (Major in
                                    English)</a>
                                <a class="nav-link" href="bsedfil.php">Bachelor of Secondary Education (Major in
                                    Filipino)</a>
                                <a class="nav-link" href="bsedmath.php">Bachelor of Secondary Education (Major in
                                    Mathematics)</a>
                                <a class="nav-link" href="bsedrel.php">Bachelor of Secondary Education (Major in
                                    Religious)</a>

                                <a class="nav-link" href="bsba.php">Bachelor of Science in Business Administration</a>
                                <a class="nav-link" href="economics.php">Bachelor of Technology and Livelihood Education
                                    (Home Economics)</a>
                            </nav>
                        </div>
                        <a class="nav-link " href="grad.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users fa-lg"></i></div>
                            Gradute Students
                        </a>
                        <a class="nav-link " href="prev.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users fa-lg"></i></div>
                            Previous Students
                        </a>
                        <a class="nav-link " href="others.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-book fa-lg"></i></div>
                            Others
                        </a>
                    </div>
                </div>


            </nav>


        </div>
    </div>
</body>