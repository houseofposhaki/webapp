<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$metaname = $res[0]['metaname'];
	$metadesc = $res[0]['metadesc'];
	$contentheadfirst = $res[0]['contentheadfirst'];
	$contentfirst = $res[0]['contentfirst'];
	$contentheadsecond = $res[0]['contentheadsecond'];
	$contentsecond = $res[0]['contentsecond'];

} else {
	$id = "0";
}

?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Managepage/supportsave" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Support </h3>
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
										<label for="contentheadfirst">Content Heaing<span class="required">*</span></label>
										<textarea name="contentheadfirst" id="contentheadfirst" class="form-control" required><?=$contentheadfirst?></textarea>
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="contentfirst">Content<span class="required">*</span></label>
										<textarea name="contentfirst" id="contentfirst" cols="30" rows="6" class="form-control editor" required><?=$contentfirst?></textarea>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="contentheadsecond">Second Heading<span class="required">*</span></label>
										<input type="text" name="contentheadsecond" class="form-control" 
										value="<?=$contentheadsecond?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="contentsecond">Second Part Content<span class="required">*</span></label>
										<textarea name="contentsecond" id="contentsecond" cols="30" rows="6" class="form-control editor" required><?=$contentsecond?></textarea>
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