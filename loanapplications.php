<?php
include_once "includes/header.php";
include_once "includes/sidebar.php";
?>






<div class="mobile-menu-overlay"></div>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Loan Applications</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">Loans</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Applications
								</li>
							</ol>
						</nav>
					</div>

				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Applied Loans</h4>
					<p class="mb-0">
						all loans

					</p>
				</div>
				<div class="pb-20">
					<table class="data-table table  hover nowrap">
						<thead>
							<tr>
								<th>Name</th>
								<th>Nid</th>
								<th>DOB</th>
								<th>ExpectedLoan</th>
								<th>Percentage</th>
								<th>Inst</th>
								<th>TotalLoan</th>
								<th>EMI</th>
								<th>Documents</th>
								<th>Report</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$all = $ml->viewLoanApplication();
							if ($all) {
								$i = 1;
								while ($row = $all->fetch_assoc()) {
									$i++;

									?>
									<tr>
										<td class="table-plus">
											<?php echo $row['name']; ?>
										</td>
										<td>
											<?php echo $row['nid']; ?>
										</td>
										<td>
											<?php echo $row['dob']; ?>
										</td>
										<td>
											<?php echo $row['expected_loan']; ?> tk
										</td>
										<td>
											<?php echo $row['loan_percentage']; ?>%
										</td>
										<td>
											<?php echo $row['installments']; ?>
										</td>
										<td>
											<?php echo $row['total_loan']; ?> tk
										</td>
										<td>
											<?php echo $row['emi_loan']; ?> tk/month
										</td>
										<td><a class="btn btn-outline-success btn-sm" href="<?php echo $row['files']; ?>">download</a></td>
										<td><a target="_blank" class="btn btn-outline-success btn-sm"
												href="loan_app_report.php?loan_id=<?php echo $row['id']; ?>">report</a></td>
										<td>
											<?php if ($row['status'] == 3) {
												echo "<label class='badge badge-success'>Approved</label>";
												//echo "<a href='#' class='btn btn-outline-success btn-sm'>Pay Loan</a>";
											} else {
												echo "<label class='badge badge-warning'>Pending</label>";
											}

											?>
										</td>
									</tr>
									<?php
								}
							}
							?>
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