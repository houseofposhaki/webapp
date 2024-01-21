<?php

	if(!empty($res)) {

		$id = $res[0]['id'];

		$fullname = $res[0]['fullname'];

		$username = $res[0]['username'];

		$password = base64_decode($res[0]['password']);

		$usertype = $res[0]['usertype'];


		$pincode = $res[0]['pincode'];
		$mobile = $res[0]['mobile'];
		$address = $res[0]['address'];


	} else {

		$id = "0";

		$fullname = "";

		$username = "";

		$password = "";

		$usertype = "";


		
		$branchid = "";
		$pincode = "";
		$mobile = "";
		$address = "";

	}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/submituser" method="post">

				<div class="row">

		 			<div class="col-md-12">

						<div class="card card-primary">

			 				<div class="card-header">

								<h3 class="card-title">Create New User</h3>

							</div>

							<div class="card-body">

								<input type="hidden" name="oldid" value="<?=$id?>">

								<div class="col-6">

									<div class="form-group">

										<label>Full Name:</label>

										<div class="input-group">

											<input type="text" name="fullname" class="form-control float-right" value="<?=$fullname;?>"  >

										</div>

									</div>

								</div>



								<div class="col-6">
									<div class="form-group">
										<label>PINCODE:</label>
										<div class="input-group">
											<select name="pincode" class="form-control" required>
												<option value="">-Select Pincode-</option>
												<?php 
												$pinres = $this->db->query("select * from pincode")->result_array();
												foreach($pinres as $pinrows){
												?>
												<option value="<?=$pinrows['id']?>"  
													<?php if($pincode==$pinrows['id']){echo "selected"; } ?>>
													<?=$pinrows['pin']?>
													</option>
											<?php } ?>
											</select>

										</div>
									</div>
								</div>


								<div class="col-6">
									<div class="form-group">
										<label>Phone:</label>
										<div class="input-group">
											<input type="text" required name="mobile" class="form-control float-right" 
											value="<?=$mobile;?>" >

										</div>
									</div>
								</div>

					
								<div class="col-6">
									<div class="form-group">
										<label>Address:</label>
										<div class="input-group">
											<textarea name="address" class="form-control" required><?=$address?></textarea>
										</div>
									</div>
								</div>


								<div class="col-6">

									<div class="form-group">

										<label>Username:</label>

										<div class="input-group">

											<input type="text" class="form-control float-right" id="reservation" name="username" value="<?=$username?>" >

									 	</div>

								 	</div>

							 	</div>

								<div class="col-6">

									<div class="form-group">

										<label>Password:</label>

										<div class="input-group">

											<input type="text" class="form-control float-right" id="reservation" name="password" value="<?=$password?>">

										</div>

									</div>

								</div>

								<div class="col-6">

									<div class="form-group">

										<label>User Type:</label>

										<div class="input-group">

										<select class="form-control float-right" id="usertype" name="usertype" required>

											<option value="">-Select One-</option>

											<?php 

												$CI = &get_instance();

												$qry = $this->db->query("select * from userrole

													where id != 1")->result_array();

												foreach($qry as $row) {

											?>

												<option value="<?=$row['rolename']?>" <?php if($usertype==$row['rolename']){ echo "selected"; }?>><?=$row['rolename']?></option> 

											<?php } ?>      

										</select>

										</div>

									</div>

								</div>

								<div class="col-6">

									<input type="submit" class="btn btn-primary" name="save">

								</div>

							</div> <!-- /.card-body -->

						</div> <!-- /.card -->

					</div> <!-- /.col-md-12 -->

				</div>

			</form>

		</div><!-- /.container-fluid -->

	</section>

</div><!-- /.content-wrapper -->