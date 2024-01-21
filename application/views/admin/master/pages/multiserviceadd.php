<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$featureimg = $res[0]['featureimg'];
	$iconimgae = $res[0]['iconimgae'];
	$servicename = $res[0]['servicename'];
	$description = $res[0]['description'];
	$url = $res[0]['url'];
} else {
	$id = "0";
	$iconimgae = "";
	$featureimg = "";
	$servicename = "";
	$description = "";
	$url = "";
}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Managepage/multiservicesave" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Multi Services Add</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

							<div class="alert alert-success" role="alert" style="margin-top: 25px;">

								<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">

								<input type="hidden" name="oldid" value="<?=$id?>">

								<input type="hidden" name="oldiconimgae" value="<?=$iconimgae?>">
								<input type="hidden" name="oldfeatureimg" value="<?=$featureimg?>">

								<input type="hidden" name="url" value="<?=$url?>">

								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="featureimg">
									<?php if($featureimg!="") { ?>
										Change Feature Image
										<?php }else{?>
											Upload Feature Image
										<?php } ?>
											
											<span class="required">*</span></label>
										<input type="file" name="featureimg" class="form-control" id="featureimg">
										</div>
									</div>
									<?php if($featureimg!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$featureimg?>">
									</div>
									<?php } ?>
									
								</div>

								<div class="col-12">

									<div class="col-6">

										<div class="form-group">

										<label for="iconimgae">

									<?php if($iconimgae!="") { ?>

										Change Logo

										<?php }else{?>

											Upload Logo

										<?php } ?>

											

											<span class="required">*</span></label>

										<input type="file" name="iconimgae" class="form-control" id="iconimgae">

										</div>

									</div>

									<?php if($iconimgae!="") { ?>

									<div class="col-6">

										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$iconimgae?>">

									</div>

									<?php } ?>

									

								</div>



								<div class="col-12">

									<div class="form-group">

										<label for="servicename">Service Name<span class="required">*</span></label>

										<input type="text" name="servicename" class="form-control" id="servicename" value="<?=$servicename?>">

									</div>

									<div class="form-group">

										<label for="servicename">Service Description<span class="required">*</span></label>

										<textarea name="description" class="form-control editor"><?=$description;?></textarea>

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