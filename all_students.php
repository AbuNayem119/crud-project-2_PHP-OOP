<?php

	include_once "template/header.php";
	include_once "vendor/autoload.php";
	use App\Controllers\Student;
	$student = new Student;


	$data = $student -> student_all();





?>

			
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Cell</th>
										<th>Address</th>
										<th>Action</th>
										
									</tr>
								</thead>

					<?php
					
						while( $all_data = $data -> fetch_object()):

					?>

								<tbody>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="img/student/<?php echo $all_data -> image ?>" alt="User Image"></a>
												<a href="#"><?php echo $all_data -> name ?></a>
											</h2>
										</td>
										<td><?php echo $all_data -> email ?></td>
										
										<td><?php echo $all_data -> cell ?></td>
										
										<td><?php echo $all_data -> address ?></td>
										
										<td>
											<a class="btn btn-info btn-sm" href="Show_stu.php?stu_id=<?php echo $all_data -> stu_id ?>">Show</a>
											<a class="btn btn-warning btn-sm" href="update_stu.php?stu_id=<?php echo $all_data -> stu_id ?>">Update</a>
											<a class="btn btn-danger btn-sm" href="?stu_id=<?php echo $all_data -> stu_id ?>">Delete</a>
										</td>
									</tr>
								</tbody>

								<?php endwhile; ?>

							</table>
						</div>
					</div>
				</div>
			</div>			
		</div>
		
	</div>			
</div>
<!-- /Page Wrapper -->


<?php include_once "template/footer.php" ?>

