<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

	<!-- Content Header (Page header) -->



	<section class="content-header">



		<div class="container-fluid">



			<div class="row mb-2">



				<div class="col-sm-6">



					<h1>Orders</h1>



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



						



						<div class="text-right mb-3">

							<a href="<?=base_url()?>admin/childcatadd">

								<button class="btn btn-primary">Add New</button>

							</a>							

						</div> 



						<table id="datatable" class="table table-responsive table-striped">



							<thead>



								<tr>



									<th>Si No</th>

									<th>Order ID</th>

									<th>Date</th>

									<th>Name</th>

									<th>Mobile</th>

									<th>Pincode</th>

									<th>Grand Total</th>

									<th>Payment Status</th>

									<th>Prescription</th>

									<th>Assign To</th>

									<th>Assign</th>

									<th>Edit</th>


								</tr>



							</thead>



							<tbody>

								<?php 

								$i = 1;

								$ordres = $this->db->query("select * from  ordertbl where franchiseid!=0 order by id desc ")->result_array();

								foreach($ordres as $row) { ?>

									<tr>

										<td><?=$i?></td>

										<td>
											<a href="<?=base_url();?>admin/orderdetails/<?=$row['orderno']?>">
											<?=$row['orderno']?>
										</a>
										</td>

										<td><?=date('d-m-Y',strtotime($row['ts']))?></td>

										<td><?=$row['name']?></td>

										<td><?=$row['mobile']?></td>

										<td><?=$row['pincode']?></td>

										

										<td><?=$row['grandtot']?></td>

										<td>

											<?php if($row['ispaid']=="1") { ?>

												<button class="btn-success">Success</button>

											<?php }else { ?>

												<button class="btn-danger">Pending</button>

											<?php } ?> 

										</td>

										<td>

											<?php if($row['featureimg']!='') { ?>



												<a href="<?=base_url()?>prescription/<?=$row['featureimg']?>" target="_blank">

													<img src="<?=base_url()?>file.png" style="height: 40px;width: 40px;">

												</a>

											<?php } ?>

										</td>

										<td>

											<?php 

											$franchiseid = $row['franchiseid'];

											$useres = $this->db->query("select * from  user  where id='$franchiseid' ")->result_array();

											if(!empty($useres))

											{

												echo $useres[0]['fullname'];

											}

											?>

										</td>



										<td>

											<a href="<?=base_url();?>admin/assignorder/<?=$row['id']?>">

												<button class="btn btn-warning">Update Assign</button>

											</a>

										</td>

										<td>
											<a href="<?php echo base_url();?>admin/Adminnewcontroller/editorder/<?=$row['orderno']?>">
												<i class="fas fa-edit"></i>
											</a>
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