<?php
$orderno = $this->uri->segment('3');
$cartid = $this->uri->segment('4');

$orddetails = $this->db->query("select * from ordertbl where orderno='$orderno'")->result_array();
if(!empty($orddetails))
{
	$ordstatus = $orddetails[0]['ordstatus'];
	$couponis = $orddetails[0]['couponis'];
	if(!empty($couponis))
	{
	// coupon details //
	$couponres = $this->db->query("select * from coupon where code='$couponis' ")->result_array();
	
		$discamt = $couponres[0]['discamt'];
	}else{
		$discamt = 0;
	}

}
	
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Adminnewcontroller/brandsave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Order Details</h3>
							</div>

							<?php if($this->session->flashdata('msg')): ?>
								<div class="alert alert-success" role="alert" style="margin-top: 25px;">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php endif; ?>


							<div class="card-body">

								<div class="row">
									<?php 
									$orderDetails = $this->db->query("select * from ordertbl where orderno='$orderno'")->result_array();
									foreach($orderDetails as $ordRows){
										?>	

										<div class="breadcrumb col-12">
										<span><h6><b>Billing Address</b></h6></span>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="title">Order No: </label><?=$orderno?>
											</div>
										</div>



										<div class="col-4">
											<div class="form-group">
												<label for="title">Name: </label><?=$ordRows['name']?>
											</div>
										</div>


										<div class="col-4">
											<div class="form-group">
												<label for="title">Mobile: </label><?=$ordRows['mobile']?>
											</div>
										</div>


										<div class="col-4">
											<div class="form-group">
												<label for="title">Pincode:</label> <?=$ordRows['pincode']?>
											</div>
										</div>

										<div class="col-4">
											<div class="form-group">
												<label for="title">Address: </label><?=$ordRows['address']?>
											</div>
										</div>



										<div class="col-4">
											<div class="form-group">
												<label for="title">Coupon Code:</label> <?=$ordRows['couponis']?>
											</div>
										</div>
										<div class="breadcrumb col-12">
										<span><h6><b>Shipping Address</b></h6></span>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="title">Shipping Name:</label>
												<?php
												if(!empty($ordRows['shipping_name']))
												{
													echo $ordRows['shipping_name'];	
												}else{
													echo $ordRows['name'] ; 
												}

												?>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="title">Shipping Mobile:</label> 
												<?php
												if(!empty($ordRows['shipping_mobile']))
												{
													echo $ordRows['shipping_mobile'];	
												}else{
													echo $ordRows['mobile'] ; 
												}
												?>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="title">Shipping Address:</label>
												<?php
												if(!empty($ordRows['shipping_address']))
												{
													echo $ordRows['shipping_address'];	
												}else{
													echo $ordRows['address'] ; 
												}
												?>
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label for="title">Shipping Pincode:</label>
												<?php
												if(!empty($ordRows['shipping_pincode']))
												{
													echo $ordRows['shipping_pincode'];	
												}else{
													echo $ordRows['pincode'] ; 
												}
												?>
											</div>
										</div>



									<?php } ?>

								</div>

								<table id="datatable" class="table table-bordered table-striped">

									<thead>

										<tr>

											<th>Si No</th>
											<th>Item </th>
											<th>Item Name</th>
											<th>Price </th>
											<th>Qty</th>
											<th>Discounted Price</th>
										</tr>

									</thead>

									<tbody>
										<?php 
										$i= 1;
										$itemidres = $this->db->query("select cart.*,cart.id as cartid, product.id,product.title,product.featureimg
														 from cart  left join product on cart.productid = product.id
														 where cart.orderno='$orderno'")->result_array();
											foreach($itemidres as $row) { ?>
												<tr>
													<td><?=$i?></td>
													<td><img height="50px" width="50px;" src="<?=base_url();?>uploads/<?=$row['featureimg']?>"></td>
													<td><?=$row['title']?></td>
													<td><?=$row['productprice']?></td>
													<td><?=$row['qty']?></td>
													<td><?php
													$total = $row['total'];
													$dispercent = ($total*$discamt);
													$discdevide = ($dispercent/100);
													echo $minusamt = ($total-$discdevide);

													?></td>


												</tr>
												<?php  $i++; } ?>
											</tbody>
										</table>

									</div> <!-- /.card-body -->
								</div> <!-- /.card -->
							</div> <!-- /.col-md-12 -->
						</div>
					</form>
				</div><!-- /.container-fluid -->
			</section>
</div><!-- /.content-wrapper -->