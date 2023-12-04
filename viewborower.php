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
							<h4>RegisteredUsers</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">Admin</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Users
								</li>
							</ol>
						</nav>
					</div>

				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Registered Users</h4>
					<p class="mb-0">
						all users

					</p>
				</div>
				<div class="pb-20">
					<table class="data-table table  hover ">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Name</th>
								<th>Nid</th>
								<th>gender</th>
								<th>mobile</th>
								<!-- <th>email</th> -->
								<th>DOB</th>
								<!-- <th>address</th> -->
								<th>working status</th>
								<!-- <th>Image</th> -->
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$all = $emp->viewBorrower();
							if ($all) {
								$i = 1;
								while ($row = $all->fetch_assoc()) {
									$i++;

									?>
									<tr>
										<td>
											<?php echo $row['name']; ?>
										</td>
										<td>
											<?php echo $row['nid']; ?>
										</td>
										<td>
											<?php echo $row['gender']; ?>
										</td>
										<td>
											<?php echo $row['mobile']; ?>
										</td>
										<!-- <td>
											<?php
											//  echo $row['email']; 
											 ?>
										</td> -->
										<td>
											<?php echo $row['dob']; ?>
										</td>
										<!-- <td>
											<?php
											//  echo $row['address'];
											  ?>
										</td> -->
										<td>
											<?php echo $row['working_status']; ?>
										</td>
										<!-- <td><img style="width:80px;height:70px;" src="<?php
										//  echo $row['image']; 
										 ?>" alt=""></td> -->
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
													<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
													<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
												</div>
											</div>
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