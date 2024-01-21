<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$code = $res[0]['code'];
	$discamt = $res[0]['discamt'];
	$validto = $res[0]['validto'];
} else {
	$id = "0";
	$code = "";
	$discamt = "";
	$validto = "";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Managepage/couponsave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Coupon Add</h3>
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
										<label for="title">Coupon Code<span class="required">*</span></label>
										<input type="text" name="code" class="form-control" id="code" 
										value="<?=$code?>">
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title">Discount Percentage(%)<span class="required">*</span></label>
										<input type="text" name="discamt" class="form-control" id="discamt" 
										value="<?=$discamt?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Valid To <span class="required">*</span></label>
										<input type="date" name="validto" class="form-control" id="validto" 
										value="<?=$validto?>">
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