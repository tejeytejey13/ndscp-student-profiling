<!DOCTYPE html>
<html lang="en">
<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
    require('assets/component/sidebar.php');

?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="container-fluid">

                        <div class="row">
                            <?php
                            $totalStudent = "SELECT * FROM fillup";
                            if ($result = mysqli_query($conn, $totalStudent)) {
                                $countTotal = mysqli_num_rows($result);
                           
                        ?>

                            <?php }?>
                            <div class="center">
                                <div class="ring">

                                </div>
                                <span>Loading...</span>

                            </div>
                            <div class="footer">
                                <h3>Please wait for a while we are checking your account...</h3>
                            </div>

                        </div>
                    </div>
                </div>
        </div>

        </main>
    </div>
    </div>


    <?php
        require('assets/component/script.php');
    ?>


    <style>
    #index-text {
        color: maroon !important;
    }

    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.1);
    }

    .center {
        display: flex;
        text-align: center;
        justify-content: center;
        align-items: center;
        min-height: 50vh;
    }

    .ring {
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        animation: ring 2s linear infinite;
        /* background: maroon; */
    }

    @keyframes ring {
        0% {
            transform: rotate(0deg);
            box-shadow: 1px 5px 2px maroon;
        }

        50% {
            transform: rotate(180deg);
            box-shadow: 1px 5px 2px maroon;
        }

        100% {
            transform: rotate(360deg);
            box-shadow: 1px 5px 2px maroon;
        }
    }

    .ring:before {
        position: absolute;
        content: '';
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        border-radius: 50%;
        box-shadow: 0 0 5px maroon;
    }

    span {
        font-weight: bolder;
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        line-height: 200px;
        animation: text 3s ease-in-out infinite;
    }

    @keyframes text {
        50% {
            color: maroon;
        }
    }

    .footer {
        margin-top: 1%;
        text-align: center;
    }
    </style>
</body>

</html>