<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$cname = $res[0]['cname'];
	$creview = $res[0]['creview'];
	$featureimg = $res[0]['featureimg'];
} else {
	$id = "0";
	$cname = "";
	$creview = "";
	$featureimg = "";

}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Managepage/reviewsave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Review Add</h3>
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
										<label for="title">Client Name<span class="required">*</span></label>
										<input type="text" name="cname" class="form-control" id="title" 
										value="<?=$cname?>">
									</div>
								</div>


								<input type="hidden" name="oldfeatureimg" value="<?=$featureimg?>">
								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="featureimg">
									<?php if($featureimg!="") { ?>
										Change  Image
										<?php }else{?>
											Upload  Image
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

								<div class="col-12">
									<div class="form-group">
										<label for="title">Client Reviews<span class="required">*</span></label>
										<textarea name="creview" class="form-control"><?=$creview?></textarea>
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