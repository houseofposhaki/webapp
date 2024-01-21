
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

	<!-- Content Header (Page header) -->

	<section class="content-header">

		<div class="container-fluid">

			<div class="row mb-2">

				<div class="col-sm-6">

					<h1>Child Categories</h1>

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

						<table id="datatable" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Si No</th>
									<th>Title</th>
									<th>Sub Category</th>
									<th>Modify</th>
									<th>Delete</th>
								</tr>

							</thead>

							<tbody>
								<?php 
								$i = $this->uri->segment(3);
								foreach($res as $row) { $i++; ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$row['childcatname']?></td>
										<td><?=$row['subcatid']?></td>
										<td>
											<a href="<?php echo base_url();?>admin/Managepage/childcatsave/<?=$row['id']?>">
												<i class="lni-pencil-alt"></i>
											</a>
										</td>
										<td>
											<a href="<?php echo base_url();?>admin/Managepage/childcatdel/<?=$row['id']?>"
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