<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>

<?php
include_once "class/employee.php";
$emp = new Employee();
?>

<div class="mobile-menu-overlay"></div>

<div class="main-container">

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add Super User</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Admin</a>
                                </li>
                                <li class="breadcrumb-item text-green " aria-current="page">
                                    add user
                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <?php
            if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $inserted = $emp->employeeReg($_POST);
            }
            ?>



            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-green h4">Add user info</h4>
                    <p class="mb-30">User info</p>
                </div>

                <div class="text-center mb-4">
                    <?php
                    if (isset($inserted)) {
                        echo $inserted . "";
                    }
                    ?>
                </div>
                <div class="wizard-content">
                    <form class="form-signin" action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="text" id="inputName" class="form-control" name="name" placeholder="Full Name" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Domain</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-10">
                            <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Admin Level</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="role" required>
                                    <option selected="">Choose...</option>
                                    <option value="1">HOD</option>
                                    <option value="2">HR</option>
                                    <option value="3">CFO/CEO</option>
                                    <option value="4">Admin</option>
                                </select>
                            </div>
                        </div>



                        

                        <div class="btn-list">
                            <div class="input-group  mb-0">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                                value="Register">

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- welcome modal end -->
<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="vendors/scripts/steps-setting.js"></script>

</body>

</html>