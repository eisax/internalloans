<?php
include_once "class/Employee.php";
include_once "lib/session.php";
Session::checkLogin();
$emp = new Employee();
?>


<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>loan managemnet</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="./src/styles/theme.css" />


</head>

<body class="login-page">
    <?php
    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $inserted = $emp->employeeLogin($_POST);
    }
    ?>

    <div class="container">

        <div class="text-center mb-4">
            <?php if (isset($inserted)) {
                echo $inserted;
            } ?>
        </div>

        <div class="login-box bg-white pb-30 box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-green ">zwmb - loan application</h2>
            </div>

            <form class="form-signin" action="" method="POST">

                <div class="input-group custom">
                    <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Username"
                        name="email" required autofocus />
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                </div>
                <div class="input-group custom">
                    <input type="password" class="form-control form-control-lg" placeholder="**********" name="pass"
                        placeholder="Password" id="inputPassword" required />
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                    </div>
                </div>
                <div class="row pb-30">

                    <div class="col-6">
                        <div class="forgot-password">
                            <a href="forgot-password.html">Forgot Password</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="input-group  mb-0">
                            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">

                        </div>
                        
                    </div>
                </div>
            </form>
        </div>


    </div>



    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>


</body>

</html>