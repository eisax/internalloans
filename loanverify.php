<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";

if (isset($_GET['loan_id'])) {
    $loan_id = $_GET['loan_id'];
}
?>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Verify Loan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Loan</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Verify
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <?php
            $all = $ml->getLoanById($loan_id);
            if ($all) {
                $row = $all->fetch_assoc();
            }
            ?>
            <div class="card-box mb-30">
                <div class="list-group">
                    <a class="list-group-item"> <strong>Name:</strong>
                        <?php echo $row['name']; ?>
                    </a>
                    <a class="list-group-item"><strong>Expected Loan:</strong>
                        $US
                        <?php echo $row['expected_loan']; ?>
                    </a>
                    <a class="list-group-item"><strong>Total Loan(including interest):</strong>
                        $US
                        <?php echo $row['total_loan']; ?>
                    </a>
                    <a class="list-group-item"><strong>EMI:</strong>
                        $
                        <?php echo $row['emi_loan']; ?>/month
                    </a>
                </div>
            </div>
            <div class="product-wrap">
                <div class="product-detail-wrap mb-30">
                    <div class="row">
                    </div>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $role_id = $_POST['role'];
                        $getStatus = $ml->getLoanVerificationStatus($loan_id, $role_id);
                        if ($getStatus) {
                            echo $getStatus;
                        }
                    }
                    ?>
                    <div class="pb-20">
                    </div>
                    <form action="" class="form" method="POST">
                        <?php
                        $role = Session::get('role');
                        ?>
                        <input type="hidden" name="role" value="<?php echo $role; ?>">
                        <table class="data-table table  hover ">
                            <thead>
                                <tr>
                                    <th>Verify as</th>
                                    <th>Verify</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>HOD</td>
                                    <td>
                                        <div class="form-check">

                                            <input type="checkbox" name="verify_list[]" class="form-check-input"
                                                id="checkbox104" <?php
                                                if ($row['status'] >= 1) {
                                                    echo "checked";
                                                }
                                                ?>
                                                <?php
                                                if ($row['status'] != 0 || $role != 1) {
                                                    echo "disabled";
                                                }
                                                ?> />

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Human Resource</td>
                                    <td>
                                        <div class="form-check">

                                            <input type="checkbox" name="verify_list[]"
                                                class="filled-in form-check-input" id="checkbox105" <?php
                                                if ($row['status'] >= 2) {
                                                    echo "checked";
                                                }
                                                ?> <?php
                                                 if ($row['status'] != 1 || $role != 2) {
                                                     echo "disabled";
                                                 }
                                                 ?> />

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>CFO/CEO</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label" for="checkbox106">
                                                <input type="checkbox" name="verify_list[]" class="form-check-input"
                                                    id="checkbox106" <?php
                                                    if ($row['status'] >= 3) {
                                                        echo "checked";
                                                    }
                                                    ?> <?php
                                                     if ($row['status'] != 2 || $role != 3) {
                                                         echo "disabled";
                                                     }
                                                     ?> />
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <div class="for-group">
                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Verify" <?php
                            if ($row['status'] >= 3)
                                echo "disabled";
                            ?> <?php
                             if ($row['status'] > 0 && $role == 1) {
                                 echo "disabled";
                             }
                             ?> <?php
                              if ($row['status'] != 1 && $role == 2) {
                                  echo "disabled";
                              }
                              ?> <?php
                               if ($row['status'] != 2 && $role == 3) {
                                   echo "disabled";
                               }
                               ?> />
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- welcome modal start -->


<!-- welcome modal end -->
<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<!-- Slick Slider js -->
<script src="src/plugins/slick/slick.min.js"></script>
<!-- bootstrap-touchspin js -->
<script src="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery(".product-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            speed: 1000,
            fade: true,
            asNavFor: ".product-slider-nav",
        });
        jQuery(".product-slider-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".product-slider",
            dots: false,
            infinite: true,
            arrows: false,
            speed: 1000,
            centerMode: true,
            focusOnSelect: true,
        });
        $("input[name='demo3_22']").TouchSpin({
            initval: 1,
        });
    });
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>

</html>