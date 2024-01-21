<?php 
	$usertype = $this->session->userdata['logged_in']['usertype'];
?>
<div class="content-wrapper mt-3">
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Payer List</h3>
					</div>
					<div class="card-body">
							<div class="text-right mb-3">
								<a href="<?=base_url()?>Payer/add">
									<button class="btn btn-primary">Add Payer</button>
								</a>							
							</div> 
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Name</th>
									<th>Address</th>
									<th>Phone</th>
									<th>Action</th>
									<!-- <th>Edit</th> -->
								</tr>
							</thead>
							<tbody>
								<?php
								$i = $this->uri->segment(3); 
								foreach($res as $row) { $i++;
									?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$row['payername']?></td>
										<td><?=$row['payeraddress']?></td>
										<td><?=$row['payerphone']?></td>
										
										<td>
											<a href="<?php echo base_url()?>Payer/save/<?=$row['id']?>">
											<button class="btn btn-success">Edit</button> 
											

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

</body>
</html>
