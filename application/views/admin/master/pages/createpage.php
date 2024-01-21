<?php

if(isset($res)) {

	$id = $res[0]['id'];

	$pgname = $res[0]['pgname'];

	$pgurl = $res[0]['pgurl'];
	$homepgshowing = $res[0]['homepgshowing'];



} else {

	$id = "0";

	$pgname = "";

	$pgurl = "";
	$homepgshowing ="";

}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Managepage/pagesave" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Page</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

							<div class="alert alert-success" role="alert" style="margin-top: 25px;">

								<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">

								<input type="hidden" name="oldid" value="<?=$id?>">

								<div class="col-12">

									<div class="form-group">

										<label for="pgname">Page Name<span class="required">*</span></label>

										<input type="text" name="pgname" class="form-control" id="pgname" value="<?=$pgname?>" required>

									</div>

									<div class="form-group">

										<label for="pgname">Showing in Top Menu<span class="required">*</span></label>

										<select name="homepgshowing" class="form-control" required>
											<option value="">-Select One-</option>
											<option value="1" <?php if($homepgshowing=="1"){echo "selected";}?>>Yes</option>
											<option value="0" <?php if($homepgshowing==0){echo "selected";} ?>> No</option>
										</select>

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