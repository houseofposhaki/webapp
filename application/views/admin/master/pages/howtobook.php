<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$metaname = $res[0]['metaname'];
	$metadesc = $res[0]['metadesc'];
	$heading = $res[0]['heading'];
	$description = $res[0]['description'];
} else {
	$id = "0";
	$metaname="";
	$metadesc="";
	$heading = "";
	$description = "";
}

?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Managepage/howtobooksave" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">How to Book </h3>
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
										<label for="metaname">Metaname<span class="required">*</span></label>
										<input type="text" name="metaname" class="form-control" 
										value="<?=$metaname?>">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="metadesc">Meta Description<span class="required">*</span></label>
										<textarea  name="metadesc" class="form-control"><?=$metadesc?></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="heading">Heading<span class="required">*</span></label>
										<input type="text" name="heading" class="form-control" 
										value="<?=$heading?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="description">Content Heaing<span class="required">*</span></label>
										<textarea name="description" id="description" class="form-control" required><?=$description?></textarea>
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