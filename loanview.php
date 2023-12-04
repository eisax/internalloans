<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";

if (isset($_GET['loan_id']) && isset($_GET['b_id'])) {
    $loan_id = $_GET['loan_id'];
    $b_id = $_GET['b_id'];
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
                            <h4>Loan Info</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Loan</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    info
                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
            <?php
            $borrower = $emp->findBorrowerById($b_id);
            if ($borrower) {
                while ($row = $borrower->fetch_assoc()) {
                    ?>
                    <div class="card-box mb-30">
                        <div class="list-group">
                            <a class="list-group-item"> <strong>Name:</strong>
                                <?php echo $row['name']; ?>
                            </a>
                            <a class="list-group-item"><strong>NID:</strong>
                                <?php echo $row['nid']; ?>
                            </a>
                            <a class="list-group-item"><strong>Date of birth:</strong>
                                <?php echo $row['dob']; ?>
                            </a>
                            <a class="list-group-item"><strong>Phone:</strong>
                                <?php echo $row['mobile']; ?>
                            </a>
                            <a class="list-group-item"><strong>Address:</strong>
                                <?php echo $row['address']; ?>
                            </a>

                        </div>
                    </div>

                    <?php
                }
            }
            ?>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Loan Payment history</h4>
                    <p class="mb-0">
                        records

                    </p>
                </div>


                <div class="pb-20">
                    <table class="data-table table  hover ">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Pay Date</th>
                                <th>Amount paid</th>
                                <th>Installment</th>
                                <th>Fine</th>
                                <th>Payment report</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $payment = $ml->findPayment($b_id, $loan_id);
                            $i = 0;
                            $sum = 0;
                            $inst = 0;

                            if ($payment) {

                                while ($pay = $payment->fetch_assoc()) {
                                    $i++;
                                    $sum = $sum + $pay['pay_amount'];
                                    $inst = $inst + $pay['current_inst'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $pay['pay_date']; ?>
                                        </td>
                                        <td>
                                            <?php echo $pay['pay_amount']; ?>
                                        </td>
                                        <td>
                                            <?php echo $pay['current_inst']; ?>
                                        </td>
                                        <td>
                                            <?php echo $pay['fine']; ?>
                                        </td>
                                        <td><a target="_blank"
                                                href="payment_report.php?loan_id=<?php echo $pay['loan_id']; ?>&pay_id=<?php echo $pay['id']; ?>&b_id=<?php echo $pay['b_id']; ?>">report</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                        <tfoot>
                            <th>Total:
                                <?php echo $i; ?>
                            </th>
                            <th></th>
                            <th>Total:
                                <?php echo $sum; ?>
                            </th>
                            <th>Total Completed Installment:
                                <?php echo $i; ?>
                            </th>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->



        </div>

    </div>
</div>
<!-- welcome modal start -->

<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="vendors/scripts/datatable-setting.js"></script>

</body>

</html>