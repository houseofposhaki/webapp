<?php 
  $fullname = $this->session->userdata['logged_in']['fullname'];
  $username = $this->session->userdata['logged_in']['username'];
  $userid = $this->session->userdata['logged_in']['id'];
  // fetch usertypeid against user login id //
  $ci = &get_instance();
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('id',$userid);
  $res1 = $this->db->get()->result_array();
  $usertypeid =  $res1[0]['usertype'];
  // fetch user permission details against usertypeid //
  $this->db->select('*');
  $this->db->from('userpermission');
  $this->db->where('usertypeid',$usertypeid);
  $res2 = $this->db->get()->result_array();
  foreach($res2 as $row)
  {
    $touradd = $row['touradd'];
    $tourlist = $row['tourlist'];
    $touredit = $row['touredit'];
  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">
	<!-- Content Header (Page header) -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Tour Packages Lists</h3>
					</div>
					<div class="card-body">
						<?php if($touradd=="1") { ?>	
							<div class="text-right mb-3">
								<a href="touradd">
									<button class="btn btn-primary">Add New</button>
								</a>							
							</div>
						<?php } ?>
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>SL No.</th>
									<th>Package Name</th>
									<th>Duration</th>
									<th>Departure</th>
									<?php if($touredit=="1") { ?>
									<th>Action</th>
									<th>Status</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>

								<?php
								$i = $this->uri->segment(3); 
								foreach($res as $row) { $i++; 
								?>
									<tr>
										<td><?=$i;?></td>
										<td>
											<a href="<?php echo base_url();?>Tour/details/<?=$row['id']?>">
											<?=$row['pkgname']?>
											</a>
										</td>
										<td><?=$row['pkgday']?>D / <?=$row['pkgnight']?>N</td>
										<td><?=date('d-m-Y',strtotime($row['departuredate']))?></td>
										<?php if($touredit=="1") { ?>
										<td>
											<a  href="<?php echo base_url()?>Tour/save/<?php echo $row['id']?>">
												<button class="btn-warning" type="button">Edit</button>
											</a>
											 <a  href="<?php echo base_url()?>Tour/delete/<?php echo $row['id']?>">
												<button class="btn-danger" type="button" onclick="return confirm('Are you sure?')">Delete</button>
											</a>
										</td>
										<td>
											<?php if($row['status']=="1") { ?>
											<a href="<?php echo base_url()?>Tour/makeinactive/<?=$row['id']?>" onclick="return confirm('Are you sure to Inactive?')">
												<button class="btn btn-success">Active</button>
											</a>
											<?php }else { ?> 
											<a href="<?php echo base_url()?>Tour/makeactive/<?=$row['id']?>" onclick="return confirm('Are you sure to active?')">
												<button class="btn btn-danger">Inactive</button>
											</a>
											<?php } ?>
										</td>
										<?php } ?>
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
