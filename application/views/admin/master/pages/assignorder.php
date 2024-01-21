<?php
$orderrowid =  $this->uri->segment('3');
$ordres = $this->db->query("select * from  ordertbl where id='$orderrowid'")->result_array();
if(isset($ordres)) {
	$franchiseid = $ordres[0]['franchiseid'];
} else {
	$franchiseid = "0";
}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Managepage/assignsave" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Assign Order</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

								<div class="alert alert-success" role="alert" style="margin-top: 25px;">

									<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">

								<input type="hidden" name="oldid" value="<?=$orderrowid?>">



								<div class="col-12">

									<div class="form-group">

										<label for="title">Assign this order to:<span class="required">*</span></label>

										<select name="franchiseid" required class="form-control">
											<option value="">-Select Franchisee-</option>
											<?php 
											$users = $this->db->query("select * from user where usertype='Franchise'")->result_array();
											foreach($users as $urows)
											{
												?>
												<option value="<?=$urows['id']?>" <?php if($franchiseid==$urows['id']){echo "selected";} ?>>
													<?=$urows['fullname']?></option>
											<?php } ?>
										</select>
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