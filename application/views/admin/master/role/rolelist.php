
<div class="content-wrapper mt-3">

	<!-- Main content -->

	<section class="content">

		<div class="row">

			<div class="col-12">

				<div class="card card-primary">

					<div class="card-header">

						<h3 class="card-title">User Role List</h3>

					</div>

					<div class="card-body">

						<div class="text-right mb-3">

							<a href="<?php echo base_url();?>admin/roleadd">

								<button class="btn btn-primary">Add New Role</button>

							</a>

						</div>

						<table id="datatable" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Sl No</th>

									<th>Username</th>

									<th>Action</th>

									<!-- <th>Delete</th> -->

								</tr>

							</thead>

							<tbody>

								<?php 

								$i = $this->uri->segment(3);

								foreach($roles as $role) { $i++; ?>

									<tr>

										<td><?=$i;?></td>

										<td><?=$role->rolename?></td>

										

										<td>

											<a href="<?php echo base_url()?>admin/Role/save/<?=$role->id;?>">

												<i class="fas fa-edit"></i>
											</a>

										</td>

										<!-- <td>

											<a href="<?php //echo base_url()?>admin/Role/delete/<?=$role->id;?>"

												onclick="return confirm('Are you sure ?')">

												<i class="lni-trash"></i>

											</a>

										</td> -->

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

<!-- /.content-wrapper