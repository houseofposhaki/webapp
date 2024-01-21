<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$stepno = $res[0]['stepno'];
	$steptitle = $res[0]['steptitle'];
	$stepdesc = $res[0]['stepdesc'];
	$iconimgae = $res[0]['iconimgae'];
	$metaname = $res[0]['metaname'];
	$metatag = $res[0]['metatag'];
	$metatitle = $res[0]['metatitle'];
	$metadescription = $res[0]['metadescription'];
	$content1 = $res[0]['content1'];
	$content2 = $res[0]['content2'];
	$content3 = $res[0]['content3'];
	$button1 = $res[0]['button1'];
	$link1 = $res[0]['link1'];
	$button2 = $res[0]['button2'];
	$link2 = $res[0]['link2'];
	$ganalytic = $res[0]['ganalytic'];

} else {
	$id = "0";
	$stepno = "";
	$steptitle = "";
	$stepdesc = "";
	$iconimgae = "";
	$metaname = "";
	$metatag = "";
	$metatitle = "";
	$metadescription = "";
	$content1 = "";
	$content2 = "";
	$content3 = "";
	$button1 = "";
	$link1 = "";
	$button2 = "";
	$link2 = "";
	$ganalytic = "";
}
?>


<div class="content-wrapper mt-3">
	<section class="content">
		<div class="container-fluid">
			<form name="" action="<?php echo base_url()?>admin/Managepage/homecmssave" method="post" 
				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Google Analytics code</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

							<div class="alert alert-success" role="alert" style="margin-top: 25px;">

								<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">

								<input type="hidden" name="oldid" value="1">

								<input type="hidden" name="oldiconimgae" value="<?=$iconimgae?>">


								<div class="col-12">
									<div class="form-group">
										<label for="stepno">Google Analytics Code(Put only function code here..)</label>
										<textarea name="ganalytic" class="form-control"><?=$ganalytic?></textarea>
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