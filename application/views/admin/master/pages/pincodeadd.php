<?php

if(isset($res)) {

	$id = $res[0]['id'];

	$pin = $res[0]['pin'];
	$delivery_charges = $res[0]['delivery_charges'];

} else {

	$id = "0";

	$pin = "";
	$delivery_charges = "";

}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Managepage/pincodesave" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Pincode Add</h3>

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

										<label for="title">Pincode<span class="required">*</span></label>

										<input type="text" name="pin" class="form-control" id="pin" 

										value="<?=$pin?>">

									</div>

								</div>


								<div class="col-12">

									<div class="form-group">

										<label for="title">Delievry Chargess<span class="required">*</span></label>

										<input type="text" name="delivery_charges" class="form-control" id="delivery_charges" 

										value="<?=$delivery_charges?>">

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