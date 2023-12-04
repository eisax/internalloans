<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inserted = $emp->addBorrower($_POST, $_FILES);
}
?>

<div class="mobile-menu-overlay"></div>

<div class="main-container">

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add General User</h4>
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
            if (isset($inserted)) {
                ?>
                <div id="successMessage" class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $inserted; ?>
                </div>

                <?php
            }
            ?>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-green h4">Add user info</h4>
                    <p class="mb-30">User info</p>
                </div>
                <div class="wizard-content">
                    <form class="" action="" method="POST" enctype="multipart/form-data" id="add_borrower_form">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="text" name="borrower_name" class="form-control" id="inputBorrowerFirstName"
                                    placeholder="Enter Fill Name" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">National ID</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="text" name="borrower_nid" class="form-control"
                                    id="inputBorrowerUniqueNumber" placeholder="Unique Number" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="borrower_gender">
                                    <option selected="">Choose...</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="tel" name="borrower_mobile" class="form-control positive-integer"
                                    id="inputBorrowerMobile" placeholder="Numbers Only" value="" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="text" name="borrower_email" class="form-control" id="inputBorrowerEmail"
                                    placeholder="Email" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="date" name="borrower_dob" class="form-control is-datepick"
                                    id="inputBorrowerDob" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="text" name="borrower_address" class="form-control"
                                    id="inputBorrowerAddress" placeholder="Address" value="" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Working status</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="borrower_working_status"
                                    id="inputBorrowerEORS">
                                    <option selected="">Choose...</option>
                                    <option value="1">Student</option>
                                    <option value="2">Employee</option>
                                    <option value="3">Employer</option>
                                    <option value="2">Unemployed</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">User Photo</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="file" id="photo_file" name="image" />
                            </div>
                        </div>
                        <div class="btn-list">
                            <div class="input-group  mb-0">
                                <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                                    value="submit">

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