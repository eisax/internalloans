<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>

<script>
    function calculateEMI() {
        var loan_amount = document.myform.loan_amount.value;
        if (!loan_amount)
            loan_amount = '0';

        var loan_percent = document.myform.loan_percent.value;
        if (!loan_percent)
            loan_percent = '0';

        var installments = document.myform.installments.value;
        if (!installments)
            installments = '0';


        var loan_amount = parseFloat(loan_amount);
        var loan_percent = parseFloat(loan_percent);
        var installments = parseFloat(installments);

        var total = loan_amount + (loan_amount * (loan_percent / 100));

        document.myform.total_amount.value = parseFloat(total).toFixed(2);
        document.myform.borrower_emi.value = parseFloat((total / installments)).toFixed(2);
    }
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_loan_application'])) {
    $inserted = $ml->applyForLoan($_POST, $_FILES);
}
?>

<div class="container">




    <div class="mobile-menu-overlay"></div>

    <div class="main-container">

        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Apply Loan</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Personal</a>
                                    </li>
                                    <li class="breadcrumb-item text-green " aria-current="page">
                                        apply
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
                        <h4 class="text-green h4">Apply Loan</h4>
                        <p class="mb-30">application form</p>
                    </div>
                    <?php
                    $name = "";
                    $b_id = "";
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {

                        $nid = $_POST['key'];
                        $br = $emp->findBorrower($nid);
                        if ($br) {
                            $row = $br->fetch_assoc();
                            $name = $row['name'];
                            $b_id = $row['id'];
                        } else {
                            ?>
                            <div id="successMessage" class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo "User not found or user not applicable"; ?>
                            </div>

                            <?php
                        }
                    }
                    ?>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group row">
                            <label for="inputBorrowerFirstName"
                                class="text-right col-2 font-weight-bold col-form-label">Search ID: </label>
                            <div class="col-sm-6">
                                <input type="text" name="key" class="form-control" id="inputBorrowerFirstName"
                                    placeholder="Enter NID number of borrower" required>
                            </div>
                            <div class="col-sm-3">
                                <input type="submit" class="btn btn-lg btn-primary btn-block" name="search" value="Search">
                            </div>
                        </div>

                    </form>
                    
                    <div >
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"
                            name="myform" id="myform">
                          
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="borrower_name" class="form-control"
                                        value="<?php echo $name; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">ID</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="b_id" class="form-control" value="<?php echo $b_id; ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Loan amount</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="number" onkeyup="calculateEMI()" name="loan_amount"
                                        class="form-control" id="loanamount" placeholder="Enter expected loan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Percentage</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="number" onkeyup="calculateEMI()" name="loan_percent"
                                        class="form-control" id="loanpercentage" placeholder="Enter loan percent"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Number of installments</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="number" onkeyup="calculateEMI()" name="installments"
                                        class="form-control" placeholder="Enter installments number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Total return amount</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="total_amount" class="form-control" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">EMI</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="borrower_emi" class="form-control positive-integer"
                                        id="inputBorrowerMobile" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="borrower_files" class="col-sm-12 col-md-2 col-form-label">additional Docs <br>(doc, docx, and pdf only)</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="file" name="borrower_files" required>
                                </div>
                            </div>
                            <div class="btn-list">
                                <div class="input-group  mb-0">
                                <input type="submit" name="submit_loan_application" class="btn btn-lg btn-primary btn-block" value="Submit Application">

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