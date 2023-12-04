<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Dashboard</h2>
        </div>

        <div class="row clearfix progress-box">
            
            <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div class="progress-box text-center">
                        <?php

                        // $all = $ml->getNotApproveLoan();
                        // echo $all;
                        
                        ?>
                        <input type="text" class="knob dial1" value="7" placeholder="" data-width="120"
                            data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff"
                            data-fgColor="#1b00ff" data-angleOffset="180" readonly />
                        <h5 class="text-light-blue padding-top-10 h5">
                            Pending Loan Applications
                        </h5>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div class="progress-box text-center">
                        <?php
                        // $all = $emp->viewBorrower();
                        // if ($all) {
                        //     $count = $all->num_rows;
                        //     echo $count;
                        // } else {
                        //     echo "0";
                        // }

                        ?>
                        <input type="text" class="knob dial2" value="12" data-width="120" data-height="120"
                            data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091"
                            data-angleOffset="180" readonly />
                        <h5 class="text-light-green padding-top-10 h5">
                            Registered
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div class="progress-box text-center">
                        <?php

                        // $all = $ml->getAllApproveLoan();
                        // echo $all;

                        ?>
                        <input type="text" class="knob dial3" value="90" data-width="120" data-height="120"
                            data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767"
                            data-angleOffset="180" readonly />
                        <h5 class="text-light-orange padding-top-10 h5">
                            Active Loans
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                <div class="card-box pd-30 height-100-p">
                    <div class="progress-box text-center">
                        <?php
                        // $money = $ml->totalPaidLoanAmount();
                        // if ($money) {
                        //     $result = $money->fetch_assoc();
                        //     echo $result['total_money'];
                        // }
                        ?>
                        <input type="text" class="knob dial4" value="65" data-width="120" data-height="120"
                            data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb"
                            data-angleOffset="180" readonly />
                        <h5 class="text-light-purple padding-top-10 h5">
                            Total Income
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">Recent Loan Applications</div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>NID</th>
                        <th>Phone</th>
                        <th> Address</th>
                        <th>Last Pay</th>
                        <th>Total Paid</th>
                        <th>Remaining</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="weight-600">Josphat K Ndhlovu</td>
                        <td>24-12345-X16</td>
                        <td>0785465060</td>
                        <td>1828 Westham</td>
                        <td>26-Mar-2023/td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">$3616.32<< /span>
                        </td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">$16625.68<<
                                    /span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>





                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
<script src="src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="vendors/scripts/dashboard2.js"></script>
</body>

</html>