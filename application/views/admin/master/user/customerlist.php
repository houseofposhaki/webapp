<?php

$userid  = $this->session->userdata['logged_in']['id'];

$data = $this->db->query("select * from user where id='".$userid."'")->result_array();

$usertype = $data[0]['usertype'];

?>



<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">



	<!-- Content Header (Page header) -->



	<section class="content-header">



		<div class="container-fluid">



			<div class="row mb-2">



				<div class="col-sm-6">



					<h1>Customer List</h1>



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



						<a href="<?php echo base_url();?>admin/useradd">

						

							<button class="btn btn-primary">Add New</button>

						

						</a>



						



					</div>



					<!-- /.card-header -->



					<div class="card-body">



						<table id="datatable" class="table table-bordered table-striped">



							<thead>



								<tr>



									<th>Si No</th>



									<th>Mobile</th>
									<th>Username</th>

									<th>Password</th>



									<th>Usertype</th>



									<th>Action</th>


									<th>Delete</th>



								</tr>



							</thead>



							<tbody>



								<?php 



								$i = $this->uri->segment(3);


								$users = $this->db->query("select * from user where usertype='Customer' ")->result();
								foreach($users as $user) { $i++; ?>



									<tr>



										<td><?=$i;?></td>



										<td><?=$user->mobile?></td>
										<td><?=$user->username?></td>

										<td><?=base64_decode($user->password)?></td>

										<td><?=$user->usertype;?></td>
								

										<td>

											<a href="<?php echo base_url()?>admin/User/save/<?=$user->id;?>">

												<i class="fas fa-edit"></i>

											</a>

										</td>

										

										<td>

											<a href="<?php echo base_url()?>admin/User/userdelete/<?=$user->id;?>"

												onclick="return confirm('Are you sure ?')">

												<span style="color: red"><i class="fas fa-trash"></i></span>

											</a>

										</td>



									</tr>



								<?php } ?>



							</tbody>



						</table>



					</div>



					<!-- /.card-body -->



				</div>



				<!-- /.card -->



			</div>



			<!-- /.col -->



		</div>



		<!-- /.row -->



	</section>



	<!-- /.content -->



</div>



<!-- /.content-wrapper -->