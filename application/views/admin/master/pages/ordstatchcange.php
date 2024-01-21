<?php
$orderno = $this->uri->segment('4');
$maintblres = $this->db->query("select * from ordertbl where orderno='".$orderno."' ")->result_array();
if(!empty($maintblres))
{	
	$name = $maintblres[0]['name'];
	$mobile = $maintblres[0]['mobile'];
	$grandtot = $maintblres[0]['grandtot'];
	$ordstatus = $maintblres[0]['ordstatus'];
	$userid = $maintblres[0]['userid'];

}else{
	$name="";
	$mobile="";
	$grandtot="";
	$ordstatus="";
	$userid="";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Adminnewcontroller/updordstatus" method="post" 
				enctype="multipart/form-data">
				<input type="hidden" name="orderno" value="<?=$orderno?>">
				<input type="hidden" name="userid" value="<?=$userid?>">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Order Update</h3>
							</div>

							<?php if($this->session->flashdata('msg')): ?>
								<div class="alert alert-success" role="alert" style="margin-top: 25px;">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php endif; ?>
							<div class="card-body">

								<div class="col-6">
									<div class="form-group">
										<label for="featured">Name</label>: <?=$name?>
									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<label for="featured">Mobile</label>: <?=$mobile?>
									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<label for="featured">Grand Total </label>: <?php echo $grandtot; ?>
									</div>
								</div>


								<div class="col-6">
									<div class="form-group">
										<label for="featured">Order Status </label>
										<select name="ordstatus" required class="form-control">
											<option value="">-Select Status</option>
											<option value="Pending" <?php if($ordstatus=="Pending"){echo "selected"; } ?>>Pending</option>
											<option value="Hold" <?php if($ordstatus=="Hold"){echo "selected"; } ?>>Hold</option>
											<option value="Processing" <?php if($ordstatus=="Processing"){echo "selected"; } ?>>Processing</option>
											<option value="Delivered" <?php if($ordstatus=="Delivered"){echo "selected"; } ?>>Delivered</option>
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

