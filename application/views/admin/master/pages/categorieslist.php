<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

	<!-- Content Header (Page header) -->

	<section class="content-header">

		<div class="container-fluid">

			<div class="row mb-2">

				<div class="col-sm-6">

					<h1>Sub Categories</h1>

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

						<?php if ($this->session->flashdata('del')) : ?>
							<div class="alert alert-danger" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('del'); ?>
							</div>
						<?php endif; ?>
						<?php if ($this->session->flashdata('msg')) : ?>
							<div class="alert alert-success" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('msg'); ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- /.card-header -->

					<div class="card-body">



						<div class="text-right mb-3">
							<a href="<?= base_url() ?>admin/categoriesadd">
								<button class="btn btn-primary">Add New</button>
							</a>
						</div>

						<table id="datatable" class="table table-bordered table-striped">

							<thead>

								<tr>

									<th>Si No</th>
									<th>Title</th>
									<th>Parent Category</th>
									<th>Image</th>
									<th>Modify</th>
									<th>Status</th>
									<th>Delete</th>
								</tr>

							</thead>

							<tbody>
								<?php
								$i = $this->uri->segment(3);
								foreach ($res as $row) {
									$i++; ?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $row['title'] ?></td>
										<td>
											<?php
											$ptid = $row['parentid'];
											$catnmres = $this->db->query("select * from categories 
														where id='" . $ptid . "'")->result_array();
											if (!empty($catnmres)) {
												echo $catnmres[0]['title'];
											}
											?>

										</td>
										<td>
											<img height="60px" width="70px" src="<?= base_url(); ?>uploads/<?= $row['featureimg'] ?>">
										</td>

										<td>
											<a href="<?php echo base_url(); ?>admin/Managepage/categoriessave/<?= $row['id'] ?>">
												<i class="fas fa-edit"></i>
											</a>
										</td>
										<td>

											<?php if ($row['is_show'] == "1") {  ?>

												<a onclick="return confirm('Are you want to published this item?')" href="<?php echo base_url(); ?>admin/Managepage/subcatpublish/<?= $row['id'] ?>">

													<button class="btn btn-warning">Draft</button>

												</a>

											<?php } else { ?>

												<a onclick="return confirm('Are you want to draft this item?')" href="<?php echo base_url(); ?>admin/Managepage/subcatdraft/<?= $row['id'] ?>">

													<button class="btn btn-success">Live</button>

												</a>

											<?php } ?>

										</td>
										<td>
											<a href="<?php echo base_url(); ?>admin/Managepage/categoriesdelete/<?= $row['id'] ?>" onclick="return confirm('Are you sure ?')">
												<span style="color: red"><i class="fas fa-trash"></i></span>
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