<?php

if(isset($res)) {

	$id = $res[0]['id'];

	$metaname = $res[0]['metaname'];

	$metadesc = $res[0]['metadesc'];

	$pgtitle = $res[0]['pgtitle'];

	$mapiframe = $res[0]['mapiframe'];

	$address = $res[0]['address'];

	$contactinfo = $res[0]['contactinfo'];

	$contentarea2 = $res[0]['contentarea2'];



	$email = $res[0]['email'];

	$fburl = $res[0]['fburl'];

	$twitterurl	 = $res[0]['twitterurl'];

	$instaurl = $res[0]['instaurl'];

	



} else {

	$id = "0";

}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Managepage/contactsave" method="post">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Contact</h3>

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

										<label for="address">Address<span class="required">*</span></label>

										<textarea name="address" id="address" cols="30" rows="6" class="form-control editor" required><?=$address?></textarea>

									</div>

								</div>



								<div class="col-12">

									<div class="form-group">

										<label for="contactinfo">Contact Info<span class="required">*</span></label>

										<input type="text" name="contactinfo" id="contactinfo" value="<?=$contactinfo?>" class="form-control" >

									</div>

								</div>



								<div class="col-12">

									<div class="form-group">

										<label for="email">Business Email<span class="required">*</span></label>

										<input type="email" name="email" class="form-control" 

										value="<?=$email?>">

									</div>

								</div>

								<div class="col-12">

									<div class="form-group">

										<label for="fburl">Facebook URL<span class="required">*</span></label>

										<input type="text" name="fburl" class="form-control" 

										value="<?=$fburl?>">

									</div>

								</div>

								<div class="col-12">

									<div class="form-group">

										<label for="twitterurl">Twitter URL<span class="required">*</span></label>

										<input type="text" name="twitterurl" class="form-control" 

										value="<?=$twitterurl?>">

									</div>

								</div>

								<div class="col-12">

									<div class="form-group">

										<label for="instaurl">Instagram URL<span class="required">*</span></label>

										<input type="text" name="instaurl" class="form-control" 

										value="<?=$instaurl?>">

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