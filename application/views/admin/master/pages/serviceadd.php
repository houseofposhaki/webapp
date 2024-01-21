<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$metaname = $res[0]['metaname'];
	$metadesc = $res[0]['metadesc'];
	$iconimgae = $res[0]['iconimgae'];
	$contenthead1 = $res[0]['contenthead1'];
	$contentdesc1 = $res[0]['contentdesc1'];
	$contenthead2 = $res[0]['contenthead2'];
	$contentdesc2 = $res[0]['contentdesc2'];
	$contenthead3 = $res[0]['contenthead3'];
	$contentdesc3 = $res[0]['contentdesc3'];

} else {
	$id = "0";
	$metaname="";
	$metadesc="";
	$iconimgae="";
	$contenthead1="";
	$contentdesc1="";
	$contenthead2="";
	$contentdesc2="";
	$contenthead3="";
	$contentdesc3="";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Managepage/servicesave" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Service</h3>
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
										<label for="metaname">Meta Name<span class="required">*</span></label>
										<input type="text" name="metaname" class="form-control" 
										value="<?=$metaname?>">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="metadesc">Meta Description<span class="required">*</span></label>
										<textarea name="metadesc" id="metadesc" class="form-control" required><?=$metadesc?></textarea>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="contenthead1">First Section Titlte<span class="required">*</span></label>
										<input type="text" name="contenthead1" id="contenthead1" class="form-control" value="<?=$contenthead1?>" required>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="contentdesc1">First Section Description<span class="required">*</span></label>
										<textarea name="contentdesc1" id="contentdesc1" cols="30" rows="6" class="form-control editor" required><?=$contentdesc1?></textarea>
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="contenthead2">Second Section Titlte<span class="required">*</span></label>
										<input type="text" name="contenthead2" id="contenthead2" class="form-control" required value="<?=$contenthead2?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="contentdesc2">Second Section Description<span class="required">*</span></label>
										<textarea name="contentdesc2" id="contentdesc2" cols="30" rows="6" class="form-control editor" required><?=$contentdesc2?></textarea>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="contenthead3">Third Section Titlte<span class="required">*</span></label>
										<input type="text" name="contenthead3" id="contenthead3" class="form-control" required value="<?=$contenthead3?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="contentdesc3">Third Section Description<span class="required">*</span></label>
										<textarea name="contentdesc3" id="contentdesc3" cols="30" rows="6" class="form-control editor" required><?=$contentdesc3?></textarea>
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