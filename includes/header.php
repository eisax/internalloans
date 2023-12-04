<?php
ob_start();
//code for cache-control
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");

include_once "lib/session.php";
Session::init();
Session::checkSession();
include_once "helpers/format.php";
spl_autoload_register(function ($class) {
    include_once "class/" . $class . ".php";
});


$ml = new ManageLoan();
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
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />




</head>

<body>


    <div class="header pd-20">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>

        </div>
        <div class="header-right">
            <div class="row">
                <div class="user-info-dropdown ">
                    <div class="dropdown">
                        <a class="dropdown-toggle dw dw-user1" href="#" role="button" data-toggle="dropdown">

                            <span class="user-name"><?php echo Session::get("name");?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                            <!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                            <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> -->
                            <?php
                            if (isset($_GET['action']) && $_GET['action'] == "logout") {
                                Session::destroy();
                                header("Location: login.php");
                            }
                            ?>
                            <a class="dropdown-item" href="?action=logout"><i class="dw dw-logout"></i> Log Out</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>





    </div>
    </div>