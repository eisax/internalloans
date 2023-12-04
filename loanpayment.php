<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment_submit'])) {

    $inserted = $ml->payLoan($_POST);

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
                                <h4>Pay Loan</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Personal</a>
                                    </li>
                                    <li class="breadcrumb-item text-green " aria-current="page">
                                        pay
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
                        <h4 class="text-green h4">Pay Loan</h4>
                        <p class="mb-30">payment form</p>
                    </div>
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                        $nid = $_POST['key'];
                        $br = $emp->findBorrower($nid);

                        if ($br) {
                            $row = $br->fetch_assoc();
                            $name = $row['name'];
                            $b_id = $row['id'];
                            //var_dump($b_id);
                            // $total_loan = $row['total_loan'];
                            // $amount_paid = $row['amount_paid'];
                            $aploan = $ml->getApprovedLoanNotPaid($b_id);
                            if ($aploan) {
                                $loan = $aploan->fetch_assoc();

                                $loan_id_r = $loan['id'];
                                //var_dump($loan);
                                // var_dump($loan['nid']);
                            } else {
                                
                                ?>
                                <div id="successMessage" class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo "Loan not approved or already Paid!"; ?>
                                </div>
    
                                <?php
                            }

                        } else {

                            ?>
                            <div id="successMessage" class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo "Borrower National ID not martched or not applicable for loan"; ?>
                            </div>

                            <?php
                        }
                    }
                    ?>

                    <form action="" method="POST">
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

                    <div class="">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"
                            name="myform" id="myform">
                            <div class="header-search">



                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="borrower_name" class="form-control"
                                        id="inputBorrowerFirstName" value="<?php if (isset($name))
                                            echo $name; ?>" required readonly>
                                    <input type="hidden" name="b_id" value="<?php if (isset($b_id))
                                        echo $b_id; ?>">
                                    <input type="hidden" name="loan_id" value="<?php if (isset($loan['id']))
                                        echo $loan['id']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Payment amount(EMI)</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="number" name="payment" class="form-control" id="loanamount"
                                        value="<?php if (isset($loan['emi_loan']))
                                            echo $loan['emi_loan']; ?>" readonly>
                                </div>
                            </div>

                            <?php if (isset($loan['next_date'])) {

                                ?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Expected Last date of payment</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="date" class="form-control" id="nextdate"
                                            value="<?php echo $loan['next_date']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Next date of payment</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input type="date" name="next_date" class="form-control" id="nextdate"
                                            value="<?php echo date('Y-m-d', strtotime('+30 days', strtotime($loan['next_date']))); ?>"
                                            readonly>
                                    </div>
                                </div>

                                <?php
                                $current_date = strtotime(date('d-m-Y'));
                                $last_date = strtotime($loan['next_date']);
                                if ($current_date > $last_date) {
                                    //echo "You have fine";
                                    ?>
                                    <!-- fine claculation -->
                                    <div class="form-group row">
                                        <label class="text-right col-2 font-weight-bold col-form-label">Fine Calculation(2% of
                                            EMI):</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="fine_amount" class="form-control" value="<?php
                                            //calculate fine
                                            echo $loan['emi_loan'] * (2 / 100);
                                            ?>" readonly>
                                        </div>
                                    </div>


                                    <?php
                                }
                                ?>
                            <?php } ?>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Select Payment Date</label>
                                <div class="col-sm-12 col-md-10">
                                <input type="date"  name="pay_date" class="form-control" id="loanpercentage" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Current Installment</label>
                                <div class="col-sm-12 col-md-10">
                                <input type="number" name="current_inst" class="form-control"   value="<?php if(isset($loan['current_inst'])) echo $loan['current_inst']+1; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Remaining Installment</label>
                                <div class="col-sm-12 col-md-10">
                                <input type="number" name="remain_inst" class="form-control"   value="<?php if(isset($loan['remain_inst'])) echo $loan['remain_inst'] - 1; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="borrower_files" class="col-sm-12 col-md-2 col-form-label">Total Amount to be paid:</label>
                                <div class="col-sm-12 col-md-10">
                                <input type="number"  name="total_amount" class="form-control"   value="<?php if(isset($loan['total_loan'])) echo $loan['total_loan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="borrower_files" class="col-sm-12 col-md-2 col-form-label">Paid Amount</label>
                                <div class="col-sm-12 col-md-10">
                                <input type="number" name="paid_amount" class="form-control"  value="<?php if(isset($loan['amount_paid'])) echo $loan['amount_paid']+$loan['emi_loan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="borrower_files" class="col-sm-12 col-md-2 col-form-label">Amount Remaining</label>
                                <div class="col-sm-12 col-md-10">
                                <input type="number" name="remain_amount" class="form-control"  value="<?php if(isset($loan['amount_remain'])) echo $loan['amount_remain']; ?>" readonly>
                                </div>
                            </div>
                            <div class="btn-list">
                                <div class="input-group  mb-0">
                                    <input type="submit" name="payment_submit" class="btn btn-lg btn-primary btn-block" value="Submit Payment">

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