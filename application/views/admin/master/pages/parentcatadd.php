<?php

if(isset($res)) {

	$id = $res[0]['id'];

	$title = $res[0]['title'];

	$description = $res[0]['description'];

	$ispopular = $res[0]['ispopular'];

	$srno = $res[0]['srno'];

	$adscript = $res[0]['adscript'];

	$featureimg = $res[0]['featureimg'];
	$mobilefeatureimg = $res[0]['mobilefeatureimg'];



} else {

	$id = "0";

	$title = "";

	$description = "";

	$ispopular = "";

	$srno = "";

	$adscript = "";

	$featureimg = "";
	$mobilefeatureimg = "";

}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Managepage/parentcatsave" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Parent/Main Category Add</h3>

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

										<label for="title">Title<span class="required">*</span></label>

										<input type="text" name="title" class="form-control" id="title" 

										value="<?=$title?>">

									</div>

								</div>







								<!-- <input type="hidden" name="oldfeatureimg" value="<?=$featureimg?>">

								<div class="col-12">

									<div class="col-6">

										<div class="form-group">

										<label for="featureimg">

									<?php if($featureimg!="") { ?>

										Change Feature Image

										<?php }else{?>

											Upload Feature Image

										<?php } ?>

											<span class=" ">*</span></label>

										<input type="file"  name="featureimg" class="form-control" id="featureimg">

										</div>

									</div>

									<?php if($featureimg!="") { ?>

									<div class="col-6">

										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$featureimg?>">

									</div>

									<?php } ?>

								</div>
 -->


								

								<div class="col-12">

									<div class="form-group">

										<label for="featured">Special Category<span class=" ">*</span></label>

										<input type="checkbox" name="ispopular" value="1"

										<?php if($ispopular=="1"){echo "checked"; } ?>>

									</div>

								</div>





								<!-- <div class="col-12">

									<div class="form-group">

										<label for="srno">Serial No<span class="required">*</span></label>

										<input type="text" name="srno" class="form-control" id="srno" 

										value="<?=$srno?>">

									</div>

								</div>
 -->






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