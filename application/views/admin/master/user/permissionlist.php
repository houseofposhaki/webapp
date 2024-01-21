<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3>User Permission List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Rolename</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = $this->uri->segment(3);
								foreach($users as $user) { $i++; ?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$user->rolename;?></td>
										<td>
											<a href="<?php echo base_url();?>admin/User/submitpermission/<?=$user->id;?>">
												<button class="btn-info">Permission</button>	
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

</div>
<!-- ./wrapper -->