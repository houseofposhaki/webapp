<?php

if(!empty($res)) {

	$id = $res[0]['id'];
	$section = $res[0]['section'];
	$heading = $res[0]['heading'];
	$description = $res[0]['description'];
	$desc2 = $res[0]['desc2'];
} else {
	$id = "0";
	$section="";
	$heading="";
	$description="";
	$desc2="";
}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Sectioncontent/section6post" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Section 6 </h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

							<div class="alert alert-success" role="alert" style="margin-top: 25px;">

								<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">

								<input type="hidden" name="id" value="<?=$id?>">


								<div class="col-12">

									<div class="form-group">

										<label for="heading">Title<span class="required">*</span></label>

										<input type="text" name="heading" class="form-control" 

										id="heading" value="<?=$heading?>">

									</div>

								</div>



								<div class="col-12">

									<div class="form-group">

										<label for="description">Left Content Section<span class="required">*</span></label>
									<textarea name="description" class="form-control" id="stepdesc"><?=$description?></textarea>

									</div>

								</div>



								<div class="col-12">

									<div class="form-group">

										<label for="desc2">Right Content Section<span class="required">*</span></label>

										<textarea name="desc2" class="form-control editor" id="desc2"><?=$desc2?></textarea>

									</div>

								</div>



								<div class="col-6">

									<input type="submit" class="btn btn-primary" name="submit">

								</div>

							</div> <!-- /.card-body -->

						</div> <!-- /.card -->

					</div> <!-- /.col-md-12 -->

				</div>

			</form>

		</div><!-- /.container-fluid -->

	</section>

</div><!-- /.content-wrapper -->