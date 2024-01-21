<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$bname = $res[0]['bname'];
	$burl = $res[0]['burl'];
	$iconimgae = $res[0]['iconimgae'];

} else {
	$id = "0";
	$bname = "";
	$burl = "";
	$iconimgae = "";

}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Adminnewcontroller/brandsave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Add Brand</h3>
							</div>

							<?php if($this->session->flashdata('msg')): ?>
							<div class="alert alert-success" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php endif; ?>
							<div class="card-body">
								<input type="hidden" name="oldid" value="<?=$id?>">
								<input type="hidden" name="oldiconimgae" value="<?=$iconimgae?>">


								<div class="col-12">
									<div class="form-group">
										<label for="title">Brand Name<span class=" ">*</span></label>
										<input type="text" required name="bname" class="form-control" id="title" 
										value="<?=$bname?>">
									</div>
								</div>
<!-- 


								

								<div class="col-12">
									<div class="form-group">
										<label for="title">URL<span class=" ">*</span></label>
										<input type="text"  name="burl" class="form-control" id="title" 
										value="<?=$burl?>">
									</div>
								</div>


 -->

								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="iconimgae">
									<?php if($iconimgae!="") { ?>
										Change Feature Image
										<?php }else{?>
											Upload Feature Image
										<?php } ?>
											
											<span class=" ">*</span></label>
										<input type="file"  name="iconimgae" class="form-control" id="iconimgae">
										</div>
									</div>
									<?php if($iconimgae!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$iconimgae?>">
									</div>
									<?php } ?>
									
								</div>
								<br>

								

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