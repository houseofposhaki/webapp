<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$gcode = $res[0]['gcode'];

} else {
	$id = "0";
	$gcode = "";
}
?>


<div class="content-wrapper mt-3">
	<section class="content">
		<div class="container-fluid">
			<form name="" action="<?php echo base_url()?>admin/Managepage/gadssave" method="post" 
				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Google Ads Script</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

							<div class="alert alert-success" role="alert" style="margin-top: 25px;">

								<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">

								<input type="hidden" name="oldid" value="1">

								<div class="col-12">
									<div class="form-group">
										<label for="stepno">Google Ads Code(Put only function code here..)</label>
										<textarea name="gcode" class="form-control"><?php echo $gcode; ?></textarea>
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

</div>