
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

	<!-- Content Header (Page header) -->

	<section class="content-header">

		<div class="container-fluid">

			<div class="row mb-2">

				<div class="col-sm-6">

					<h1>Comments</h1>

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


					<div class="card-body">
						<table id="datatable" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Si No</th>
									<th>Blog Titlte</th>
									<th>Name</th>
									<th>Email</th>
									<th>Subject </th>
									<th>Messge </th>
									<th>Status</th>
									<th>Delete</th>
								</tr>

							</thead>

							<tbody>
								<?php 
								$i = $this->uri->segment(3);
								foreach($res as $row) { $i++; ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$row['title']?></td>
										<td><?=$row['name']?></td>
										<td><?=$row['email']?></td>
										<td><?=$row['subject']?></td>
										<td><?=$row['message']?></td>
										<td>
											<?php if($row['blogstatus']=="1"){  ?>
												<a onclick="return confirm('Are you want to block this comment?')" href="<?php echo base_url();?>admin/Managepage/commentdeactive/<?=$row['cmtid']?>">
												<button class="btn btn-success">Active</button>
												</a>
											<?php }else{ ?>
												<a onclick="return confirm('Are you want to Active this comment?')" href="<?php echo base_url();?>admin/Managepage/commentactive/<?=$row['cmtid']?>">
												<button class="btn btn-danger">Pending</button>
												</a>
											<?php } ?>
										</td>
										<td>
											<a href="<?php echo base_url();?>admin/Managepage/commentdelete/<?=$row['cmtid']?>"
												onclick="return confirm('Are you sure ?')">
												<i class="lni-trash"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- /.content-wrapper -->