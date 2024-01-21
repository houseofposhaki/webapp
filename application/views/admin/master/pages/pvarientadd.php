<?php
$productidis = $this->uri->segment('4');
if(isset($res)) {
	$id = $res[0]['id'];
	$productid = $res[0]['productid'];
	$userid = $res[0]['userid'];
	$colorid = $res[0]['colorid'];
	$sizeid = $res[0]['sizeid'];
	$wightid = $res[0]['wightid'];
	$qty = $res[0]['qty'];
	$saleprice = $res[0]['saleprice'];
	$offerprice = $res[0]['offerprice'];
	$featureimg = $res[0]['featureimg'];
} else {
	$id = "0";
	$productid = "";
	$userid = "";
	$colorid = "";
	$sizeid = "";
	$wightid = "";
	$qty = "";
	$saleprice = "";
	$offerprice = "";
	$featureimg = "";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Productvarient/pvarientsave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Create Product Varient</h3>
							</div>

							<?php if($this->session->flashdata('msg')): ?>
							<div class="alert alert-success" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php endif; ?>
							<div class="card-body">
								<input type="hidden" name="oldid" value="<?=$id?>">
								<input type="hidden" name="productid" value="<?php echo $this->uri->segment('4');?>">
								<input type="hidden" name="oldfeatureimg" value="<?=$featureimg?>">
								<input type="hidden" name="userid" value="<?php echo $this->session->userdata['logged_in']['id']; ?>">



								<div class="col-12">
									<div class="form-group">
										<label for="title">Select Color<span class="">*</span></label>
										<select name="colorid" class="form-control" >
											<option value="">-Select Color-</option>
											<?php 
											$colores = $this->db->query("select * from product_atribute where atbuteoptionid='1'")->result_array();
											foreach($colores as $colorrows){
											?>
											<option value="<?=$colorrows['id']?>"><?=$colorrows['patributevalue']?></option>
										<?php } ?>
										</select>
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title">Select size<span class="">*</span></label>
										<select name="sizeid" class="form-control" >
											<option value="">-Select sizeid-</option>
											<?php 
											$colores = $this->db->query("select * from product_atribute where atbuteoptionid='2'")->result_array();
											foreach($colores as $colorrows){
											?>
											<option value="<?=$colorrows['id']?>"><?=$colorrows['patributevalue']?></option>
										<?php } ?>
										</select>
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title">Select Weight<span class="">*</span></label>
										<select name="wightid" class="form-control" >
											<option value="">-Select sizeid-</option>
											<?php 
											$colores = $this->db->query("select * from product_atribute where atbuteoptionid='2'")->result_array();
											foreach($colores as $colorrows){
											?>
											<option value="<?=$colorrows['id']?>"><?=$colorrows['patributevalue']?></option>
										<?php } ?>
										</select>
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title">Quantity<span class="">*</span></label>
										<input type="text" name="qty" required class="form-control" value="<?=$qty?>">
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title">Sale Price<span class="">*</span></label>
										<input type="text" name="saleprice" required class="form-control" value="<?=$saleprice?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Offer Price<span class="">*</span></label>
										<input type="text" name="offerprice" required class="form-control" 
										value="<?=$offerprice?>">
									</div>
								</div>






								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="featureimg">
									<?php if($featureimg!="") { ?>
										Change Feature Image
										<?php }else{?>
											Upload Feature Image
										<?php } ?>
											
											<span class=" ">*</span></label>
										<input type="file"  name="featureimg" class="form-control" id="featureimg">
										</div>
									</div>
									<?php if($featureimg!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$featureimg?>">
									</div>
									<?php } ?>
									
								</div>

								<div class="col-6">
									<input type="submit" class="btn btn-primary" name="save">
								</div>
							</div> <!-- /.card-body -->
						</div> <!-- /.card -->
					</div> <!-- /.col-md-12 -->
				</div>
			</form>
		<!-- /.container-fluid -->


		<!-- table start  -->

		<table id="datatable" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Si No</th>
									<th>Feature Image</th>
									<th>Color</th>
									<th>Size</th>
									<th>Weight</th>
									<th>Sale Price </th>
									<th>Offer Price</th>
									<th>Qty</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>

							</thead>

							<tbody>
								<?php 
								$i = $this->uri->segment(5);
								$res = $this->db->query("select * from productvarient where productid='".$productidis."'")->result_array();
								foreach($res as $row) { $i++; ?>
									<tr>
										<td><?=$i?></td>
										<td>
											<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$row['featureimg']?>">
										</td>
										<td><?=$row['colorid']?></td>
										<td><?=$row['sizeid']?></td>
										<td><?=$row['wightid']?></td>
										<td><?=$row['saleprice']?></td>
										<td><?=$row['offerprice']?></td>
										<td><?=$row['qty']?></td>
										<td>
											<a href="<?php echo base_url();?>admin/Productvarient/pvarientedit/<?=$row['id']?>">
												<i class="lni-pencil-alt"></i>
											</a>
										</td>
										<td>
											<a href="<?php echo base_url();?>admin/Managepage/blogdelete/<?=$row['id']?>"
												onclick="return confirm('Are you sure ?')">
												<i class="lni-trash"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						</div>

		<!--table end -->


	</section>
</div><!-- /.content-wrapper -->