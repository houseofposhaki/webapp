<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->

	<section class="content-header">

		<div class="container-fluid">

			<div class="row mb-2">

				<div class="col-sm-6">

					<h1>Refund List</h1>

				</div>

				<div class="col-sm-6">



				</div>

			</div>

		</div><!-- /.container-fluid -->

	</section>



	<!-- Main content -->

	<section class="content">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-header">

						<?php if($this->session->flashdata('del')): ?>
							<div class="alert alert-danger" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('del'); ?>
							</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('msg')): ?>
							<div class="alert alert-success" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('msg'); ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- /.card-header -->

					<div class="card-body">

						



						<table id="datatable" class="table table-striped">

							<thead>

								<tr>

									<th>Si No</th>
									<th>Order No</th>
									<th >Image</th>
									<th >Item</th>
									<th >Purchase Qty</th>
									<th >Return Qty</th>
									<th  >Total Price</th>
									<th  >Return</th>
									
								</tr>

							</thead>

							<tbody>
								<?php 
								$i = 1;
								$orderes = $this->db->query("select cart.*,cart.id as cartid, product.id,product.title,product.featureimg
									from cart  left join product on cart.productid = product.id
									where cart.refundstatus='1' or cart.refundstatus='2' order by cart.id desc ")->result_array();
								foreach($orderes as $ordrow) { 
									?>
									<tr>
										<td><?=$i?></td>
										<td>
											<a href="<?=base_url();?>admin/orderdetails/<?=$ordrow['orderno']?>/<?=$ordrow['cartid']?>">
											<?=$ordrow['orderno']?>
											</a>
										</td>
										<td >
											<img src="<?=base_url()?>uploads/<?=$ordrow['featureimg']?>" style="height: 50px;width: 50px">

										</td>
										<td >
											<?=$ordrow['title']?>
										</td>
										<td style="background-color: lightgreen">
											<?=$ordrow['qty']?>
										</td>

										<td style="background-color: lightyellow">
											<?=$ordrow['returnqty']?>
										</td>
										<td class="product-price">
											<div class="product-price"> 
												<span class="sale-price text_dark">₹ <?=$ordrow['total']?></span> 
											</div>
										</td>
										<td>
											<?php if($ordrow['refundstatus']=='1' ) { ?>
												<a href="<?=base_url()?>admin/Order/approverefund/<?=$ordrow['cartid']?>" onclick="return confirm('Are you sure to refund ?')">
												<button class="btn btn-danger">Requested</button>
												</a>
											<?php }else if($ordrow['refundstatus']=='2'){ ?>
												<button class="btn btn-success">Approved</button>
											<?php } ?>
										</td>
									</tr>
									<?php  $i++;} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<!-- /.content-wrapper -->