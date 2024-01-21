<?php
$orderno = $this->uri->segment('4');
$maintblres = $this->db->query("select * from ordertbl where orderno='".$orderno."' ")->result_array();
if(!empty($maintblres))
{	
	$name = $maintblres[0]['name'];
	$mobile = $maintblres[0]['mobile'];
	$grandtot = $maintblres[0]['grandtot'];
	$ordstatus = $maintblres[0]['ordstatus'];
	$address = $maintblres[0]['address'];
	$landmark = $maintblres[0]['landmark'];
	$pincode = $maintblres[0]['pincode'];
	$specialinstruction = $maintblres[0]['specialinstruction'];
	$userid = $maintblres[0]['userid'];
	$featureimg = $maintblres[0]['featureimg'];
	$comment = $maintblres[0]['comment'];
	$doctorname = $maintblres[0]['doctorname'];
	$patientname = $maintblres[0]['patientname'];
	$paymode = $maintblres[0]['paymode'];
	$paidstatus = $maintblres[0]['paidstatus'];

	$shipping_name = $maintblres[0]['shipping_name'];
	$shipping_mobile = $maintblres[0]['shipping_mobile'];
	$shipping_address = $maintblres[0]['shipping_address'];
	$shipping_pincode = $maintblres[0]['paidstatus'];





}else{
	$name="";
	$mobile="";
	$grandtot="";
	$ordstatus="";
	$address = "";
	$landmark = "";
	$pincode = "";
	$specialinstruction = "";
	$userid="";
	$featureimg="";
	$comment="";
	$doctorname="";
	$patientname="";
	$paymode="";
	$paidstatus="";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Adminnewcontroller/orderupdate" method="post" 
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
							<div class="row card-body">

				<input type="hidden" name="updatebyuserid" value="<?=$this->session->userdata['logged_in']['id']?>">

								<div class="breadcrumb col-12">
							<p><h6><b>Billing Address</b></h6></p>
						</div>
								<div class="col-6">
									<div class="form-group">
										<label for="featured">Name</label>: <?=$name?>
									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<label for="featured">Mobile</label>: 
										<input type="text" class="form-control" name="mobile" value="<?=$mobile?>">
									</div>
								</div>





								<div class="col-6">
									<div class="form-group">
										<label for="featured">Address</label>:
										<input type="text" class="form-control" name="address" value="<?=$address?>">

									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<label for="featured">Landmark</label>: <?=$landmark?>
									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<label for="featured">Special Instruction </label>: <?php echo $specialinstruction; ?>
									</div>
								</div>

								<div class="col-6">
									<div class="form-group">
										<label for="featured">Grand Total </label>: <?php echo $grandtot; ?>
									</div>
								</div>


								<div class="col-6">
									<div class="form-group">
										<label for="featured">Pay Mode </label>:
										<?php if($paymode=="COD"){ ?>
											COD
										<?php }else {?>
											Online
										<?php }  ?>
									</div>
								</div>
								<div class="row col-md-12">

									<div class="breadcrumb col-12">
							<p><h6><b>Shipping Address</b></h6></p>
						</div>
										<div class="col-6">
											<div class="form-group">
												<label for="title">Shipping Name:</label> <?=$shipping_name?>
										<input type="text" class="form-control" name="shipping_name" value="<?=$shipping_name?>">

											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="title">Shipping Mobile:</label>
										<input type="text" class="form-control" name="shipping_mobile" value="<?=$shipping_mobile?>">
											</div>
										</div>
									</div>
								<div class="row col-md-12">
										<div class="col-6">
											<div class="form-group">
												<label for="title">Shipping Address:</label>
										<input type="text" class="form-control" name="shipping_address" value="<?=$shipping_address?>">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="title">Shipping Pincode:</label> <?=$shipping_pincode?>
										<input type="text" class="form-control" name="shipping_pincode" value="<?=$shipping_pincode?>">
											</div>
										</div>
									</div>


								<div class="row col-md-12">
								<div class="col-md-6">
									<div class="form-group">
										<label for="featured">Order Status </label>
										<select name="ordstatus" required class="form-control">
											<option value="">-Select Status</option>
											<option value="Pending" <?php if($ordstatus=="New"){echo "selected"; } ?>>New</option>
											<option value="Pending" <?php if($ordstatus=="Pending"){echo "selected"; } ?>>Pending/Hold</option>
											<option value="Processing" <?php if($ordstatus=="Processing"){echo "selected"; } ?>>Processing</option>
											<option value="Delivered" <?php if($ordstatus=="Delivered"){echo "selected"; } ?>>Delivered</option>
										</select>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label for="featured">Payment  Status </label>
										<select name="paidstatus" required class="form-control">
											<option value="">-Payment Status</option>
											<option value="1" <?php if($paidstatus=="1"){echo "selected"; } ?>>Paid</option>
											<option value="0" <?php if($paidstatus=="0"){echo "selected"; } ?>>Non Paid</option>
										</select>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="featured">Purpose / Comment: </label>: 
										<textarea name="comment" class="form-control"><?=$comment?></textarea>
									</div>
								</div>
							</div>





								<!-- <div class="row col-md-12">
									<div class="col-md-3"><label>Item</label></div>
									<div class="col-md-2"><label>Batch</label></div>
									<div class="col-md-2"><label>Exp Date</label></div>
									<div class="col-md-1"><label>Price</label></div>
									<div class="col-md-1"><label>Qty</label></div>
									<div class="col-md-1"><label>Total</label></div>
								</div>
 -->

								<div id="child" style="margin-bottom: 340px;">
									<?php 
									$childres = $this->db->query("select * from cart where orderno='$orderno'")->result_array();
									if(!empty($childres)){
										$slno = 1;
										foreach($childres as $childrows) {
											?>
											<?php 
											//include "adstimeedit.php";
											?>
											<br>
										<?php  $slno++;}  ?>
									<?php }else { ?>
										<?php 
										//include "adstimeedit.php";
										?>
										<br>
									<?php } ?>
								</div>

							</br>
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


<script>
	function rowadd_new()
	{
		var cnt = $('.slno').length;
		cnt = cnt +1;
		$.ajax({
			type:'POST',
			url:'<?php echo base_url(); ?>admin/Adminnewcontroller/add_row_edit',
			data:'a='+cnt,
			success:function(data){
				$("#child").append(data);
			}
		});
	}
</script>