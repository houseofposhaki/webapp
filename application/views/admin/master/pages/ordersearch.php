<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
				<div class="card-header" style="margin-top: 5px;">
					<h3 class="card-title">Search Order</h3>
				</div>
					<div class="card-body">
						<form method="post" name="" action="<?php echo base_url();?>admin/Order/ordersearch">
							<div class="row col-12">
								
								<div class="col-2">
									<label for="">Start Date:</label>
									<span style="color: red">*</span>
									<input name="startdate" id="min" type="date" class="form-control" autocomplete="off" required>
								</div>
								<div class="col-2">
									<label for="">End Date:</label>
									<span style="color: red">*</span>
									<input name="enddate" id="max" type="date" class="form-control" autocomplete="off" required>
								</div>
								<div class="col-2">
									<label for="">Type:</label>
									<span style="color: red">*</span>
									<select name="searchtype" class="form-control" required>
										<option value="">-Select One-</option>
										<option value="mobile">Mobile</option>
										<option value="orderno">Order No</option>
									</select>
								</div>
								<div class="col-2">
									<label for="">Value:</label>
									<span style="color: red">*</span>
									<input name="searchval" id="" type="text" class="form-control" autocomplete="off" required>
								</div>


								<div class="col-1" style="margin-top: 29px;">
									<input name="submit"  type="submit" class="btn btn-primary" value="search">
								</div>
							</div>
						</form>
						</div>
					<!--date filter -->
		
					<div class="card-body">
						<?php  if(isset($res)){ ?>
							<div class="row col-12">
								<p>The list below shows all reports from <strong><?php echo date('d-m-Y',strtotime($postdate['startdate'])); ?></strong> to <strong><?php echo date('d-m-Y',strtotime($postdate['enddate'])); ?></strong></p>
							</div>
						<table id="datatableWithBtn" class="table table-bordered table-responsive table-striped">
							<thead>
								<tr>
									<th>Si No</th>
									<th>Order ID</th>
									<th>Order Status</th>
									<th>Date</th>
									<th>Name</th>
									<th>Mobile</th>
									<th>Pincode</th>
									<th>Coupon</th>
									<th>Grand Total</th>
									<th>Payment Status</th>
									<th>Pay Mode</th>
									<th>Prescription</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1; 
								foreach($res as $row) {  ?>

									<tr <?php if(!empty($row['featureimg'])) { ?> style="background-color: #ffa099;" <?php } ?>>
										<td><?=$i?></td>
										<td>
											<a href="<?=base_url();?>admin/orderdetails/<?=$row['orderno']?>">
												<?=$row['orderno']?>
											</a>
										</td>
									
										<td><?=$row['ordstatus']?></td>
										
										<td><?=date('d-m-Y',strtotime($row['ts']))?></td>
										<td><?=$row['name']?></td>
										<td><?=$row['mobile']?></td>
										<td><?=$row['pincode']?></td>
										<td><?=$row['couponis']?></td>
										<td><?=$row['grandtot']?></td>
										<td>
											<?php if($row['ispaid']=="1") { ?>
												<button class="btn-success">Success</button>
											<?php }else { ?>
												<button class="btn-danger">Pending</button>
											<?php } ?> 
										</td>
										<td><?=$row['paymode']?></td>
										<td>
											<?php if($row['featureimg']!='') { ?>

												<a href="<?=base_url()?>prescription/<?=$row['featureimg']?>" target="_blank">
													<img src="<?=base_url()?>file.png" style="height: 40px;width: 40px;">
												</a>
											<?php } ?>
										</td>
									</tr>
								<?php $i++; } ?>	
							</tbody>
						</table>
				    <?php } ?>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>
