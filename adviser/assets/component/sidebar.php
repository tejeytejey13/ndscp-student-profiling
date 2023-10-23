<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <h1 id="office">Program Head</h1>

                        <div class="sidebar-avatar">
                            <?php
                                    session_start();
                                    include('../db-conn/config.php');

                                    if (isset($_SESSION['id'])) {
                                        $id = $_SESSION['id'];

                                        $query = "SELECT * FROM users WHERE id = $id";
                                        $result = mysqli_query($conn, $query);

    
                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);

                                            if ($row) {
                                                $id = $row['id'];
                                                $profile = $row['profile'];
                                                $fname = $_SESSION['fname'];
                                                $lname = $_SESSION['lname'];
                                                $course = $_SESSION['course_belong'];
                                                $role = $row['role'];
                                                $status = $row['status'];
                                                
                                                if($role !== 'admin') {
                                                    if($status == 'approved'){
                                                echo '<div class="sidebar-avatar">';
                                                echo '<img src="../profiles/' . $profile . '" alt="Avatar">';
                                                echo '<h2 class="name">' . $fname . ' ' . $lname . '</h2>';
                                                echo '</div>';
                                        
                            ?>
                        </div>
                        <hr>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- <a class="nav-link collapsed" href="file.php" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                           
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div> -->

                        <a class="nav-link " href="file.php?adviserID='<?php echo $id ?>'">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Grade Report
                        </a>
                        <a class="nav-link " href="report.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-bell-exclamation fa-lg"></i></div>
                            Student Incident Report
                        </a>

                        <a class="nav-link " href="course.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users fa-lg"></i></div>
                            <?php echo $course ?>
                        </a>
                        <a class="nav-link collapsed" href="file.php" data-bs-toggle="collapse"
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
                                <!-- <a class="nav-link" href="student.php">All Student</a> -->
                            </nav>
                        </div>
                        <?php
                        } else if($status == 'pending'){
                            echo '<div class="sidebar-avatar">';
                            echo '<img src="../profiles/' . $profile . '" alt="Avatar">';
                            echo '<h2 class="name">' . $fname . ' ' . $lname . '</h2>';
                            echo '</div>';
                        ?>
                    </div>
                    <hr>
                    <a class="nav-link" href="pending-index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="file.php" data-bs-toggle="collapse"
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
                    <?php }}}}} ?>
                </div>
        </div>
        </nav>
    </div>
    </div>
</body>

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