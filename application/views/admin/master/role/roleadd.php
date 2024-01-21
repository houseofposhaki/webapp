<?php
	if(isset($res[0]['id'])) {
		$id = $res[0]['id'];
		$rolename = $res[0]['rolename'];
	} else {
		$id = "0";
		$rolename = "";
	}
?>

<div class="content-wrapper mt-3">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
	 		<!-- form start -->
	 		<form name="" action="roleadd" method="post">
				<div class="row">
		 			<div class="col-md-12">
						<div class="card card-primary">
				 			<div class="card-header">
								<h3 class="card-title">Create New User Role</h3>
							</div>
							<div class="card-body">
					 			<input type="hidden" name="oldid" value="<?=$id?>">
								<div class="col-6">
									<div class="form-group">
										<label>Role Name:</label>
										<div class="input-group">
										<input type="text" name="rolename" class="form-control float-right" value="<?=$rolename;?>" required>
										</div>
									</div>
								</div>

								<div class="col-6">
									<input type="submit" class="btn btn-primary" name="submit" value="Save">
								</div>
							<!-- /.form group -->
							</div>
						</div>
					</div>
				</div>
			</form><!-- form end -->
		</div><!-- /.container-fluid -->
	</section>
</div>
